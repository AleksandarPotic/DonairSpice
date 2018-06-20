<?php

namespace App\Http\Controllers\User;

use App\Mail\NewOrder;
use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

use PayPal\Api\CreditCard;
use PayPal\Api\PaymentCard;
use PayPal\Api\PaymentExecution;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\User;

use CraigPaul\Moneris\Moneris;

class PaymentController extends Controller
{

    private $_api_context;
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payment_paypal(Request $request)
    {
        //return $request->all();
        session()->put('paypal_info', [
            'fName' => $request->fName,
            'lName' => $request->lName,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'postalCode' => $request->postalCode,
            'shipping_method' => $request->shipping_method,
            'payment_method' => $request->payment_method,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'size' => $request->size,
            'user_id' => $request->user_id,
            'total_price' => $request->total_price
        ]);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName('Donair Spice') /** item name **/
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->total_price); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->total_price);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status')) /** Specify return URL **/
        ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        $payment->create($this->_api_context);

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }


    public function getPaymentStatus()
    {
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            session()->forget('paypal_info');
            return Redirect::route('pre-checkout')->with('payment_message','Failed payment! Try again with other payment method.');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            \Session::put('success', 'Payment success');

            $order = new Order();

            $order->total_price = number_format(session('paypal_info')['total_price'],2);
            $order->quantity = session('paypal_info')['quantity'];
            $order->product_id = session('paypal_info')['product_id'];
            $order->size = session('paypal_info')['size'];

            if (session('paypal_info')['user_id']) {
                $order->user_id = session('paypal_info')['user_id'];
                $user = User::where('id',session('paypal_info')['user_id'])->first();

                if (session('coupon')) {
                    $user->coupon_status = 0;
                }

                $total_spent = $user->total_spent;
                $total_spent = $total_spent + session('paypal_info')['total_price'];
                $user->total_spent = $total_spent;

                $user->save();
            }

            $order->fName = session('paypal_info')['fName'];
            $order->lName = session('paypal_info')['lName'];
            $order->email = session('paypal_info')['email'];
            $order->phone = session('paypal_info')['phone'];
            $order->address = session('paypal_info')['address'];
            $order->city = session('paypal_info')['city'];
            $order->company = session('paypal_info')['company'];
            $order->country = session('paypal_info')['country'];
            $order->postalCode = session('paypal_info')['postalCode'];
            $order->shipping_method = session('paypal_info')['shipping_method'];
            $order->payment_method = session('paypal_info')['payment_method'];
            $order->transaction_id = $payment_id;
            $order->fulfilment_status = 'Fulfilled';

            Mail::to('donairspice@gmail.com')->send(new NewOrder());
            $order->save();

            Cart::destroy();
            session()->forget('coupon');
            session()->forget('paypal_info');

            return view('user.thank-you');
        }
        \Session::put('error', 'Payment failed');
        session()->forget('paypal_info');
        return Redirect::route('pre-checkout')->with('payment_message','Failed payment! Try again with other payment method.');
    }

    public function payment_credit_card(Request $request)
    {
        $id = 'store2';
        $token = 'yesguy';

        // optional
        $params = [
            'environment' => Moneris::ENV_TESTING, // default: Moneris::ENV_LIVE
            'avs' => false, // default: false
            'cvd' => true, // default: false
        ];

        $gateway = (new Moneris($id, $token, $params))->connect();

        $transaction_id = uniqid('1234d3p1ce', true);

        $params = [
            'order_id' => $transaction_id,
            'amount' => $request->total_price,
            'credit_card' => $request->card_number,
            'expiry_month' => $request->month,
            'expiry_year' => $request->year,
            'cvd' => $request->cvd
        ];

        $response = $gateway->purchase($params);

        if ($response->successful && !$response->failedAvs && !$response->failedCvd) {

            $order = new Order();

            $order->total_price = number_format($request->total_price,2);
            $order->quantity = $request->quantity;
            $order->product_id = $request->product_id;
            $order->size = $request->size;

            if ($request->user_id) {
                $order->user_id = $request->user_id;
                $user = User::where('id',$request->user_id)->first();

                if (session('coupon')) {
                    $user->coupon_status = 0;
                }

                $total_spent = $user->total_spent;
                $total_spent = $total_spent + $request->total_price;
                $user->total_spent = $total_spent;

                $user->save();
            }

            $order->fName = $request->fName;
            $order->lName = $request->lName;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->company = $request->company;
            $order->country = $request->country;
            $order->postalCode = $request->postalCode;
            $order->shipping_method = $request->shipping_method;
            $order->payment_method = $request->payment_method;
            $order->transaction_id = $transaction_id;
            $order->fulfilment_status = 'Fulfilled';

            Mail::to('donairspice@gmail.com')->send(new NewOrder());
            $order->save();

            Cart::destroy();
            session()->forget('coupon');

            return view('user.thank-you');

        } else {
            return Redirect::route('pre-checkout')->with('payment_message','Failed payment! Try again with other payment method.');
        }
    }
}

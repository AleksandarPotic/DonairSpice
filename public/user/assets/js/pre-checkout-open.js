
$(document).ready(function () {

    $('.customer_button').click(function () {

        $('#user-information').show();
        $('#shipping-information').hide();
        $('#pay_id').hide();
        $('#customer_active').attr('class','breadcrumb-item active');
        $('#shipping_active').attr('class','breadcrumb-item');
        $('#payment_active').attr('class','breadcrumb-item');

    });

    $('.shipping_button').click(function () {

    	if($('#email').val() != '' && $('#fName').val() != '' && $('#lName').val() != '' && $('#address').val() != '' && $('#city').val() != '' && $('#country').val() != '' && $('#postalCode').val() != '' && $('#phone').val() != ''){

			$('#user-information').hide();
			$('#shipping-information').show();
            $('#pay_id').hide();
            $('#customer_active').attr('class','breadcrumb-item');
            $('#shipping_active').attr('class','breadcrumb-item active');
            $('#payment_active').attr('class','breadcrumb-item');

        }else{
    	    $("#customer_message").show();
    	    setTimeout(function () {
                $("#customer_message").hide();
            },3000);
        	$('#user-information').show();
			$('#shipping-information').hide();
            $('#pay_id').hide();
            $('#customer_active').attr('class','breadcrumb-item active');
            $('#shipping_active').attr('class','breadcrumb-item');
            $('#payment_active').attr('class','breadcrumb-item');

        }

    });

    $('.payment_button').click(function () {


	    if($('#email').val() != '' && $('#fName').val() != '' && $('#lName').val() != '' && $('#address').val() != '' && $('#city').val() != '' && $('#country').val() != '' && $('#postalCode').val() != '' && $('#phone').val() != ''){

	    	if($('#shipping-one').is(':checked') || $('#shipping-two').is(':checked') || $('#shipping-three').is(':checked')){

	    		$('#user-information').hide();
				$('#shipping-information').hide();
            	$('#pay_id').show();
            	$('#customer_active').attr('class','breadcrumb-item');
            	$('#shipping_active').attr('class','breadcrumb-item');
            	$('#payment_active').attr('class','breadcrumb-item active');

	    	}else{
                $("#shipping_message").show();
                setTimeout(function () {
                    $("#shipping_message").hide();
                },3000);

	    		$('#user-information').hide();
				$('#shipping-information').show();
                $('#pay_id').hide();
                $('#customer_active').attr('class','breadcrumb-item');
                $('#shipping_active').attr('class','breadcrumb-item active');
                $('#payment_active').attr('class','breadcrumb-item');

	    	}
	    }


    });

    $(".app_log_out").click(function () {
        $("#coupon_message").show();
        setTimeout(function () {
            $("#coupon_message").hide();
        },3000);
    });

    $(".shipp_form").change(function () {
        $('#ship_name').val($('.shipp_form:checked').val());
    });
    $(".pay_form").change(function () {
        $('#pay_name').val($('.pay_form:checked').val());
    });

    $(".continue_b").click(function () {
        if($('#payment-one').is(':checked') || $('#payment-two').is(':checked') || $('#payment-three').is(':checked')){

            $("#full_form").submit();

        } else {
            $("#payment_message").show();
            setTimeout(function () {
                $("#payment_message").hide();
            },3000);
        }
    });

    $(".apply_d").click(function () {
        $("#form_d").submit();
    });
    $(".apply_m").click(function () {
        $('.code_mob2').val($('.code_mob').val());
        $("#form_m").submit();
    });

    setTimeout(function(){ $("#coupon_m2").hide(); }, 3000);

    $(".shipp_form").click(function () {

        var val = $(".shipp_form:checked").attr('alt');

        $(".shipping_price").text('$'+val);

        var t_price = $("#t_price").val();

        var u_price = parseFloat(t_price) + parseFloat(val);

        $(".total_dollar").html('$'+u_price);
        $("#t_price_s").val(u_price);
        $("#ship_price").val(val);

    });
});
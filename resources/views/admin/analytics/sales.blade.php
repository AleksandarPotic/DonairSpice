<!-- Daily chart -->
<input type="hidden" id="h1" value="{{ $h1 }}">
<input type="hidden" id="h2" value="{{ $h2 }}">
<input type="hidden" id="h3" value="{{ $h3 }}">
<input type="hidden" id="h4" value="{{ $h4 }}">
<input type="hidden" id="h5" value="{{ $h5 }}">
<input type="hidden" id="h6" value="{{ $h6 }}">
<input type="hidden" id="h7" value="{{ $h7 }}">
<input type="hidden" id="h8" value="{{ $h8 }}">
<!-- Monthly chart -->
<input type="hidden" id="d1" value="{{ $d1 }}">
<input type="hidden" id="d2" value="{{ $d2 }}">
<input type="hidden" id="d3" value="{{ $d3 }}">
<input type="hidden" id="d4" value="{{ $d4 }}">
<input type="hidden" id="d5" value="{{ $d5 }}">
<input type="hidden" id="d6" value="{{ $d6 }}">
<input type="hidden" id="d7" value="{{ $d7 }}">
<input type="hidden" id="d8" value="{{ $d8 }}">
<input type="hidden" id="d9" value="{{ $d9 }}">
<input type="hidden" id="d10" value="{{ $d10 }}">
<input type="hidden" id="d11" value="{{ $d11 }}">
<input type="hidden" id="d12" value="{{ $d12 }}">
<input type="hidden" id="d13" value="{{ $d13 }}">
<input type="hidden" id="d14" value="{{ $d14 }}">
<input type="hidden" id="d15" value="{{ $d15 }}">
<input type="hidden" id="d16" value="{{ $d16 }}">
<input type="hidden" id="d17" value="{{ $d17 }}">
<input type="hidden" id="d18" value="{{ $d18 }}">
<input type="hidden" id="d19" value="{{ $d19 }}">
<input type="hidden" id="d20" value="{{ $d20 }}">
<input type="hidden" id="d21" value="{{ $d21 }}">
<input type="hidden" id="d22" value="{{ $d22 }}">
<input type="hidden" id="d23" value="{{ $d23 }}">
<input type="hidden" id="d24" value="{{ $d24 }}">
<input type="hidden" id="d25" value="{{ $d25 }}">
<input type="hidden" id="d26" value="{{ $d26 }}">
<input type="hidden" id="d27" value="{{ $d27 }}">
<input type="hidden" id="d28" value="{{ $d28 }}">
<input type="hidden" id="d29" value="{{ $d29 }}">
<input type="hidden" id="d30" value="{{ $d30 }}">
<input type="hidden" id="d31" value="{{ $d31 }}">
<!-- Yearly chart -->
<input type="hidden" id="y1" value="{{ $y1 }}">
<input type="hidden" id="y2" value="{{ $y2 }}">
<input type="hidden" id="y3" value="{{ $y3 }}">
<input type="hidden" id="y4" value="{{ $y4 }}">
<input type="hidden" id="y5" value="{{ $y5 }}">
<input type="hidden" id="y6" value="{{ $y6 }}">
<input type="hidden" id="y7" value="{{ $y7 }}">
<input type="hidden" id="y8" value="{{ $y8 }}">
<input type="hidden" id="y9" value="{{ $y9 }}">
<input type="hidden" id="y10" value="{{ $y10 }}">
<input type="hidden" id="y11" value="{{ $y11 }}">
<input type="hidden" id="y12" value="{{ $y12 }}">

<!-- Yearly chart -->
<input type="hidden" id="w1" value="{{ $w1 }}">
<input type="hidden" id="w2" value="{{ $w2 }}">
<input type="hidden" id="w3" value="{{ $w3 }}">
<input type="hidden" id="w4" value="{{ $w4 }}">
<input type="hidden" id="w5" value="{{ $w5 }}">
<input type="hidden" id="w6" value="{{ $w6 }}">
<input type="hidden" id="w7" value="{{ $w7 }}">
<input type="hidden" id="w8" value="{{ $w8 }}">
<input type="hidden" id="w9" value="{{ $w9 }}">
<input type="hidden" id="w10" value="{{ $w10 }}">
<input type="hidden" id="w11" value="{{ $w11 }}">
<input type="hidden" id="w12" value="{{ $w12 }}">
<input type="hidden" id="w13" value="{{ $w13 }}">

<div class="col-lg-4 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
            <h4 class="day_o">{{ $day_orders }}</h4>
            <h4 class="month_o" style="display: none">{{ $month_orders }}</h4>
            <h4 class="year_o" style="display: none">{{ $year_orders }}</h4>
            <h4 class="all_o" style="display: none">{{ $orders->count() }}</h4>

            <p class="day_o">Orders Day</p>
            <p class="month_o" style="display: none">Orders Month</p>
            <p class="year_o" style="display: none">Orders Year</p>
            <p class="all_o" style="display: none">Orders All Time</p>
        </div>
        <div class="icon" style="margin-top: -10px">
            <i class="fa fa-shopping-cart"></i>
        </div>
    </div>
</div>
<div class="col-lg-4 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
            <h4 class="day_o">${{ number_format($day_sales,2) }}</h4>
            <h4 class="month_o" style="display: none">${{ number_format($month_sales,2) }}</h4>
            <h4 class="year_o" style="display: none">${{ number_format($year_sales,2) }}</h4>
            <h4 class="all_o" style="display: none">${{ number_format($total_sales,2) }}</h4>

            <p class="day_o">Amount Day</p>
            <p class="month_o" style="display: none">Amount Month</p>
            <p class="year_o" style="display: none">Amount Year</p>
            <p class="all_o" style="display: none">Amount All Time</p>
        </div>
        <div class="icon" style="margin-top: -10px">
            <i class="ion ion-bag"></i>
        </div>
    </div>
</div>
<div class="col-lg-4 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
            <h4>${{ number_format($total_sales,2) }}</h4>

            <p>All Time</p>
        </div>
        <div class="icon" style="margin-top: -10px">
            <i class="fa fa-money"></i>
        </div>
    </div>
</div>
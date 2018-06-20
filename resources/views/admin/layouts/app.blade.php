<!doctype html>
<html lang="en">
<head>
    @include('admin.layouts.head')
    @section('head-part')
    @show
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

        @section('body-part')
            @show

    @include('admin.layouts.footer')
</div>
@include('admin.layouts.script')
@section('script-part')
    @show
</body>
</html>
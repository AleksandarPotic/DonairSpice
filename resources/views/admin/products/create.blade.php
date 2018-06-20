@section('Products','active')
<!doctype html>
<html lang="en">
<head>
    @include('admin.layouts.head')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="{{ asset('/js/cropit.js') }}"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <style>
        .cropit-preview {
            background-color: #f8f8f8;
            background-size: cover;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-top: 7px;
            width: 400px;
            height: 300px;
        }

        .cropit-preview-image-container {
            cursor: move;
        }

        .image-size-label {
            margin-top: 10px;
        }

        input {
            display: block;
        }

        button[type="submit"] {
            margin-top: 10px;
        }

        #result {
            margin-top: 10px;
            width: 900px;
        }

        #result-data {
            display: block;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            word-wrap: break-word;
        }

        .slidecontainer {
            width: 100%;
        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 25px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            background: rgb(215,57,37);
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            background: rgb(215,57,37);
            cursor: pointer;
        }
    </style>
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Create Product</h3>
                            <br>
                            @include('errors.error')
                            <a href="{{ route('products.index') }}"><button class="btn btn-flat btn-success">Back</button></a>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <input type="text" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="number" name="price" step="any" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Size</label>
                                    <input type="text" name="size" class="form-control" id="exampleInputEmail1" placeholder="Enter Size" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nutrition Label</label>
                                    <input type="text" name="nutrition_label" class="form-control" id="exampleInputEmail1" placeholder="Enter Nutrition Label" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Inventory status</label>
                                    <input type="number" name="inventory_status" class="form-control" id="exampleInputEmail1" placeholder="Enter Inventory Status" required>
                                </div>

                                <div class="form-group image-editor slidecontainer">
                                    <label for="exampleInputEmail1">Product Image</label>
                                    <input type="file" class="cropit-image-input" required>
                                    <div class="cropit-preview"></div>
                                    <br>
                                    <div class="col-lg-5">
                                        <input type="range" class="cropit-image-zoom-input slider" id="myRange">
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="hidden" name="image-data" class="hidden-image-data" />
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>

    @include('admin.layouts.footer')
</div>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>

<!-- Morris.js charts -->
<script src="{{ asset('admin/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/morris.js/morris.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin/bower_components/chart.js/Chart.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>

<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>

<script>
    $(function() {
        $('.image-editor').cropit({'minZoom':2});

        $('form').submit(function() {
            // Move cropped image data to hidden input
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);

            // Print HTTP request params
            var formValue = $(this).serialize();
            $('#result-data').text(formValue);

            // Prevent the form from actually submitting
            return true;
        });
    });
</script>
</body>
</html>
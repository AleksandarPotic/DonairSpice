@extends('admin.layouts.app')

@section('Products','active')
@section('body-part')

    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Products</h3>
                            <br>
                            <a href="{{ route('products.create') }}"><button class="btn btn-flat btn-success">New</button></a>
                            @if(session()->has('message_alert'))
                                <br>
                                <br>
                                <p class="alert alert-success">{{ session('message_alert') }}</p>
                            @endif
                            <p class="alert alert-success" id="change_alert" style="margin-top: 10px;display: none">Successfully changed inventory status!</p>
                        </div>
                        <!-- /.box-header -->
                        
                              <div id="reload_div">
                                @foreach($products as $product)

                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 da">
                                        <ul class="list-inline"> 
                                            <li style="font-size: 2rem;" class="list-inline-item">Product ID: <b>{{ $loop->index + 1 }}</b></li>
                                            <li class="list-inline-item">Name: {{ $product->name }}</li>
                                            <li class="list-inline-item">Description: {{ $product->description }}</li>
                                            <li class="list-inline-item">Price: ${{ number_format($product->price,2) }}</li>
                                            <li class="list-inline-item">Size: {{ $product->size }}</li>
                                            <li class="list-inline-item">Inventory Status: {{ $product->inventory_status }}</li>
                                            <li class="list-inline-item">Nutrition Label: {{ $product->nutrition_label }}</li>

                                            <li class="list-inline-item">
                                                <img class="img-fluid" height="150" src="{{ Storage::url($product->image) }}"/>
                                            </li>
                                            
                                            <li class="list-inline-item">Inventory status:
                                                <a href="#" data-toggle="modal" data-target="#inventory_status" onclick="InventoryFunction('{{ $product->id }}','{{ $product->inventory_status }}')">
                                                    <button class="btn btn-flat btn-block btn-info"><span class="fa fa-cart-arrow-down"></span></button>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">Update:
                                                <a href="{{ route('products.edit',$product->id) }}">
                                                    <button class="btn btn-flat btn-block btn-warning"><span class="fa fa-edit"></span></button>
                                                </a>
                                            </li>

                                            <li class="list-inline-item">Delete: 
                                                <form id="delete-form-{{ $product->id }}" method="POST" action="{{ route('products.destroy',$product->id) }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="" onclick="if(confirm('Do you really want to delete this product?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $product->id }}').submit();
                                                    }else{
                                                        event.preventDefault();
                                                    }">
                                                    <button class="btn btn-flat btn-block btn-danger"><span class="fa fa-trash"></span></button>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                @endforeach
                              </div>

                    <!-- Modal Delete -->
                        <div class="modal fade modal-delete" id="inventory_status" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h4>Inventory status</h4>
                                        <input type="number" id="inventory_status_val" class="form-control">
                                        <input type="hidden" id="inventory_status_id" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info btn-block btn-flat" onclick="ChangeInventory()" data-dismiss="modal">Change</button>
                                        <button type="button" class="btn btn-default btn-block btn-flat" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>

@endsection

@section('script-part')
    <script>
        function InventoryFunction(id,status) {
            $("#inventory_status_val").val(status);
            $("#inventory_status_id").val(id);
        }
        
        function ChangeInventory() {

            var status = $("#inventory_status_val").val();
            var id = $("#inventory_status_id").val();

            $.post('/admin/products/change', {'id': id,'status': status,'_token': $('input[name=_token]').val()}, function (data) {
                $("#reload_div").load(location.href + " #reload_div");
                $("#change_alert").show();

                setTimeout(function () {
                    $("#change_alert").hide();
                }, 3000);
            });
        }
    </script>

    @endsection
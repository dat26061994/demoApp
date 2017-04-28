@extends('layouts.admin')
@section('content')

        <!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group"{{ $errors->has('txtName') ? ' has-error' : '' }}>
                        <label>Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Username"
                               value="{{ old('txtName',isset($product) ? $product['name'] :null) }}"/>
                        @if ($errors->has('txtName'))
                            <div class="alert alert-danger">
                                <span>{{ $errors->first('txtName') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group"{{ $errors->has('txtPrice') ? ' has-error' : '' }}>
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Price"
                               value="{{ old('txtPrice',isset($product) ? $product['price'] :null) }}"/>
                        @if ($errors->has('txtPrice'))
                            <div class="alert alert-danger">
                                <span>{{ $errors->first('txtPrice') }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="{{ $product['image'] }}" name="img_current" class="img_current">
                        <img src="{{ url('resources/upload/'.$product['image']) }}" alt=""
                             style="height:100px;width:100px">
                    </div>
                    <div class="form-group"{{ $errors->has('fImages') ? ' has-error' : '' }}>
                        <label>Images</label>
                        <input type="file" name="fImages">
                        @if ($errors->has('fImages'))
                            <div class="alert alert-danger">
                                <span>{{ $errors->first('fImages') }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="form-group"{{ $errors->has('txtDescription') ? ' has-error' : '' }}>
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3"
                                  name="txtDescription">{{ old('txtDescription',isset($product) ? $product['description'] :null) }}</textarea>
                        @if ($errors->has('txtDescription'))
                            <div class="alert alert-danger">
                                <span>{{ $errors->first('txtDescription') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Orders</label>
                        <input class="form-control" name="txtOrders" placeholder="Please Enter Orders"
                               value="{{ old('txtOrders',isset($product) ? $product['orders'] :null) }}"/>
                    </div>
                    <div class="form-group">
                        <label>Product Status</label>
                        <label class="radio-inline">
                            <input type="radio" name="rdoStatus" value="1" @if($product["status"] == 1) checked @endif>Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="rdoStatus" value="2" @if($product["status"] == 2) checked @endif>InActive
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Product Edit</button>

                    <form>
            </div>
@endsection
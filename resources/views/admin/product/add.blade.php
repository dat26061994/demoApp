@extends('layouts.admin')
@section('content')

        <!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                <form action="{{ route('admin.product.getAdd') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group"{{ $errors->has('txtName') ? ' has-error' : '' }}>
                        <label>Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Username"
                               value="{{ old('txtName') }}"/>
                        @if ($errors->has('txtName'))
                            <div class="alert alert-danger">
                                <span>{{ $errors->first('txtName') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group"{{ $errors->has('txtPrice') ? ' has-error' : '' }}>
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Password"
                               value="{{ old('txtPrice') }}"/>
                        @if ($errors->has('txtPrice'))
                            <div class="alert alert-danger">
                                <span>{{ $errors->first('txtPrice') }}</span>
                            </div>
                        @endif
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
                                  name="txtDescription">{{ old('txtDescription') }}</textarea>
                        @if ($errors->has('txtDescription'))
                            <div class="alert alert-danger">
                                <span>{{ $errors->first('txtDescription') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Orders</label>
                        <input class="form-control" name="txtOrders" placeholder="Please Enter Orders"
                               value="{{ old('txtOrders') }}"/>
                    </div>
                    <div class="form-group">
                        <label>Product Status</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" checked="" type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="2" type="radio">Invisible
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
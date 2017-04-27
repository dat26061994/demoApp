@extends('user.master')
@section('content')
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{ url('resources/upload/'.$product_detail->image) }}" alt=""/>
                <h3>ZOOM</h3>
            </div>


        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="{{ url('public/images/shop/new.jpg') }}" class="newarrival" alt=""/>
                <h2>{{ $product_detail->name }}</h2>
                <span>
                  <span>US ${{ $product_detail->price }}</span>
                  <label>Quantity:</label>
                  <input type="text" value="3"/>
                </span>
                <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""/></a>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->
@endsection 
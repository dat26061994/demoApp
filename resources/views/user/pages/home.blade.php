@extends('user.master')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">All Products</h2>

        @foreach($product as $item)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="{{ url('product',[$item->id,$item->name]) }}"><img
                                        src="{{ url('resources/upload/'.$item->image) }}" alt=""/></a>
                            <h2>${{ $item->price }}</h2>
                            <a href="{{ url('product',[$item->id,$item->name]) }}"><p>{{ $item->name }}</p></a>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                cart</a>
                        </div>

                    </div>

                </div>
            </div>
        @endforeach

        <ul class="pagination">
            @if(($product->currentPage()) != 1)
                <li><a href="{{ str_replace('/?','?',$product->url($product->currentPage() - 1)) }}">Prev</a>
                </li>
            @endif
            @for($i = 1 ; $i <= $product->lastPage() ; $i++)
                <li class="{{ ($product->currentPage() == $i) ? 'active' : '' }}">
                    <a href="{{ str_replace('/?','?',$product->url($i)) }}">{{ $i }}</a>
                </li>
            @endfor
            @if(($product->currentPage()) != ($product->lastPage()))
                <li><a href="{{ str_replace('/?','?',$product->url($product->currentPage() + 1)) }}">Next</a>
                </li>
            @endif
        </ul>
    </div><!--features_items-->
    </div>
@endsection
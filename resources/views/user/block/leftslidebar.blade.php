<style>
    .bestseller img {
        width: 100%;
        height: 100%;
    }

    .thumbnail {
        border: none;
    }
</style>
<div class="left-sidebar">
    <div class="row">
        <h2>Best Seller</h2>
        @foreach($product_seller as $item_seller)

            <div class="row">
                <div class="col-md-5">
                    <a href="{{ url('product',[$item_seller->id,$item_seller->name]) }}" class="thumbnail"><img src="{{ url('resources/upload/'.$item_seller->image) }}"
                                                      alt=""></a>
                </div>
                <div class="col-md-7">
                    <div class="product_name">{{ $item_seller->name }}</div>
                    <div class="product_price">${{ $item_seller->price }}</div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>

    <div class="row">
        <h2>Latest Products</h2>
        @foreach($product_latest as $item_product_latest)

            <div class="row">
                <div class="col-md-5">
                    <a href="{{ url('product',[$item_product_latest->id,$item_product_latest->name]) }}" class="thumbnail"><img src="{{ url('resources/upload/'.$item_product_latest->image) }}"
                                                      alt=""></a>
                </div>
                <div class="col-md-7">
                    <div class="product_name">{{ $item_product_latest->name }}</div>
                    <div class="product_price">${{ $item_product_latest->price }}</div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>


</div>
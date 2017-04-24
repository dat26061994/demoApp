<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model {

		protected $table = 'products';

		protected $fillable = ['name','price','image','description','orders','status','user_id'];

		public $timestamps = true;

		public function getAllProduct()
		{
			$product = DB::table('products')->select('id','name','price','image','description','status')->orderBy('id','DESC')->paginate(9);
			return $product;
		}

		public function getLastproduct()
		{
			$lastest_product = DB::table('products')->select('id','name','image','price')->orderBy('id','DESC')->skip(0)->take(3)->get();
			return $lastest_product;
		}

		public function getSellerProduct()
		{
			$seller_product = DB::table('products')->select('id','name','price','image')->orderBy('orders','DESC')->skip(0)->take(3)->get();
			return $seller_product;
		}

		public function getProductDetail($id){
			$product_detail = DB::table('products')->where('id',$id)->first();
			return $product_detail;
		}

		public function getListProduct(){
			$product = Product::select('id','name','orders','status','price','created_at','image','updated_at')->orderBy('id','DESC')->get()->toArray();
			return $product ; 
		}

		public function findProduct(){
			$findProduct = Product::find($id);
			return $findProduct;
		}


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productModel = new Product;
        $product = $productModel->getAllProduct();
        $product_latest = $productModel->getLastproduct();
        $product_seller = $productModel->getSellerProduct();
        return view('user.pages.home', compact('product', 'product_latest', 'product_seller'));
    }

    public function thisProduct($id)
    {
        $productModel = new Product;
        $product_detail = $productModel->getProductDetail($id);
        $product_latest = $productModel->getLastproduct();
        $product_seller = $productModel->getSellerProduct();
        return view('user.pages.product', compact('product_detail', 'product_latest', 'product_seller'));
    }
}

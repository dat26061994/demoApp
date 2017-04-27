<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Product;
use Auth;
use Illuminate\Http\Request;
use File;
use input;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getList()
    {
        $product = new Product;
        $data = $product->getListProduct();
        return view('admin.product.list', compact('data'));
    }

    public function getAdd()
    {

        return view('admin.product.add');
    }

    public function postAdd(ProductRequest $request)
    {
        $file_name = $request->file('fImages')->getClientOriginalName();
        $product = new Product;

        $product->name = $request->txtName;
        $product->price = $request->txtPrice;
        $product->image = $file_name;
        $product->description = $request->txtDescription;
        $product->orders = $request->txtOrders;
        $product->status = $request->rdoStatus;
        $product->user_id = Auth::user()->id;
        $request->file('fImages')->move('resources/upload/', $file_name);
        $product->save();
        return redirect()->route('admin.product.getList')->with([
            'flash_level' => 'success',
            'flash_message' => 'Success!! Complete Add Product'
        ]);
    }

    public function getDelete($id)
    {
        $productModel = new Product;
        $product = $productModel->findProduct($id);
        File::delete('resources/upload/' . $product->image);
        $product->delete($id);
        return redirect()->route('admin.product.getList')->with([
            'flash_level' => 'success',
            'flash_message' => 'Success!! Delete a Product'
        ]);
    }

    public function getEdit($id)
    {
        $productModel = new Product;
        $product = $productModel->findProduct($id);
        $isset = count($product);
        if ($isset > 0) {
            return view('admin.product.edit', compact('product', 'id'));
        } else {
            return redirect()->route('admin.product.getList')->with([
                'flash_level' => 'danger',
                'flash_message' => 'Do not find Product'
            ]);
        }

    }

    public function postEdit($id, Request $request)
    {
        $productModel = new Product;
        $this->validate($request,
            [
                'txtName' => 'required|max:100',
                Rule::unique('products')->ignore($productModel->id),
                'txtPrice' => 'required|numeric|max:10000000000',
                'txtDescription' => 'max:300',
                'fImages' => 'mimes:jpeg,jpg,png,gif|max:10240'
            ],
            [
                'txtName.unique' => 'The product name is exists',
                'txtName.required' => 'Product name not null',
                'txtName.max' => 'Product Name max is 100 digits',
                'txtPrice.required' => 'Price not null',
                'txtPrice.numeric' => 'Price must be number',
                'txtPrice.max' => 'Price is so much',
                'txtDescription.max' => 'Description is max 300 ditgits',
                'fImages.mimes' => 'This is not image(jpeg,gif,png or jpg)',
                'fImages.max' => 'The image size is so much'
            ]


        );

        $product = $productModel->findProduct($id);

        $product->name = $request->txtName;
        $product->price = $request->txtPrice;
        $product->image;
        $product->description = $request->txtDescription;
        $product->orders = $request->txtOrders;
        $product->status = $request->rdoStatus;
        $product->user_id = Auth::user()->id;
        $img_current = 'resources/upload/' . $request->img_current;

        if (!empty($request->file('fImages'))) {
            $file_name = $request->file('fImages')->getClientOriginalName();
            $product->image = $file_name;
            $request->file('fImages')->move('resources/upload/', $file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }
        $product->save();
        return redirect()->route('admin.product.getList')->with([
            'flash_level' => 'success',
            'flash_message' => 'Success!! Edit a Product'
        ]);
    }


}

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
        $product = new Product;
        $randomString = str_random(10);
        $product->name = $request->txtName;
        $product->price = $request->txtPrice;
        $product->description = $request->txtDescription;
        $product->orders = $request->txtOrders;
        $product->status = $request->rdoStatus;
        $product->user_id = Auth::user()->id;
        if (!empty($request->file('fImages'))) {
            $fileName = $randomString . '-' . $request->file('fImages')->getClientOriginalName();
            $product->image = $fileName;
            $request->file('fImages')->move('resources/upload/', $fileName);
        } else {
            $product->image = "";
        }

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
        $count = count($product);
        if ($count > 0) {
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
                'txtName' => 'required|max:100|regex:/(^[A-Za-z0-9 ]+$)+/|unique:products,name,' . $id,
                'txtPrice' => 'required|numeric|max:10000000000',
                'txtDescription' => 'required|max:300',
                'fImages' => 'mimes:jpeg,jpg,png,gif|max:10240'
            ],
            [
                'txtName.required' => 'Product name not null',
                'txtName.regex' => 'Product name only contain letters and spaces.',
                'txtName.unique' => 'Product name is Exists',
                'txtName.max' => 'Product Name max is 100 digits',
                'txtPrice.required' => 'Price not null',
                'txtPrice.numeric' => 'Price must be number',
                'txtPrice.max' => 'Price is so much',
                'txtDescription.required'  =>   'Please enter the description',
                'txtDescription.max' => 'Description is max 300 ditgits',
                'fImages.mimes' => 'This is not image(jpeg,gif,png or jpg)',
                'fImages.max' => 'The image size is so much'
            ]


        );

        $product = $productModel->findProduct($id);
        $randomString = str_random(10);
        $product->name = $request->txtName;
        $product->price = $request->txtPrice;
        $product->description = $request->txtDescription;
        $product->orders = $request->txtOrders;
        $product->status = $request->rdoStatus;
        $product->user_id = Auth::user()->id;
        $imgCurrent = 'resources/upload/' . $request->img_current;

        if (!empty($request->file('fImages'))) {
            $fileName = $randomString . '-' . $request->file('fImages')->getClientOriginalName();
            $product->image = $fileName;
            $request->file('fImages')->move('resources/upload/', $fileName);
            if (File::exists($imgCurrent)) {
                File::delete($imgCurrent);
            }
        }
        $product->save();
        return redirect()->route('admin.product.getList')->with([
            'flash_level' => 'success',
            'flash_message' => 'Success!! Edit a Product'
        ]);
    }


}

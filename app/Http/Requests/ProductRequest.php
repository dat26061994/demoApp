<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtName' => 'required|unique:products,name|max:100|regex:/(^[A-Za-z0-9 ]+$)+/',
            'txtPrice' => 'required|numeric|max:10000000000',
            'fImages' => 'mimes:jpeg,jpg,png,gif|max:10240',
            'txtDescription' => 'required|max:300'
        ];
    }

    public function messages()
    {
        return [

            'txtName.required' => 'Please Enter The Product Name',
            'txtName.regex' => 'Product name only contain letters and spaces.',
            'txtName.unique' => 'Product Name is exists!!',
            'txtName.max' => 'The Product Name max is 100 digits',
            'txtPrice.required' => 'Please enter the the product price !!',
            'txtPrice.numeric' => 'The Price must number!!',
            'txtPrice.max' => 'The Price max is 10 digits',
            'fImages.mimes' => 'The is not image(jpeg,jpg,png,gif)',
            'fImages.max' => 'The size Images is to 10 MB',
            'txtDescription.required' => 'Description is not null'
            'txtDescription.max' => 'Description is max 300 ditgits'
        ];
    }

}

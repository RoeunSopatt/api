<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Products\Product;
use App\Services\FileUpload;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductController extends MainController
{
    //
    public function getData(Request $request){
        
        //declare variable
        $data = Product::select('*')->with(['type']);

        if($request->key && $request->Key != ''){

            $data = $data->where('code', 'LIKE', '%' . $request->Key . '%')->OrWhere('name', 'LIKE', '%' . $request->Key .'%');

        }

        if($request->type && $request->type != 0){

            $data = $data->where('type_id', $request->type);
        }

        $data = $data->orderBy('id','desc')->paginate($request->limit ? $request->limit :10,'per_page');

        return response()->json($data,Response::HTTP_OK);

    }

    public function createData(Request $request){

        //check validation
        $this->validate(
            $request, 
            [
                'name'              => 'required|max:50',
                'code'              => 'required|max:20',
                'unit_price'        => 'required|numeric',
                'type_id'           => 'required|exists:products_type,id'
            ],

            [
                'name.required'       =>'សូមបញ្ចូលឈ្មោះផលិតផល',
                'name.max'            => 'ឈ្មោះផលិតផលមិនអាចលើសពី៥០ខ្ទង់',

                'code.required'       => 'សូមបញ្ចូលឈ្មោះលេខកូដផលិតផល',
                'code.max'              => 'សូមបញ្ចូលឈ្មោះលេខកូដផលិតផលមិនអាចលើសពី២០ខ្ទង់',

                'unit_price.required'   => 'សូមបញ្ចូលតម្លៃរាយ',
                'unit_price.numeric'    => 'សូមបញ្ចូលតម្លៃរាយជាលេខ',

                'type_id.exists'        => 'សូមជ្រើសរើសឈ្មោះផលិតផល អោយបានត្រឹមត្រូវ កុំបោកពេក'
            ],

        );
        $product                =   new Product;
        $product->name          =   $request->name;
        $product->code          =   $request->code;
        $product->type_id       =   $request->type_id;
        $product->unit_price    =   $request->unit_price;

            // ===>> Save To DB
        $product->save();

        // ===>> Image Upload
        if ($request->image) {

            // Need to create folder before storing images
            $folder = Carbon::today()->format('d-m-y');

            // ===>> Send to File Service
            $image  = FileUpload::uploadFile($request->image, 'products', $request->fileName);

            // ===>> Check if image has been successfully uploaded
            if ($image['url']) {

                // Map field of table in DB Vs. uri from File Service
                $product->image     = $image['url'];

                // ===>> Save to DB
                $product->save();

            }
        }
        // ===> Success Response Back to Client
        return response()->json([
            'data'      =>  Product::select('*')->with(['type'])->find($product->id),
            'message'   => 'ផលិតផលត្រូវបានបង្កើតដោយជោគជ័យ។'
        ],Response::HTTP_OK);
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\MainController;
use App\Models\Products\Type;
use Illuminate\Http\Request;

class ProductTypeController extends MainController
{
    //
    public function create(Request $request){

        $this->validate(
            $request,[
                "name"=> "required|max:20",
            ],
            [
                "name.required"=> "សូមបញ្ចូលឈ្មោះម៉ាកផលិតផល",
                "name.max"=> "ឈ្មោះម៉ាកផលិតផលមិនអាចលើសពី២០ខ្ទង់",
            ]
        );

        $data =      new Type;
        $data->name = $request->name;
        $data->save();
        return response()->json([
            'data'  => $data,
            'message'=>'ទិន្នន័យត្រូវបានបង្កើតដោយជោគជ័យ។'
        ],Response::HTTP_OK);
    }
}

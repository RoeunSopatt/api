<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\MainController;
use App\Models\Products\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class ProductTypeController extends MainController
{
    //
    public function getData(Request $req)
    {
        // តាង data ជាទិន្នន័យដែលត្រូវរក
        $data = Type::select("id", 'name')
        // ->with([
        //     'products:id,Type_id,name,image'
        // ])
        ->withCount([
            'products as n_of_products'
        ]);

        // ===>> Filter data
        if ($req->key && $req->key != ''){
            $data = $data->where('name', 'LIKE', '%'.$req->key.'%'); //search by key
        }

        // ===>> Get data from DB
        $data = $data->orderBy('id', 'DESC')
        ->get();

        // ===>> Return data to client
        return response()->json([
            'status'   =>'ជោគជ័យ',
            'message'   => 'getប្រភេទផលិតផលជោគជ័យ!',
            'data'  => $data,
        ],Response::HTTP_OK);;
    }

    public function createProductType(Request $request){

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
    public function update(Request $request,$id=0){
        $this->validate(
            $request,[
                'name'  => 'required|max:20',
            ],
            [
                'name.required'=> 'សូមបញ្ចូលឈ្មោះម៉ាកផលិតផល',
                'name.max'=> 'ឈ្មោះម៉ាកផលិតផលមិនអាចលើសពី២០ខ្ទង់',
            ]
        );
        $data  = Type::find($id);

        if($data){
            $data->name = $request->name;
            $data->save();
            return response()->json([
                'status'   =>'ជោគជ័យ',
                'message'   => 'ប្រភេទផលិតផលត្រូវបានកែប្រែជោគជ័យ!',
                'data'  => $data,
            ],Response::HTTP_OK);
        }else{
            return response()->json([
                'status'    => 'បរាជ័យ',
                'message'=> 'ទិន្នន័យមិនត្រឹមត្រូវ',
            ],Response::HTTP_BAD_REQUEST);
        }

    }

    public function delete($id= 0){
        $data =Type::find($id);

        if( $data ){
            $data->delete();
            return response()->json([
                'status'    =>'ជោគជ័យ',
                'message' => 'data has been deleted!',

            ],Response::HTTP_OK);
        }else{
            return response()->json([
                'status'  => 'បរាជ័យ',
                'message' => 'ទិន្នន័យមិនត្រឹមត្រូវ',
            ],Response::HTTP_BAD_REQUEST);
        }
    }
}

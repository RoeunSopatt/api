<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\Type;
use App\Services\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function getUserType(){

        $data=Type::get();

        return response()->json($data,Responese::HTTP_OK);
    }
    public function getData(Request $request){

        $data = User::select('id', 'name', 'phone', 'email', 'type_id', 'avatar', 'create_at', 'is_active')
        ->with(['type']);
        if($request->key && $request->key != ''){
            $data = $data->where('name','LIKE','%' . $request->key .'%')->Orwhere('phone', 'LIKE', '%' .$request->key .'%');

        }
        $data = $data->orderBy('id','desc')->paginate($request->limit? $request->limit: 10,);
        return response()->json($data,Responese::HTTP_OK);
    }

    public function view($id=0){

        $data =User::select('id','name','phone', 'phone', 'email', 'type_id', 'avatar', 'create_at', 'is_active')->with(['type'])->find( $id );

        if($data){
            return response()->json($data,Responese::HTTP_OK);
        }else{

            return response()->json([
                'status'=>'fail',
                'message'=> 'រកទិន្នន័យមិនឃើញក្នុងប្រព័ន្ធ'
            ],Responese::HTTP_OK);
        }
    }

    public function create(Request $request){
        $this->validate(
            $request,
            [
                'type_id'   => 'required|min:1|max:20',
                'name'      => 'required|min:1|max:20',
                'phone'     => 'required|unique:user,phone',
                'password'    => 'required|min:6|max:20',
                'email'         => 'unique:user,email',
            
            ],
            [
                'name.required' => 'សូមវាយបញ្ចូលឈ្មោះរបស់អ្នក',
                'phone.required' => 'សូមវាយបញ្ចូលលេខទូរស័ព្ទរបស់អ្នក',
                'phone.unique' =>'លេខទូរស័ព្ទនេះត្រូវបានប្រើប្រាស់រួចហើយនៅក្នុងប្រព័ន្ធ',
                'email.unique'=> 'អ៊ីម៉េលនេះបានប្រើរួចរាល់ហើយ',
                'password.required'=> 'សូមវាយបញ្ចូលពាក្យសម្ងាត់របស់អ្នក',
                'password.min'=> 'សូមបញ្ចូលលេខសម្ងាត់ធំជាងឬស្មើ៦',
                'password.mាខ'=> 'សូមបញ្ចូលលេខសម្ងាត់តូចឬស្មើ២០',
            ]
        );

        $user =new User;
        $user->name = $request->name;
        $user->type_id = $request->type_id;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_active=1;
        $user->avatar = '';
        if ($request->image) { // Yes

            // Call to File Service
            $image     = FileUpload::uploadFile($request->image, 'users', $request->fileName);

            // Only valid url can be used.
            if ($image['url']) {
                $user->avatar = $image['url'];
            }
            $user->save();

        // ===> Success Response Back to Client
            return response()->json([
                'user'  => User::select('id', 'name', 'phone', 'email', 'type_id', 'avatar', 'created_at', 'is_active')->with(['type'])->find($user->id),
                'message' => 'User: ' . $user->name . ' has been successfully created.'
            ], Response::HTTP_OK);


        }
    }

    public function update(Request $req, $id = 0){

        // ==>> Check validation
        $this->validate(
            $req,
            [
                'name'     => 'required',
                'phone'    => 'required',
            ],
            [
                'name.required'     => 'សូមវាយបញ្ចូលឈ្មោះរបស់អ្នក',
                'phone.required'    => 'សូមវាយបញ្ចូលលេខទូរស័ព្ទរបស់អ្នក',
            ]
        );

        // Unique Phone Number Validation
        $check  = User::where('id','!=',$id)->where('phone',$req->phone)->first();
        if($check){ // Yes

            // ===> Failed Response Back to Client
            return response()->json([
                'status'    => 'បរាជ័យ',
                'message'   => 'លេខទូរស័ព្ទនេះត្រូវបានប្រើប្រាស់រួចហើយនៅក្នុងប្រព័ន្ធ',
            ], Response::HTTP_BAD_REQUEST);

        }

         // Unique Email Validation
        $check  = User::where('id','!=',$id)->where('email',$req->email)->first();
        if($check){ // Yes

            // ===> Failed Response Back to Client
            return response()->json([
                'status'    => 'បរាជ័យ',
                'message'   => 'អ៊ីមែលនេះមានក្នុងប្រព័ន្ធរួចហើយ',
            ], Response::HTTP_BAD_REQUEST);

        }

        //==============================>> Start Updating data
        // Get Data from DB
        $user = User::select('id', 'name', 'phone', 'email', 'type_id', 'avatar', 'created_at', 'is_active')->with(['type'])->find($id);
        if ($user) { // Yes

            // Mapping between database table field and requested data from client
            $user->name      =   $req->name;
            $user->type_id   =   $req->type_id;
            $user->phone     =   $req->phone;
            $user->email     =   $req->email;
            $user->is_active =   $req->is_active;

            // Call to File Service
            if ($req->image) {

                // Call File Service
                $image     = FileUpload::uploadFile($req->image, 'users', $req->fileName);

                // Only valid url can be used.
                if ($image['url']) {

                    // Mapping between database table field and uri from File Service
                    $user->avatar = $image['url'];

                }
            }

            // ===>> Save to DB
            $user->save();

            // ===>> Success Response Back to Client
            return response()->json([
                'status'    => 'ជោគជ័យ',
                'message'   => 'ទិន្នន័យត្រូវបានកែប្រែ',
                'user'      => $user,
            ], Response::HTTP_OK);

        } else { // No

            // ===>> Failed Response Back to Client
            return response()->json([
                'status'    => 'បរាជ័យ',
                'message'   => 'ទិន្នន័យដែលផ្តល់ឲ្យមិនត្រូវទេ',
            ], Response::HTTP_BAD_REQUEST);

        }
    }

}

<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Services\FileUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProfileController extends Controller
{
    //
    public function view(){
        $auth =JWTAuth::parseToken()->authenticate();

        $user=User::select("id","name","phone","email","avatar")->where('id',$auth->id)->first();
        return response()->json($user,Response::HTTP_OK);
    }
    public function update(Request $req){

        // ===>>> Data Validation
        $this->validate(
            $req,
            [
                'name'  => 'required|max:60',
                'phone' => 'required|min:9|max:10',
            ],
            [
                'name.required'     => 'សូមបញ្ចូលឈ្មោះ',
                'name.max'          => 'ឈ្មោះមិនអាចលើសពី៦០',
                'phone.required'    => 'សូមបញ្ចូលលេខទូរស័ព្ទ',
                'phone.min'         => 'សូមបញ្ចូលលេខទូរស័ព្ទយ៉ាងតិច៩ខ្ទង់',
                'phone.max'         => 'លេខទូរស័ព្ទយ៉ាងច្រើនមិនលើសពី១០ខ្ទង់'

            ]
        );

        // ===>> Get current logged user by token
        $auth = JWTAuth::parseToken()->authenticate();

        // ===>> Start to update user
        $user = User::findOrFail($auth->id);

        // ===>> Check if user is valid
        if ($user) { // Yes

            // Mapping between database table field and requested data from client
            $user->name         = $req->name;
            $user->phone        = $req->phone;
            $user->email        = $req->email;
            $user->updated_at   = Carbon::now()->format('Y-m-d H:i:s');

             // ===>> Upload Avatar to File Service
             if ($req->avatar) {

                // ===>> Create Folder by Date
                $folder = Carbon::today()->format('d-m-y');

                // ===>> Upload Image to File Service
                $avatar  = FileUpload::uploadFile($req->avatar, 'my-profile/', $req->fileName);

                // ===>> Check if success upload
                if ($avatar['url']) { // Yes

                    $user->avatar     = $avatar['url'];
                }
            }

            // ===>> Save to DB
            $user->save();

            // ===>> Success Response Back to Client
            return response()->json([
                'status'    => 'ជោគជ័យ',
                'message'   => '* ព័ត៌មានផ្ទាល់ខ្លួនរបស់អ្នកត្រូវបានកែប្រែ *',
                'data'      => [
                        'name'  => $user->name,
                        'phone' => $user->phone,
                        'email' => $user->email,
                        'avatar' => $user->avatar,
                ]
            ], Response::HTTP_OK);

        }else{

            // ===>> Failed Response Back to Client
            return response()->json([
                'status' => 'error',
                'message' => 'ទិន្នន័យរបស់អ្នកមិនត្រឹមត្រូវ'
            ], Response::HTTP_BAD_REQUEST);

        }
    }


}

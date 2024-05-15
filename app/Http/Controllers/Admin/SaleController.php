<?php

namespace App\Http\Controllers\Admin;

// ====>> Core Library
use Illuminate\Http\Request; // For Getting requested Payload from Client
use Illuminate\Http\Response; // For Responsing data back to Client

// ====>> Third Party Library
use Tymon\JWTAuth\Facades\JWTAuth; // Get Current Logged User

// ====>> Custom Library
// Controller
use App\Http\Controllers\MainController;

// Model
use App\Models\Orders\Order;

class SaleController extends MainController
{
    private function _isValidDate($date){

        if (false === strtotime($date)) {
            return false;
        } else {
            return true;
        }

    }

    public function getData(Request $req){

        // ===>> Get Data from DB
        $data = Order::select('*')
        ->with([
            'cashier', // M:1
            'details' // 1:M
        ]);

        // =======================>>>>>>>> Filter Data <<<<<<<<<<< ====================================
        // ===>> Date Range
        if ($req->from && $req->to && $this->_isValidDate($req->from) && $this->_isValidDate($req->to)) {
            $data = $data->whereBetween('created_at', [$req->from . " 00:00:00", $req->to . " 23:59:59"]);
        }

        // ===>> Search receipt number
        if ($req->receipt_number && $req->receipt_number != "") { // Unless receip_number requested from client is sent and having value
            $data = $data->where('receipt_number', $req->receipt_number);
        }

        // ==>> search filter status
        if ($req->receipt_number) {
            $data = $data->where('receipt_number', $req->receipt_number);
        }

        // ===>> If Not admin, get only record that this user make order
        $user = JWTAuth::parseToken()->authenticate();
        if ($user->type_id == 2) { //Manager
            $data = $data->where('cashier_id', $user->id);
        }

        $data = $data->orderBy('id', 'desc')
        ->paginate($req->limit ? $req->limit : 10);

        // ===>> Success Response Back to Client
        return response()->json($data, Response::HTTP_OK);
    }

    public function delete($id = 0){

        // ===>> Finding Data with specific ID from DB
        $data = Order::find($id);

        //======>> Start deleting data
        if ($data) { // Yes

            // ===>> Delete from DB
            $data->delete();

            // ===>> Success Response Back to Client
            return response()->json([
                'status'    => 'ជោគជ័យ',
                'message'   => 'ទិន្នន័យត្រូវបានលុប',
            ], Response::HTTP_OK);

        } else { // No

            // ===>> Failed Response Back to Client
            return response()->json([
                'status'    => 'បរាជ័យ',
                'message'   => 'ទិន្នន័យមិនត្រឹមត្រូវ។',
            ], Response::HTTP_BAD_REQUEST);

        }
    }

}

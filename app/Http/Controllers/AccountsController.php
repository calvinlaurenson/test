<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Helper\ResponseObject;
use Illuminate\Support\ServiceProvider;
use DateTime;

class AccountsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');

        $this->validate($request, [
            'amount' => 'sometimes|interger',
            'user_id' => 'sometimes|interger',
            'latest' => 'sometimes|boolean'
        ]);
    }
    
    public function index() {
        return response('Method not allowed.', 400);
    }

    /**
    * Get a users accounts based on the user ID
    *
    * api/accounts/{user_id}
    */
    public function accounts(Request $request, $user_id = null) {
        $status = false;
        $msg = "Request failed";
        $code = 0;
        $call_id = $request->get('call_id');

        if(!is_numeric($user_id)) {
            $msg = "Bad input";
            $return_response = ResponseObject::result($status, $msg, 'data', null, $code, $call_id);
            return response()->json($return_response);
        }

        $data = DB::table('users')
                ->where('id', $user_id)
                ->get();

        if(!empty($data)) {
            $status = true;
            $msg = "Request success";
            $code = 1;
        }

        $return_response = ResponseObject::result($status, $msg, 'data', $data, $code, $call_id);
        return response()->json($return_response);
    }

    //
}

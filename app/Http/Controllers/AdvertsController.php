<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Helper\ResponseObject;
use Illuminate\Support\ServiceProvider;
use DateTime;

class AdvertsController extends Controller
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

    
    /**
    * Returns a number of adverts
    *
    * api/adverts/{amount}
    */
    public function index(Request $request, $amount = 0) {
        $status = false;
        $msg = "Request failed";
        $code = 0;
        $call_id = $request->get('call_id');

        if($amount == 0) {
            $data = DB::table('adverts')
            ->get();
        } else {
            $data = DB::table('adverts')
            ->limit($amount)
            ->get();
        }
        
        if(!empty($data)) {
            $status = true;
            $msg = "Request success";
            $code = 1;
        }

        $return_response = ResponseObject::result($status, $msg, 'data', $data, $code, $call_id);
        return response()->json($return_response);
    }

    /**
    * Returns adverts belonging to a user
    *
    * api/user_adverts/{user_id}/{latest}
    */
    public function usersAdverts(Request $request, $user_id = null, $latest = false) {
        $status = false;
        $msg = "Request failed";
        $code = 0;
        $call_id = $request->get('call_id');

        if($latest) {
            $data = DB::table('adverts')
                ->where('user_id', $user_id)
                ->orderby('id', 'desc')
                ->first();
        } else {
            $data = DB::table('adverts')
                ->where('user_id', $user_id)
                ->orderby('id', 'desc')
                ->get();
        }
        
        if(!empty($data)) {
            $status = true;
            $msg = "Request success";
            $code = 1;
        }

        $return_response = ResponseObject::result($status, $msg, 'data', $data, $code, $call_id);
        return response()->json($return_response);
    }

}

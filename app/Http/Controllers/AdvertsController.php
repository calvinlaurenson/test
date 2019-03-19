<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdvertsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($amount = 1) {
         $data = DB::table('adverts')
                ->limit($amount)
                ->get();

        return response()->json($data);

    }

    public function usersAdverts($user_id = null, $latest = false) {
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

        return response()->json($data);
    }

    //
}

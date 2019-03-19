<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AccountsController extends Controller
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

    public function index() {

    }

    public function accounts($user_id = null) {

        $data = DB::table('users')
                ->where('id', $user_id)
                ->get();

        return response()->json($data);
    }

    //
}

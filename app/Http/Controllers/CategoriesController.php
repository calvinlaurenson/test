<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index($amount = 0) {
        if($amount == 0) {
            $data = DB::table('categories')
            ->get();
        } else {
            $data = DB::table('categories')
            ->limit($amount)
            ->get();
        }

        return response()->json($data);
    }

    //
}

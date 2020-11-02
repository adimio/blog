<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UEController extends Controller
{
    public function ue(Request $request){
        if($request->method()=='GET'){
            return view('UE.testUe');
        }
        $data = $request->except('_token');
        dd($data);
    }
}

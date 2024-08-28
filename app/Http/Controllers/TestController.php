<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TestController extends Controller
{
    public function testdata(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
        ]);
        
        return Redirect::back()->with('success', 'Data berhasil ditambahkan');
    }
}

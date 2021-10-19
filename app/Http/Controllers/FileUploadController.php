<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function imageUpload(Request $request){
        // dd($request);

        // $fileName=$request->file('file')->getClientOriginalName();
        // $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        // return response()->json(['location'=>"/storage/$path"]);

        $imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "https://mdlc.herokuapp.com/storage/$imgpath"]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function imageUpload(Request $request){
        // dd($request);
        $file=$request->file('file')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $new_name = $filename.time().'.'.$extension;

        $disk = Storage::disk('google');
        $disk->put($new_name, file_get_contents($request->file('file') ));
        $url = $disk->url($new_name);
        return response()->json(['location'=>"$url"]);

        // $fileName=$request->file('file')->getClientOriginalName();
        // $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        // return response()->json(['location'=>"/storage/$path"]);

        // $imgpath = request()->file('file')->store('uploads', 'public');
        // return response()->json(['location' => "/storage/$imgpath"]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        $protocol = '';
        if (isset($_SERVER['HTTPS']) &&
            ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
            isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
            $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
            $protocol = 'https://';
        }
        else {
            $protocol = 'http://';
        }

        return view('welcome', ['images' => $images, 'protocol'=>$protocol]);
    }

    public function create()
    {

        return view('images');
    }

    public function stringExists($name)
    {
        $isset = 0;
        $result = DB::table('images')->where('name', $name)->get();

        if($result->count() == 1){
            $isset = 1;
        }else{
            $isset = 0;
        }
        return $isset;
    }

    public function random()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $name = '';
        $length = 10;

        for ($i = 0; $i < $length; $i++) {
            $name .= $characters[rand(0, $charactersLength - 1)];
        }
        return $name;
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required',
        ]);

        if ($request->hasfile('images')) {
            $images = $request->file('images');

            foreach($images as $image) {
                $extension = $image->extension();
                $name = $this->random().'.'.$extension;
                $result = $this->stringExists($name);

                if($result == 1){
                    $name = $this->random().'.'.$extension;
                }

                $path = $image->move('img', $name);

                Image::create([
                    'name' => $name,
                    'path' => '/'.$path
                ]);
            }
        }

        return back()->with('success', 'Images uploaded successfully');
    }
}

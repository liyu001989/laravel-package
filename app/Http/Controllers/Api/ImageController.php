<?php

namespace App\Http\Controllers\Api;

use Image;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function store(Request $request)
    {

        if ($request->image_content) {

            $path = 'images/'.str_random(40).'.png';

            $image = Image::make($request->image_content)
                ->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save('storage/'.$path);

        } else {
            $path = $request->file('image')->store('images', 'public');

            $image = Image::make('storage/'.$path)
                ->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save();
        }

        $image->insert('https://laravel.com/favicon.png', 'top-right', 10, 10)->save();

        return response()->json(['path' => Storage::disk('public')->url($path)]);
    }
}

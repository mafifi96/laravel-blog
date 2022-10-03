<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use Intervention\Image\Facades\Image;

class PostService{


    public static function uploadCover(PostRequest $request)
    {

        $file_name = $request->file('cover')->hashName();

        Image::make($request->file('cover'))->resize(1200, 300, function($constraint){
            $constraint->aspectRatio();
        })->save(public_path('uploads/'.$request->file('cover')->hashName()));

        return $file_name;
    }

    public static function trimTags(PostRequest $request)
    {
        $tags = preg_split('/\s+/', trim($request->tags, ' '));

        return json_encode($tags);
    }
}

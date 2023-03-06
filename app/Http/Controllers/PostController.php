<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Post $post, Request $request)
    {

        /*Validazione della Lead*/
        $this->requestValidate($request);
        //Salva Lead
        $post->name = $request['name'];
        $post->surname = $request['surname'];
        $post->date_of_birth = $request['date_of_birth'];
        $post->province_id = $request['province'];
        $post->city_id = $request['city'];
        $post->request = $request['request'];
        $post->save();
        return  redirect('grazie');
    }

    protected function requestValidate($request)
    {
        return $request->validate([
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'date_of_birth' => 'required',
            'province' => 'required',
            'city' => 'required',
            'request' => 'required|max:250',
        ]);
    }
}

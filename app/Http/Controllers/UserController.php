<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function getUsers()
    {
    	$user = User::get();

    	return respone()->json($user);
    }

    public function addUser(Request $bj)
    {
        $user = new User();

        $user->title = $bj->title;
        $user->genre = $bj->genre;
        $user->plot = $bj->plot;
        $user->code = $bj->code;

        $md = $user->save();
        if($md)
        	return "all ok";
        	return "all not ok";
    }

    public function updateUser(Request $bj)
    {
    	$user = User::where("code", $bj->code)->first();

    	$user->title = $bj->title;
        $user->genre = $bj->genre;
        $user->plot = $bj->plot;
        $user->code = $bj->code;

        $user->save();

    	return response()->json($user);
    }



    public function registrValid(Request $hme)
    {
        $valid = Validator::make($hme->all(), [
        'name' => 'required',
        'last_name' => 'required',
        'age' => 'required',
        'data_b' => 'required',
        'password' => 'required',
        'number' => 'required',
         ]);

        if ($valid->fails())
            return response()->json($valid->errors());

        $user = User::create($hme->all());
        return response()->json('Оk');
    }

 // ___19.04.2077___

     public function loginValid(Request $hme) 
    {
        $valid = Validator::make($hme->all(), [
            'number' => 'required',
            'password' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json($valid->errors());
        }

        if($user = User::where('number', $hme->number)->first())
        {
            if ($hme->password == $user->password)
            {
                //$user->api_token=Str::random(50);
                $user->api_token="0";
                $user->save();
                return response()->json('Ну ты и машина, api_token:'. $user->api_token);
            }
        }
                return response()->json('Ахаха, ты не то творишь, api_token:'. $user->api_token);
    }

    public function logoutValid(Request $hme)
        {
            $user = User::where("api_token",$hme->api_token)->first();

            if($user)
            {
                $user->api_token = "0";
                $user->save();
                return response()->json('Хорошая работа, Влад');
            }
        }
}
}

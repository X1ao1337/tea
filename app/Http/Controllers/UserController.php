<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


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

// ___19.04.2077___

    public function registrValid(Request $bj)
    {
        $valid = Validator::make($bj->all(),
        [
        'title' => 'required',
        'genre' => 'required',
        'plot' => 'required',
        'code' => 'required',
        'Number' => 'required',
        'Password' => 'required',
        ]);

        if ($valid->fails())
        return response()->json($valid->errors());

        $user = User::create($bj->all());
        return response()->json('Оk');
    }

 

     public function loginValid(Request $bj) 
    {
        $valid = Validator::make($bj->all(),
        [
            'Number' => 'required',
            'Password' => 'required',
        ]);


        if ($valid->fails())
        {
            return response()->json($valid->errors());
        }




        if($user = User::where('Number', $bj->Number)->first())
        {
            if ($bj->Password == $user->Password)
            {
                
                $user->api_token=null;
                $user->save();
                return response()->json('Ну ты и машина, api_token:'. $user->api_token);
            }
        }

        return response()->json('Ахаха, ты не то творишь, api_token:'. $user->api_token);
    }   



    public function logoutValid(Request $bj)
    {
        {
            $user = User::where("api_token",$bj->api_token)->first();

            if($user)
            {
                $user->api_token = "0";
                $user->save();
                return response()->json('Хорошая работа, Влад');
            }
        }
    }
}

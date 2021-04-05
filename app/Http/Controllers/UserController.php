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

        $md = $user->save();

    	return response()->json($user);
    }
}

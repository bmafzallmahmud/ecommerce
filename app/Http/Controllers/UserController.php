<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function manageUser(){

    	$users = User::paginate();
    	$users = User::all();
    	return view('admin.user.manageUser',['users'=>$users]);
    }
}

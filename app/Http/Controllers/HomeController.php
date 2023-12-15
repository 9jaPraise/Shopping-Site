<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $users = User::latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function view(user $user){
        return view('admin.user.view-user', compact('user'));
    }
}

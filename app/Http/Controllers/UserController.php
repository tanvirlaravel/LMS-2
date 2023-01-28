<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        permission_check('user-management');
        return view('user.index');
    }

    public function create()
    {
        permission_check('user-management');
        return view('user.create');
    }

    public function edit($id)
    {
        permission_check('user-management');
        return view('user.edit');
    }
}

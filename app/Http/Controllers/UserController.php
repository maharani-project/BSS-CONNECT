<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $list_user = User::where('role', 'mahasiswa')->get();

        return view('admin.totalmahasiswa', compact('list_user'));
    }
}
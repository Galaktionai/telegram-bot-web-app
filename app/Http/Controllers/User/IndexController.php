<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::paginate(16);
        return view('user.index', compact('users'));
    }
}

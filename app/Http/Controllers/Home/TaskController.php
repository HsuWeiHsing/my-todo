<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    //
    public function index() {
        $users = User::all();
        return view('task', ['users' => $users]);
    }
}
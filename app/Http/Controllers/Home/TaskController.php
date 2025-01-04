<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
// use App\Models\User;

class TaskController extends Controller
{
    //
    public function create() {
        return view('post.create');
    }

    public function show() {
        return view('create');
    }
}
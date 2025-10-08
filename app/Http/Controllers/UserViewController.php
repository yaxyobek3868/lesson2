<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Lesson;

class UserViewController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('user')->get();
        return view('user.index', compact('lessons'));
    }
}


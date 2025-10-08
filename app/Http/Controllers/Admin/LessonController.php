<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('user')->get();
        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.lessons.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'text' => 'required',
            'kuni' => 'required|date',
            'soati' => 'required',
        ]);

        Lesson::create($request->all());
        return redirect()->route('lessons.index')->with('success', 'Dars qo‘shildi.');
    }

    public function edit(Lesson $lesson)
    {
        $users = User::all();
        return view('admin.lessons.edit', compact('lesson', 'users'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'text' => 'required',
            'kuni' => 'required|date',
            'soati' => 'required',
        ]);

        $lesson->update($request->all());
        return redirect()->route('lessons.index')->with('success', 'Dars yangilandi.');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lessons.index')->with('success', 'Dars o‘chirildi.');
    }
}

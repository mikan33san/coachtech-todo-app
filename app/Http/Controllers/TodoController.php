<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
        $tasks = Todo::all();
        return view('index', ['tasks' => $tasks]);
    }


    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $tasks = $request->all();
        Todo::create($tasks);
        return redirect('/');
    }


    public function update(Request $request ,$id)
    {
        $this->validate($request, Todo::$rules);
        $tasks = $request->all();
        Todo::find($id)->update($tasks);
        return redirect('/');
    }


    public function delete($id)
    {
        Todo::find($id)->delete();
        return redirect('/');
    }
}

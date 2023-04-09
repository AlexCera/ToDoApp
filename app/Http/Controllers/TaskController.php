<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TaskController extends Controller
{
    /**
     * INDEX para mostrar todos las tareas.
     * SHOW para mostrar el formulario de edición.
     * STORE para guardar una tarea.
     * UPDATE para actualizar una tarea.
     * DELETE para eliminar una tarea.
    */

    public function index()
    {
        $categories = Category::all();
        $tasks = Task::all();
        return view('to-do.index', ['tasks'=>$tasks, 'categories'=>$categories]);
    }

    public function show($id)
    {
        $categories = Category::all();
        $task = Task::find($id);
        return view('to-do.show', ['task'=>$task, 'categories'=>$categories]);
    }

    public function store(Request $req)
    {
        $req->validate([
            'title' => 'required|min:3',
            'category' => 'required',
        ]);
        $task = new Task();
        $task->title = $req->title;
        $task->category_id = $req->category;
        $task->save();
        return redirect("tasks")->with('success', 'Task added');
    }

    public function update(Request $req, $id)
    {
        $task = Task::find($id);
        $req->validate([
            'title' => 'required|min:3',
            'category' => 'required',
        ]);
        $task->title = $req->title;
        $task->category_id = $req->category;
        $task->save();
        return redirect()->route('tasks')->with('success', 'Task updated');
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks')->with('success', 'Task deleted');
    }
}

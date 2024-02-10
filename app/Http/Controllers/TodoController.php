<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Task::all();
        $count = Task::count();
        $count_TF = Task::where('isDone', true)->count();
        $resC = $count_TF ? floatval(intval($count) / intval($count_TF)) : '';

        if ( $resC == '' ){
            $resCB = 'You Shoud Finish your tasks';
        } else if ( $resC == 1.0 ){
            $resCB = "Excellent work bravo";
        } else if ( $resC <= 2.0 ){
            $resCB = "Good Work";
        } else {
            $resCB = "Good but u can work best from here";
        }
        return view('tasks' , [
            'todos' => $todos,
            'count' => $count,
            'count_TF' => $count_TF,
            'resCB' => $resCB
        ]);
    }
    public function store()
    {
        $attretubtes = request()->validate([
            'title' => 'required',
            'dscription' => 'nullable'
        ]);

        Task::create($attretubtes);
        return redirect('/');
    }
    public function update(Task $todo)
    {
        if ($todo->isDone){
            $todo->update(['isDone' => false]);
            return redirect('/');
        } else {
        $todo->update(['isDone' => true]);
        return redirect('/');
        }
    }
    public function delete(Task $todo)
    {
        $todo->delete();
        return redirect('/');
    }
}

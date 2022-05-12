<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskNotification;
use Illuminate\Support\Facades\Notification;


class AssignTaskContoller extends Controller
{
    public function getForm($id){

       $task = Task::findOrFail($id);
       $users = User::where('id', '!=', auth()->id())->get();

       return view('assign.create', compact('task', 'users'));

    }



    public function save(Request $request){
       
        $request->validate(
            [
                "user_id" => "required",
                "task_id" => "required",
            ]
        );

        $user = User::findOrFail($request->user_id);
        $task = Task::findOrFail($request->task_id);

        $user->tasks()->attach($task);

        Notification::send($user, new TaskNotification($task->title));

        return redirect()->route('home');
    }
}

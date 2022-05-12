<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $notifications = auth()->user()->unreadNotifications;

        $tasks = $user->tasks()->orderBy('id', 'desc')->get();
        
        return view('home', compact('tasks','notifications'));
    }


    public function toggleStatus($id){

        $tasks = Task::findOrFail($id);
        $status = "";

        if($tasks->status == "incomplete"){
            $status = "complete";
        }else {
            $status = "incomplete";
        }

        $tasks->status = $status;
        $tasks->save();
       
        return redirect()->route('home');
    }


    public function markAsRead($id){

        $Notification = auth()->user()->Notifications->find($id);
            if($Notification){
              $Notification->markAsRead();
            }
        return redirect()->route('home');
    }
}





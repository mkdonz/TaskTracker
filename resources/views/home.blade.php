@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div>

        @forelse ($notifications as $notification)
            <div class="row">
                <div class="col">
                    <div class="alert alert-primary" role="alert">
                        You have a New Task {{ $notification->data['title'] }} 
                        <a href="{{ route('read', $notification->id) }}" class="alert-link pl-3"> Remove Notification</a>
                    </div>
                </div>
            </div>
        @empty
            
        @endforelse
       

        <div class="float-start">
            <h4 class="pb-3">My Tasks</h4>
        </div>
    
        <div class="float-end">
            <a href="{{ route('task.create') }}" class="btn btn-info">
               Create  Task
            </a>
        </div>
        <div class="clearfix"></div>
    </div>

    @foreach ($tasks as $task)
    <div class="card mb-4">
        <div class="card-header">
           <div class="float-start">
            {{ $task->title }}
            <span class="badge rounded-pill bg-warning text-dark">
                Due: {{ $task->due_date }}
            </span>
           </div>

           <div class="float-end">
            <a href="{{ route('assign', $task->id) }}" class="btn btn-secondary">
                  Assign User
              </a>
           </div>
        </div>
        <div class="card-body">
            <div class="card-text">
                <div class="float-start">
                    {{ $task->description }}
                    <br>

                    <a href="{{ route('togglestatus', $task->id) }}">
                        <span id="status" class="badge rounded-pill bg-info text-dark">
                            {{ $task->status }}
                        </span>
                     </a>
                    

                    <small>Created - {{ $task->created_at->diffForHumans() }}</small</>> </small>
                </div>
                <div class="float-end">
                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-success">
                      Edit 
                    </a>
                    <form action="{{ route('task.destroy', $task->id) }}"  method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
        <div class="card-footer">
            <form action="{{ route('comment') }}" method="POST">
                
                @csrf

                <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <input type="text" class="form-control" id="comment" name="comment">
                </div>

                <div class="mb-3">
                    <input type="hidden" value="{{$task->id}}" name="task_id">
                </div>
                
                <button type="submit" class="btn btn-primary">Add Comment</button>
                
            </form>
            <hr>
            <h3 class="text-center my-3">Comments</h3>

            @foreach ($task->comments as $comment) 
                
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="card-text">
                            {{ $comment->comment }}
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
    @endforeach

    
</div>


@endsection

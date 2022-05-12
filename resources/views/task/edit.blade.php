@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div>
        <div class="float-start">
            <h4 class="pb-3">Edit Task - <span class="badge bg-info">{{ $task->title }}</span></h4>
        </div>
    
        <div class="float-end">
            <a href="{{ route('home') }}" class="btn btn-info">
               All Tasks
            </a>
        </div>
        <div class="clearfix"></div>
    </div>

    
    <div class="card card-body bg-light p-4 ">
        <form action={{ route('task.update', $task->id) }} method="POST">

            @csrf 
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea rows="5" type="text" class="form-control" id="description" name="description">{{ $task->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                    @if ($task->status == "incomplete")
                        <option selected value="incomplete">Incomplete</option>
                        <option value ="complete">Complete</option>
                    @endif

                    @if ($task->status == "complete")
                        <option value="incomplete">Incomplete</option>
                        <option selected value ="complete">Complete</option>
                    @endif

                    
                    
                </select>
            </div>
 
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
  

    
</div>
@endsection

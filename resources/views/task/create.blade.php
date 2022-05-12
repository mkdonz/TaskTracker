@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div>
        <div class="float-start">
            <h4 class="pb-3">Create Task</h4>
        </div>
    
        <div class="float-end">
            <a href="{{ route('home') }}" class="btn btn-info">
               All Tasks
            </a>
        </div>
        <div class="clearfix"></div>
    </div>

    
    <div class="card card-body bg-light p-4 ">
        <form action={{ route('task.store') }} method="POST">

            @csrf 

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea rows="5" type="text" class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                    <option selected value="incomplete">Incomplete</option>
                    <option value ="complete">Complete</option>
                </select>
            </div>
 
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
  

    
</div>
@endsection

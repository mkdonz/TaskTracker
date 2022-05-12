@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div>
        <div class="float-start">
            <h4 class="pb-3">Assign Task - {{ $task->title }}</h4>
        </div>
    
        <div class="float-end">
            <a href="{{ route('home') }}" class="btn btn-info">
               All Tasks
            </a>
        </div>
        <div class="clearfix"></div>
    </div>

    
    <div class="card card-body bg-light p-4 ">
        <form action={{ route('save-task') }} method="POST">

            @csrf 

            <div class="mb-3">
                <label for="status" class="form-label">Select User</label>

                @if ($users->count() == 0)
                   <h4 class = "text-secondary">No Users to Select</h4>
                @else
                    <select class="form-select" name="user_id" id="status">
                        <option>Select User Please</option>
                        
                        @foreach ($users as $user)
                        <option value ="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                        
                    </select>
                @endif



            </div>

            <div class="mb-3">
                <input type="hidden" value="{{$task->id}}" name="task_id">
            </div>
 
            @if ($users->count() > 0)
              <button type="submit" class="btn btn-primary">Save</button> 
            @endif
           

        </form>
    </div>
  

    
</div>
@endsection

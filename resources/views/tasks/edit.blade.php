@extends('base.base')

@section('content')
  <div class="container"> 
    <div class="container pt-3">
      <a class="btn btn-primary" href="{{route('tasks.index')}}">Back to tasks list</a>
    </div>
    <div class="d-flex justify-content-center pt-5">
      <form method="POST" action="{{route('tasks.update', $task -> id)}}">
        @method('PUT')
        @csrf
        @if(session()->has('success'))
          <div class="alert alert-primary" role="alert">
            {{session()->get('success')}}
          </div>
        @endif

        <div class="mb-3">
          <label class="form-label">Name</label>
          <input value="{{@old('name') ?? $task->name}}" type="text" name="name" class="form-control" placeholder="Name of the task">
          @error('name')
            <div class="form-text">{{$message}}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea cols="2" name="description" placeholder="Write a description for the task" class="form-control">{{@old('description') ?? $task -> description}}</textarea>
          @error('description')
            <div class="form-text">{{$message}}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Status</label>
          <select name="status" class="form-control">
            <option value="0" 
              @if (!$task->status) selected @endif>Open
            </option>
            <option 
            value="1"
            @if ($task->status) selected @endif>Completed
          </option>
          </select>
          @error('description')
            <div class="form-text">{{$message}}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Date</label>
          <input value="{{@old('date') ?? $task -> date}}" type="date" name="date" class="form-control">
          @error('date')
            <div class="form-text">{{$message}}</div>
          @enderror
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Edit Task</button>
        </div>
      </form>
    </div>
  </div>
@endSection
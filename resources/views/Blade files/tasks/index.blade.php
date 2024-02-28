@extends('base.base');

@section('title')
Task List
@endSection;

@section('content')
  <div>
    <div class="d-flex justify-content-center pt-5">
      <form method="POST">
        @csrf
        @if(session()->has('success'))
          <div class="alert alert-primary" role="alert">
            {{session()->get('success')}}
          </div>
        @endif

        <div class="mb-3">
          <label class="form-label">Name</label>
          <input value="{{@old('name')}}" type="text" name="name" class="form-control" placeholder="Name of the task">
          @error('name')
            <div class="form-text">{{$message}}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea cols="2" name="description" placeholder="Write a description for the task" class="form-control">{{@old('description')}}</textarea>
          @error('description')
          <div class="form-text">{{$message}}</div>
        @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Date</label>
          <input value="{{@old('date')}}" type="date" name="date" class="form-control">
          @error('date')
          <div class="form-text">{{$message}}</div>
        @enderror
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Add Task</button>
        </div>
      </form>
    </div>
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tasks as $key => $task)
            <tr>
              <th scope="row">{{$key +1}}</th>
              <td>{{$task -> name}}</td>
              <td>{{$task -> description}}</td>
              <td>{{$task -> date}}</td>
              <td>
                <button class="btn {{$task ->status ? 'btn-success' : 'btn-danger'}}">{{$task ->status ? 'Completed' : 'Open'}}</button>
              </td>
              <td class="d-flex gap-2">
                <a href="{{route('tasks.edit', $task -> id)}}" class="btn btn-warning">Edit</a>
                <form method="POST" action="{{route('tasks.destroy', $task->id)}}">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach  
        </tbody>
      </table>
    </div>
  </div>
@endSection
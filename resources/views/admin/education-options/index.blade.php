@extends('admin.main-layout')

@section('body')

<h1>Manage Education Options</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>

@endif

<table class="table table-striped mt-3">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Label</th>
            <th>Value</th>
            <th>Hidden</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($educationOptions as $option)
        <tr>
            <td>{{$option->id}}</td>
            <td>{{$option->label}}</td>
            <td>{{$option->value}}</td>
            <td>{{$option->hidden ? 'Yes':'No'}}</td>
            <td>
                <a href="{{route('education-options.toggle', $option -> id)}}" class="btn btn-sm btn-primary">Toggle Visibility</a>
                <a href="{{route('education-options.destroy', $option -> id)}}" class="btn btn-sm btn-danger">Delete Data</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
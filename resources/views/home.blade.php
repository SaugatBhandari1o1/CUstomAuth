@extends('layouts.app')

@section('content')

<h1>Home: {{Auth::user()->name}}</h1>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Information Table</h3>
            <a href="{{route('create')}}" class="btn btn-success btn-sm mt-2">Add New</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Education</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['row'] as $key =>$row)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->status}}</td>
                        <td>{{$row->education}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection
@extends('admin.main-layout')


@section('body')

<div class="row">
    <div class="container-fluid">
        <h3>Users List</h3>
        <div style="overflow-x:auto;">

            <table class="table table-striped mt-3">
                <thead class="thead-dark">
                    <tr>
                        @foreach($users->first()->getAttributes() as $key=> $value)
                        <th>{{$key}}</th>
                        @endforeach
                        <th>Delete?</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        @foreach($user->getAttributes() as $key=>$value)
                        <td>{{$value}}</td>
                        @endforeach
                        <td>
                            <a href="{{route('admin.users.delete',['id'=> $user->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /. row (main row)-->
@endsection
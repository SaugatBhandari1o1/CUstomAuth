
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Edit</h3>
                <div class="card">
                    <form action="{{route('update',['uid'=>$upload->uid]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2 mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" value="{{$upload->name}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" value="{{$upload->email}}" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label for="education" class="form-label">Education</label>
                            <select name="education" id="education" class="form-control"value ="{{$upload->education}}">
                                <option value="master">Master</option>
                                <option value="bachelor">Bachelor</option>
                                <option value="high_school">High School</option>
                                <option value="school">School</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="checkbox" name="status" id="status" class="form-control-check ml-4" {{ $upload->status ? 'checked' : '' }}>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
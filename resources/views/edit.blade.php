@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-dark text-center">
                    <h3 class="card-title text-light fw-bold">Edit</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('update',['uid'=>$upload->uid]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" value="{{$upload->name}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" value="{{$upload->email}}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="education" class="form-label">Education</label>
                            <select name="education" id="education" class="form-control" value="{{$upload->education}}">
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

                        <div class="mb-3">
                            <label for="document" class="form-label">Current Document</label>
                            @if ($upload->document)
                            <p>{{$upload->document}}</p>
                            <a href="{{asset('uploads/document/' . $upload->document)}}" target="_blank" class="btn btn-primary">View</a>

                            @else
                            <p>No document Upload</p>
                            @endif
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="document" class="form-label">Upload New Document</label>
                            <input type="file" name="document" id="document" class="form-control" accept=".pdf, .docx, .doc">
                        </div>
                        <hr>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
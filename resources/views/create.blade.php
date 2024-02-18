@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-dark text-center">
                    <h3 class="card-title text-light fw-bold">Create</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="education" class="form-label">Education</label>
                            <select name="education" id="education" class="form-select" required>
                                <option value="" selected disabled>Select Education Level</option>
                                @foreach($educationOptions as $option)
                                @if(!$option->hidden)
                                <option value="{{$option->value}}">{{$option->label }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="document" class="form-label">Document</label>
                            <div class="input-group">
                                <input type="file" name="document" id="document" class="form-control" accept=".pdf" onchange="displayFileName(this)" required>
                                <label class="input-group-text" for="document">Choose file</label>
                            </div>
                            <div id="documentLabel" class="form-text">No file chosen</div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="status" id="status" class="form-check-input">
                            <label for="status" class="form-check-label">Status</label>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function displayFileName(input) {
        const fileName = input.files[0].name;
        document.getElementById('documentLabel').textContent = fileName;
    }
</script>
@endsection
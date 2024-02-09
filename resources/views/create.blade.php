<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
@extends('layouts.app')
@section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Create</h3>
                <div class="card">
                    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2 mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control">
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter Emails" class="form-control">
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="education" class="form-label">Education</label>
                            <select name="education" id="education" class="form-control">
                                <option value="" selected disabled>Enter Your Education Level</option>
                                <option value="master">Master</option>
                                <option value="bachelor">Bachelor</option>
                                <option value="high_school">High School</option>
                                <option value="school">School</option>
                            </select>
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="document" class="form-label">Document</label>
                            <div class="input-group">
                                <input type="file" name="document" id="document" class="form-control" aria-describedby="document" accept=".pdf, .docx, .doc">
                                <label class="input-group-text" for="document" id="document"></label>
                            </div>
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="status" class="form-label">Status</label>
                            <input type="checkbox" name="status" id="status" class="form-control-check ml-4">
                        </div>
                        <hr>
                        <div class="mt-2 mb-2">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
@endsection

</html>
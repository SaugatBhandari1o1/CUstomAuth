@extends('admin.main-layout')

@section('body')

<h1>Add New Education Options</h1>

@if($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>

@endif

<form action="{{route('education-options.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="value" class="form-label">Value</label>
        <input type="text" class="form-control" id="value" name="value" required>
    </div>

    <div class="mb-3">
        <label for="label" class="form-label">Label</label>
        <input type="text" class="form-control" id="label" name="label" required>
    </div>

    <div class="mb-3 form-check">
        <input type="hidden" name="hidden" value="0">
        <input type="checkbox" class="form-check-input" id="hidden" name="hidden" value="1" {{old('hidden') == 1 ?  'checked' : ''}}>   
        <label class="form-check-label" for="hidden">Hidden</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection
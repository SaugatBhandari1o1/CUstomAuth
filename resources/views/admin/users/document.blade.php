@extends('admin.main-layout')

@section('body')
<div class="row">
    <div class="container-fluid">
        <h3>Documents Uploaded</h3>
        <div style="overflow-x:auto;">
            <table class="table table-striped mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>User Name</th>
                        <th>Upload Name</th>
                        <th>Document Name</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documents as $document)
                    <tr>
                        <td>{{$document->user->name ?? 'Unknown User'}}</td>
                        <td>{{$document->item->name ?? 'Unknown Entry'}}</td>
                        <td>{{$document->document}}</td>
                        <td>
                            @if($document->document)
                            <a href="{{ route('admin.viewDocument', ['document' => $document->document]) }}" target="_blank" class="btn btn-success">
                                View
                            </a>
                            @else
                            <span class="text-danger">No Document Available</span>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List About Us</h1>
    </div>
    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    {{-- title
description
image
author --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List About Us</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($aboutus)
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th width="280px">Action</th>
                        </tr>
                        <tr>
                            <td>{{ $aboutus->title }}</td>
                            <td>{{ $aboutus->description }}</td>
                            <td>
                                <form action="{{ route('aboutus.destroy', $aboutus->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('aboutus.show', $aboutus->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('aboutus.edit', $aboutus->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                @else
                    <a href="{{ route('aboutus.create') }}" class="btn btn-success mb-3">Add New About Us</a>
                @endif
            </div>
        </div>
    </div>
@endsection

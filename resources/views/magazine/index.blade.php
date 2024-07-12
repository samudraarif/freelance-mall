@extends('layouts.app')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Magazine</h1>
        <a href="{{ route('magazine.create') }}" class="btn btn-primary" style="background-color: #38877f;">Add Magazine</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Magazine</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photos</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>PDF</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($magazines->count() > 0)
                            @foreach($magazines as $rs)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">
                                        @if($rs->image)
                                            <img src="{{ asset('storage/images/'.$rs->image) }}" class="img-thumbnail" style="max-width: 100px;" alt="Magazine Image">
                                        @else
                                            <p>No image</p>
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $rs->title }}</td>
                                    <td class="align-middle">{{ $rs->description }}</td>
                                    <td class="align-middle">
                                        @if($rs->pdf_url)
                                            <a href="{{ asset('storage/pdfs/'.$rs->pdf_url) }}">Download PDF</a>
                                        @else
                                            <p>No PDF</p>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('magazine.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                            <a href="{{ route('magazine.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('magazine.destroy', $rs->id) }}" method="POST" class="p-0" onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">Magazine not found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

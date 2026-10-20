@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">Resource Library</h2>

            <p class="text-muted">
                Books, articles, videos and other learning materials
            </p>
        </div>

        <a href="{{ route('resources.create') }}"
           class="btn btn-primary">

            + Add Resource

        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="card shadow-sm border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($resources as $resource)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $resource->title }}
                                </td>

                                <td>
                                    {{ $resource->author ?? '—' }}
                                </td>

                                <td>
                                    {{ $resource->category }}
                                </td>

                                <td>
                                    {{ $resource->resource_type }}
                                </td>

                                <td>

    @if($resource->resource_type === 'Link')

        <a href="{{ $resource->resource_link }}"
           target="_blank"
           class="btn btn-sm btn-primary">

            Open

        </a>

    @elseif($resource->resource_type === 'File')

        <a href="{{ asset('storage/' . $resource->file_path) }}"
           target="_blank"
           class="btn btn-sm btn-success">

            View File

        </a>

    @endif


    <a href="{{ route('resources.edit', $resource->id) }}"
       class="btn btn-sm btn-warning">

        Edit

    </a>


    <form action="{{ route('resources.destroy', $resource->id) }}"
          method="POST"
          class="d-inline"
          onsubmit="return confirm('Are you sure you want to delete this resource?');">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="btn btn-sm btn-danger">

            Delete

        </button>

    </form>

</td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center text-muted">

                                    No resources found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
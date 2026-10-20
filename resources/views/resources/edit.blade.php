@extends('layouts.base')

@section('content')

<div class="container">

    <div class="mb-4">

        <h2 class="fw-bold">
            Edit Resource
        </h2>

        <p class="text-muted">
            Update resource information
        </p>

    </div>


    <form action="{{ route('resources.update', $resource->id) }}"
          method="POST">

        @csrf
        @method('PUT')


        <!-- Title -->

        <div class="mb-3">

            <label class="form-label">
                Title
            </label>

            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ $resource->title }}">

        </div>


        <!-- Author -->

        <div class="mb-3">

            <label class="form-label">
                Author
            </label>

            <input type="text"
                   name="author"
                   class="form-control"
                   value="{{ $resource->author }}">

        </div>


        <!-- Category -->

        <div class="mb-3">

            <label class="form-label">
                Category
            </label>

            <select name="category"
                    class="form-control">

                <option value="Select category"
                    {{ $resource->category == 'Select category' ? 'selected' : '' }}>
                    Select category
                </option>

                <option value="Data Science"
                    {{ $resource->category == 'Data Science' ? 'selected' : '' }}>
                    Data Science
                </option>

                <option value="Machine Learning"
                    {{ $resource->category == 'Machine Learning' ? 'selected' : '' }}>
                    Machine Learning
                </option>

                <option value="Web Development"
                    {{ $resource->category == 'Web Development' ? 'selected' : '' }}>
                    Web Development
                </option>

                <option value="Cybersecurity"
                    {{ $resource->category == 'Cybersecurity' ? 'selected' : '' }}>
                    Cybersecurity
                </option>

                <option value="UI/UX"
                    {{ $resource->category == 'UI/UX' ? 'selected' : '' }}>
                    UI/UX
                </option>

            </select>

        </div>


        <!-- Description -->

        <div class="mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea name="description"
                      class="form-control"
                      rows="4">{{ $resource->description }}</textarea>

        </div>


        <!-- Resource Type -->

        <div class="mb-3">

            <label class="form-label">
                Resource Type
            </label>

            <select name="resource_type"
                    class="form-control">

                <option value="Link"
                    {{ $resource->resource_type == 'Link' ? 'selected' : '' }}>
                    Link
                </option>

                <option value="File"
                    {{ $resource->resource_type == 'File' ? 'selected' : '' }}>
                    File
                </option>

            </select>

        </div>


        <!-- Resource Link -->

        <div class="mb-3">

            <label class="form-label">
                Resource Link
            </label>

            <input type="url"
                   name="resource_link"
                   class="form-control"
                   value="{{ $resource->resource_link }}">

        </div>


        <button type="submit"
                class="btn btn-primary">

            Update Resource

        </button>


        <a href="{{ route('resources.index') }}"
           class="btn btn-secondary">

            Cancel

        </a>

    </form>

</div>

@endsection
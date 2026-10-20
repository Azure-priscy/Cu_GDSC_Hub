@extends('layouts.base')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Add Resource
    </h2>

    <form action="{{ route('resources.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <!-- Title -->

    <div class="mb-3">

    <label class="form-label">
        Title
    </label>

    <input type="text"
           name="title"
           class="form-control">

</div>

<!-- Author -->

<div class="mb-3">

    <label class="form-label">
        Author
    </label>

    <input type="text"
           name="author"
           class="form-control">

</div>


<div class="mb-3">

    <label class="form-label">
        Category
    </label>

    <select name="category"
            class="form-control">

        <option>Select category</option>
        <option>Data Science</option>
        <option>Machine Learning</option>
        <option>Web Development</option>
        <option>Cybersecurity</option>
        <option>Artificial Intelligence</option>
        <option>UI/UX</option>

    </select>

</div>


<!-- Description -->
 <div class="mb-3">

    <label class="form-label">
        Description
    </label>

    <textarea name="description"
              class="form-control"></textarea>

</div>

<!-- Resource Type -->
<div class="mb-3">

    <label class="form-label">
        Resource Type
    </label>

    <select name="resource_type"
            class="form-control">

        <option value="Link">
            Link
        </option>

        <option value="File">
            File
        </option>

    </select>

</div>

<!-- Resource Link -->
<div class="mb-3">

    <label class="form-label">
        Resource Link
    </label>

    <input type="text"
           name="resource_link"
           class="form-control">
    </div>


    <! -- file upload -- >
    <div class="mb-3">

        <label class="form-label">
            Upload File
        </label>

        <input type="file"
               name="resource_file"
               class="form-control">    

    </div>

    <!-- Submit Button -->
    <div class="mb-3">
        
        <button type="submit"
                class="btn btn-primary">
            save Resource
        </button>

</div>

    </form>

    @endsection



@extends('layouts.base')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Add Book
    </h2>

    <form action="{{ route('books.store') }}"
          method="POST">

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

<!-- Category -->

<div class="mb-3">

    <label class="form-label">
        Category
    </label>

    <select name="category"
            class="form-control">

        <option>Select category</option>
        <option>Programming</option>
        <option>Data Science</option>
        <option>Machine Learning</option>
        <option>Web Development</option>
        <option>Cybersecurity</option>
        <option>Artificial Intelligence</option>

    </select>
</div>

<!-- Quantity -->

<div class="mb-3">

    <label class="form-label">
        Initial Stock Quantity
    </label>

    <input type="number"
           name="quantity"
           min="0"
           class="form-control">

</div>


<!-- Description -->
    <div class="mb-3">
    
        <label class="form-label">
            Description
        </label>
    
        <textarea name="description"
                class="form-control"
                rows="4"></textarea>
    </div>

<!-- Submit Button -->

<button type="submit"
        class="btn btn-primary">

    Save Book

</button>

</form>

</div>

@endsection
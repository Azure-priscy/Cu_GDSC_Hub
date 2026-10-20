@extends('layouts.base')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Edit Book
    </h2>

    <form action="{{ route('books.update', $book->id) }}"
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
           value =" {{$book ->title}}">

</div>

<!-- Author -->

<div class="mb-3">

    <label class="form-label">
        Author
    </label>

    <input type="text"
           name="author"
           class="form-control"
           value ="{{$book ->author}}">

</div>

<!-- Category -->

<div class="mb-3">

    <label class="form-label">
        Category
    </label>

    <select name="category"
            class="form-control">

        <option>Select category</option>
        <option value="Programming"
            @selected($book->category == 'Programming')>
            Programming
        </option>

        <option value="Data Science"
          @selected($book->category == 'Data Science')>
          Data Science
       </option>

        <option value ="Machine Learning"
           @selected($book->category == 'Machine Learning')>
            Machine Learning 
        </option>

        <option value="Web Development"
        @selected($book->category == 'Web Development')>
        Web Development
        </option>

        <option value="Cybersecurity"
        @selected($book->category == 'Cybersecurity')>
        Cybersecurity
       </option>

        <option value="Artificial Intelligence"
        @selected($book->category == 'Artificial Intelligence')>
        Artificial Intelligence
       </option>

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
           class="form-control"
           value ="{{$book ->quantity}}">

</div>


<!-- Description -->
    <div class="mb-3">
    
        <label class="form-label">
            Description
        </label>

        <textarea name="description"
            class="form-control"
            rows="4">{{ $book->description }}</textarea>
        </div>

<!-- Submit Button -->

<button type="submit"
        class="btn btn-primary">

    Update Book

</button>

<a href="{{ route('books.index') }}"
   class="btn btn-secondary">

    Cancel
</a>

</form>

</div>

@endsection
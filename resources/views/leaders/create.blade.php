@extends('layouts.base')

@section('content')

<h2>Add Leader</h2>

<form action="{{ route('leaders.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label class="form-label">Full Name</label>

        <input
            type="text"
            name="full_name"
            class="form-control"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>

        <input
            type="email"
            name="email"
            class="form-control"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Phone Number</label>

        <input
            type="text"
            name="phone"
            class="form-control"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Course</label>

        <select name="course" id="course" class="form-select" required>

            <option value="">Select Course</option>

            <option value="IT">IT</option>

            <option value="CS">CS</option>

            <option value="Other">Other</option>

        </select>
    </div>

    <div class="mb-3" id="otherCourseDiv" style="display: none;">

        <label class="form-label">Specify Course</label>

        <input
            type="text"
            name="other_course"
            id="other_course"
            class="form-control"
        >

    </div>

    <div class="mb-3">
        <label class="form-label">Level</label>

        <select name="level" class="form-select" required>

            <option value="">Select Level</option>

            <option value="Level 100">Level 100</option>

            <option value="Level 200">Level 200</option>

            <option value="Level 300">Level 300</option>

            <option value="Level 400">Level 400</option>

        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Position</label>

        <select name="position" class="form-select" required>

            <option value="">Select Position</option>

            <option value="Web Development Lead">
                Web Development Lead
            </option>

            <option value="ML Lead">
                ML Lead
            </option>

            <option value="UI/UX Lead">
                UI/UX Lead
            </option>

            <option value="Cybersecurity Lead">
                Cybersecurity Lead
            </option>

            <option value="Campus Lead">
                Campus Lead
            </option>

        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Date Joined</label>

        <input
            type="date"
            name="date_joined"
            class="form-control"
            value="{{ date('Y-m-d') }}"
            required
        >
    </div>

    <button type="submit" class="btn btn-primary">
        Save Leader
    </button>

</form>

<script>
    const course = document.getElementById('course');
    const otherCourseDiv = document.getElementById('otherCourseDiv');
    const otherCourse = document.getElementById('other_course');

    course.addEventListener('change', function () {

        if (this.value === 'Other') {

            otherCourseDiv.style.display = 'block';
            otherCourse.required = true;

        } else {

            otherCourseDiv.style.display = 'none';
            otherCourse.required = false;
            otherCourse.value = '';

        }

    });
</script>

@endsection

@extends('layouts.base')

@section('content')

<h2>Edit Leader</h2>

<form action="{{ route('leaders.update', $leader->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Full Name</label>

        <input
            type="text"
            name="full_name"
            class="form-control"
            value="{{ $leader->full_name }}"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>

        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ $leader->email }}"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Phone Number</label>

        <input
            type="text"
            name="phone"
            class="form-control"
            value="{{ $leader->phone }}"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Course</label>

        <select name="course"
                id="course"
                class="form-select"
                required>

            <option value="IT"
                {{ $leader->course == 'IT' ? 'selected' : '' }}>
                IT
            </option>

            <option value="CS"
                {{ $leader->course == 'CS' ? 'selected' : '' }}>
                CS
            </option>

            <option value="Other"
                {{ !in_array($leader->course, ['IT', 'CS']) ? 'selected' : '' }}>
                Other
            </option>

        </select>

    </div>

    <div class="mb-3"
         id="otherCourseDiv"
         style="{{ !in_array($leader->course, ['IT', 'CS']) ? '' : 'display:none;' }}">

        <label class="form-label">
            Specify Course
        </label>

        <input
            type="text"
            name="other_course"
            id="other_course"
            class="form-control"
            value="{{ !in_array($leader->course, ['IT', 'CS']) ? $leader->course : '' }}"
        >

    </div>

    <div class="mb-3">

        <label class="form-label">
            Level
        </label>

        <select name="level"
                class="form-select"
                required>

            <option value="Level 100"
                {{ $leader->level == 'Level 100' ? 'selected' : '' }}>
                Level 100
            </option>

            <option value="Level 200"
                {{ $leader->level == 'Level 200' ? 'selected' : '' }}>
                Level 200
            </option>

            <option value="Level 300"
                {{ $leader->level == 'Level 300' ? 'selected' : '' }}>
                Level 300
            </option>

            <option value="Level 400"
                {{ $leader->level == 'Level 400' ? 'selected' : '' }}>
                Level 400
            </option>

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Position
        </label>

        <select name="position"
                class="form-select"
                required>

            <option value="Web Development Lead"
                {{ $leader->position == 'Web Development Lead' ? 'selected' : '' }}>
                Web Development Lead
            </option>

            <option value="ML Lead"
                {{ $leader->position == 'ML Lead' ? 'selected' : '' }}>
                ML Lead
            </option>

            <option value="UI/UX Lead"
                {{ $leader->position == 'UI/UX Lead' ? 'selected' : '' }}>
                UI/UX Lead
            </option>

            <option value="Cybersecurity Lead"
                {{ $leader->position == 'Cybersecurity Lead' ? 'selected' : '' }}>
                Cybersecurity Lead
            </option>

            <option value="Campus Lead"
                {{ $leader->position == 'Campus Lead' ? 'selected' : '' }}>
                Campus Lead
            </option>

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Date Joined
        </label>

        <input
            type="date"
            name="date_joined"
            class="form-control"
            value="{{ $leader->date_joined }}"
            required
        >

    </div>

    <button type="submit"
            class="btn btn-primary">
        Update Leader
    </button>

</form>

@endsection

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
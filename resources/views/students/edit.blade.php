@extends('layouts.base')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header">
                    <h3 class="mb-0">Edit Student</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('students.update', $student) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="full_name" class="form-label">
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="full_name"
                                id="full_name"
                                class="form-control"
                                placeholder="Enter student's full name"
                                value="{{ old('full_name', $student->full_name) }}"
                            >
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                placeholder="Enter student's email"
                                value="{{ old('email', $student->email) }}"
                            >
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                class="form-control"
                                placeholder="Enter phone number"
                                value="{{ old('phone', $student->phone) }}"
                            >
                        </div>

                        <!-- Department -->
                        <div class="mb-3">
                            <label for="department" class="form-label">
                                Department
                            </label>

                            <input
                                type="text"
                                name="department"
                                id="department"
                                class="form-control"
                                placeholder="Enter department"
                                value="{{ old('department', $student->department) }}"
                            >
                        </div>

                        <!-- Level -->
                        <div class="mb-3">
                            <label for="level" class="form-label">
                                Level
                            </label>

                            <select name="level" id="level" class="form-select">

                                <option value="">Select Level</option>

                                <option value="100"
                                    {{ old('level', $student->level) == '100' ? 'selected' : '' }}>
                                    Level 100
                                </option>

                                <option value="200"
                                    {{ old('level', $student->level) == '200' ? 'selected' : '' }}>
                                    Level 200
                                </option>

                                <option value="300"
                                    {{ old('level', $student->level) == '300' ? 'selected' : '' }}>
                                    Level 300
                                </option>

                                <option value="400"
                                    {{ old('level', $student->level) == '400' ? 'selected' : '' }}>
                                    Level 400
                                </option>

                            </select>
                        </div>

                        <!-- Interest Area -->
                        <div class="mb-3">
                            <label for="interest_area" class="form-label">
                                Interest Area
                            </label>

                            <select name="interest_area"
                                    id="interest_area"
                                    class="form-select">

                                <option value="">
                                    Select Interest Area
                                </option>

                                <option value="Machine Learning"
                                    {{ old('interest_area', $student->interest_area) == 'Machine Learning' ? 'selected' : '' }}>
                                    Machine Learning
                                </option>

                                <option value="Web Development"
                                    {{ old('interest_area', $student->interest_area) == 'Web Development' ? 'selected' : '' }}>
                                    Web Development
                                </option>

                                <option value="Mobile Development"
                                    {{ old('interest_area', $student->interest_area) == 'Mobile Development' ? 'selected' : '' }}>
                                    Mobile Development
                                </option>

                                <option value="Data Science"
                                    {{ old('interest_area', $student->interest_area) == 'Data Science' ? 'selected' : '' }}>
                                    Data Science
                                </option>

                                <option value="Cloud Computing"
                                    {{ old('interest_area', $student->interest_area) == 'Cloud Computing' ? 'selected' : '' }}>
                                    Cloud Computing
                                </option>

                                <option value="Cybersecurity"
                                    {{ old('interest_area', $student->interest_area) == 'Cybersecurity' ? 'selected' : '' }}>
                                    Cybersecurity
                                </option>

                                <option value="UI/UX"
                                    {{ old('interest_area', $student->interest_area) == 'UI/UX' ? 'selected' : '' }}>
                                    UI/UX
                                </option>

                            </select>
                        </div>

                        <!-- Date Joined -->
                        <div class="mb-3">
                            <label for="date_joined" class="form-label">
                                Date Joined
                            </label>

                            <input
                                type="date"
                                name="date_joined"
                                id="date_joined"
                                class="form-control"
                                value="{{ old('date_joined', $student->date_joined) }}"
                            >
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">

                            <button type="submit" class="btn btn-warning">
                                Update Student
                            </button>

                            <a href="{{ route('students.index') }}"
                               class="btn btn-secondary">
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
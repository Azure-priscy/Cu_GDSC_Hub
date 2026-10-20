@extends('layouts.base')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header">
                    <h3 class="mb-0">Add Student</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('students.store') }}" method="POST">

                        @csrf

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
                                value="{{ old('full_name') }}"
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
                                value="{{ old('email') }}"
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
                                value="{{ old('phone') }}"
                            >
                        </div>

                        <!-- Department -->
                        <div class="mb-3">
                            <label for="department" class="form-label">
                                Department
                            </label>

                            <select name="department" id="department" class="form-select">
                                <option value="">Select Department</option>

                                <option value="Computer Science"
                                    {{ old('department') == 'Computer Science' ? 'selected' : '' }}>
                                    Computer Science (CS)
                                </option>

                                <option value="Information Technology"
                                    {{ old('department') == 'Information Technology' ? 'selected' : '' }}>
                                    Information Technology (IT)
                                </option>

                                <option value="Other"
                                    {{ old('department') == 'Other' ? 'selected' : '' }}>
                                    Other
                                </option>
                            </select>
                        </div>

                        <!-- Level -->
                        <div class="mb-3">
                            <label for="level" class="form-label">
                                Level
                            </label>

                            <select name="level" id="level" class="form-select">

                                <option value="">Select Level</option>

                                <option value="100" {{ old('level') == '100' ? 'selected' : '' }}>
                                    Level 100
                                </option>

                                <option value="200" {{ old('level') == '200' ? 'selected' : '' }}>
                                    Level 200
                                </option>

                                <option value="300" {{ old('level') == '300' ? 'selected' : '' }}>
                                    Level 300
                                </option>

                                <option value="400" {{ old('level') == '400' ? 'selected' : '' }}>
                                    Level 400
                                </option>

                            </select>
                        </div>

                        <!-- Interest Area -->
                        <div class="mb-3">
                            <label for="interest_area" class="form-label">
                                Interest Area
                            </label>

                            <select name="interest_area" id="interest_area" class="form-select">

                                <option value="">Select Interest Area</option>

                                <option value="Machine Learning">
                                    Machine Learning
                                </option>

                                <option value="Web Development">
                                    Web Development
                                </option>

                                <option value="Mobile Development">
                                    Mobile Development
                                </option>

                                <option value="Cybersecurity">
                                    Cybersecurity
                                </option>

                                <option value="UI/UX">
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
                                value="{{ old('date_joined') }}"
                            >
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">

                            <button type="submit" class="btn btn-primary">
                                Save Student
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
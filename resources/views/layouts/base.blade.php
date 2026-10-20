<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CU GDSC Hub</title>
 


    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #212529;
            padding-top: 20px;
            overflow-y: auto;
        }

        /* Brand */

        

        .cu-logo {
            width: 50px !important;
            height: 50px !important;
        }

        .gdsc-logo {
            width: 50px !important;
            height: 50px !important;
        }

        .sidebar .brand {
            color: white;
            font-size: 20px;
            font-weight: bold;
            padding: 15px 20px;
            display: block;
            text-decoration: none;
        }

        /* Sidebar Links */

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background-color: #343a40;
            color: white;
        }

        /* Active Link */

        .sidebar a.active {
            background-color: #0d6efd;
            color: white;
        }


        /* ================= MAIN CONTENT ================= */

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            padding: 30px;
        }


        /* ================= MOBILE ================= */

        @media (max-width: 768px) {

            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
                padding: 20px;
            }
}
        

    </style>

</head>

<body>



<!-- ================= SIDEBAR ================= -->

<div class="sidebar">

    <!-- Brand -->

    <a href="{{ route('home') }}" class="brand d-flex align-items-center">

    <img src="{{ asset('images/CU_logo.png') }}"
         alt="Central University"
         class="cu-logo">

    <img src="{{ asset('images/gdsc_logo.png') }}"
         alt="GDSC"
         class="gdsc-logo">

    <span class="ms-2">
        CU GDSC Hub
    </span>

</a>
    <hr class="text-secondary">


    <!-- Dashboard -->

    <a href="{{ route('home') }}"
       class="{{ request()->routeIs('home') ? 'active' : '' }}">

     Dashboard

    </a>


    <!-- Students -->

    <a href="{{ route('students.index') }}"
       class="{{ request()->routeIs('students.*') ? 'active' : '' }}">

         Members <!-- technical name student -->

    </a>


    <!-- Teachers -->

    <a href="{{ route('leaders.index') }}">

    Leaders

    </a>


    <!-- Attendance -->

    <a href="{{ route('attendances.index') }}">

        Attendance

    </a>


    <!-- Announcements -->

    <a href="{{ route('announcements.index') }}">

     Announcements

    </a>

    <!-- Events -->
     <a href="{{ route('events.index') }}"
       class="{{ request()->routeIs('events.*') ? 'active' : '' }}">

    Events
        </a>


    <!-- Resources -->
    <a href="{{ route('resources.index') }}"
       class="{{ request()->routeIs('resources.*') ? 'active' : '' }}">

        Resources

    </a>


    <a href="{{ route('books.index') }}"
   class="{{ request()->routeIs('books.*') ? 'active' : '' }}">

     Library

</a>

</div>

   <!-- ================= MAIN CONTENT ================= -->

<div class="main-content">

    <!-- Back to Dashboard -->

    @if(!request()->routeIs('home'))


        <div class="mb-4">

            <a href="{{ route('home') }}"
               class="btn btn-outline-secondary btn-sm">

                ← Back to Dashboard

            </a>

        </div>

    @endif


    <!-- Page Content -->

    @yield('content')

</div>

<!-- ================= auth ================= -->

@auth
@if(auth()->user()->role == 'admin')

    <a href="{{ route('students.index') }}">
        Members
    </a>

@endif

@if(
    auth()->user()->role == 'admin' ||
    auth()->user()->role == 'leader'
)

    <a href="{{ route('events.index') }}">
        Events
    </a>

@endif
@endauth

<!-- ================= BOOTSTRAP JS ================= -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>



</body>

</html>

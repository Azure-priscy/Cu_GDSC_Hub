<?php
//=========public routes=========================
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\leaderController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;

//=========home route=========================
Route::get('/', [HomeController::class, 'index'])->name('home');



//Route::resource('students', StudentController::class);

//Route::resource('leaders', LeaderController::class);

//Route::resource('attendances', AttendanceController::class);

//Route::resource('announcements', AnnouncementController::class);

//Route::resource('events', EventController::class);

//Route::resource('resources', ResourceController::class);

//Route::resource('books', BookController::class); 



/*=============restock routes====================

Route::get(
    '/books/{book}/restock',
    [BookController::class, 'restockForm']
)->name('books.restock');


Route::post(
    '/{book}/restock',
    [BookController::class, 'restock']
)->name('books.restock.store');*/


//=============borrow routes====================
Route::get(
    '/books/{book}/borrow',
    [BorrowingController::class, 'create']
)->name('borrowings.create');

Route::post(
    '/books/{book}/borrow',
    [BorrowingController::class, 'store']
)->name('borrowings.store');


// ========================= ALL LOGGED-IN USERS =========================

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Announcements (view only)
    Route::resource('announcements', AnnouncementController::class)
        ->only(['index', 'show']);

    // Resources (view only)
    Route::resource('resources', ResourceController::class)
        ->only(['index', 'show']);

    // Books (view only)
    Route::resource('books', BookController::class)
        ->only(['index', 'show']);

    //borrowings (view only)
    Route::resource('borrowings', BorrowingController::class)
        ->only(['index', 'show']);

});


// ========================= MEMBERS ONLY =========================

Route::middleware(['auth', 'role:member'])->group(function () {

    Route::get(
        '/my-borrowings',
        [BorrowingController::class, 'myBorrowings']
    )->name('borrowings.mine');

});


// ========================= LEADER + ADMIN =========================

Route::middleware(['auth', 'role:admin,leader'])->group(function () {

    // Events
    Route::resource('events', EventController::class);

    // Attendance
    Route::resource('attendances', AttendanceController::class);

    // Manage announcements
    Route::resource('announcements', AnnouncementController::class)
        ->except(['index', 'show']);

    // Manage resources
    Route::resource('resources', ResourceController::class)
        ->except(['index', 'show']);

    // Manage books
    Route::resource('books', BookController::class)
        ->except(['index', 'show']);

        // Manage borrowings
    Route::resource('borrowings', BorrowingController::class)
        ->except(['index', 'show']);

    // Restock
    Route::get(
        '/books/{book}/restock',
        [BookController::class, 'restockForm']
    )->name('books.restock');

    Route::post(
        '/books/{book}/restock',
        [BookController::class, 'restock']
    )->name('books.restock.store');

});


// ========================ADMIN ONLY =========================

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('students', StudentController::class);

    Route::resource('leaders', LeaderController::class);

});

require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\BookingController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SocialLinkController;
use App\Http\Controllers\Dashboard\SubscriberController;
use App\Http\Controllers\Dashboard\TeamController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\Dashboard\ContactMessageController;
use App\Http\Controllers\Dashboard\ScheduleController;
use App\Http\Controllers\Dashboard\UserController;
// use App\Http\Controllers\Dashboard\AdminController;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Subscriber;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\ContactMessage;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        $usersCount        = User::count();
        $doctorsCount      = Doctor::count();
        $servicesCount     = Service::count();
        $bookingsCount     = Booking::count();
        $teamCount         = Team::count();
        $testimonialsCount = Testimonial::count();
        $SubscriberCount   = Subscriber::count();
        $ContactMessageCount   = ContactMessage::count();
        $schedulesCount   = Schedule::count();
        return view('dashboard.index', compact('usersCount', 'doctorsCount', 'servicesCount', 'SubscriberCount','ContactMessageCount','schedulesCount'));
    })->name('dashboard');

    Route::get('users/trash', [UserController::class, 'trash'])->name('users.trash');
    Route::delete('users/{id}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');
    Route::delete('users/force-delete-all', [UserController::class, 'forceDeleteAll'])->name('users.forceDeleteAll');
    Route::post('users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::post('users/restore-all', [UserController::class, 'restoreAll'])->name('users.restoreAll');
    Route::resource('users', UserController::class);

    Route::get('services/trash', [ServiceController::class, 'trash'])->name('services.trash');
    Route::post('services/{id}/restore', [ServiceController::class, 'restore'])->name('services.restore');
    Route::delete('services/{id}/force-delete', [ServiceController::class, 'forceDelete'])->name('services.forceDelete');
    Route::post('services/restore-all', [ServiceController::class, 'restoreAll'])->name('services.restoreAll');
    Route::delete('services/force-delete-all', [ServiceController::class, 'forceDeleteAll'])->name('services.forceDeleteAll');
    Route::resource('services', ServiceController::class);

    Route::get('doctors/trash', [DoctorController::class, 'trash'])->name('doctors.trash');
    Route::post('doctors/{id}/restore', [DoctorController::class, 'restore'])->name('doctors.restore');
    Route::delete('doctors/{id}/force-delete', [DoctorController::class, 'forceDelete'])->name('doctors.forceDelete');
    Route::post('doctors/restore-all', [DoctorController::class, 'restoreAll'])->name('doctors.restoreAll');
    Route::delete('doctors/force-delete-all', [DoctorController::class, 'forceDeleteAll'])->name('doctors.forceDeleteAll');
    Route::resource('doctors', DoctorController::class);

    Route::get('bookings/trash', [BookingController::class, 'trash'])->name('bookings.trash');
    Route::post('bookings/{id}/restore', [BookingController::class, 'restore'])->name('bookings.restore');
    Route::post('bookings/restore-all', [BookingController::class, 'restoreAll'])->name('bookings.restoreAll');
    Route::delete('bookings/{id}/force-delete', [BookingController::class, 'forceDelete'])->name('bookings.forceDelete');
    Route::delete('bookings/force-delete-all', [BookingController::class, 'forceDeleteAll'])->name('bookings.forceDeleteAll');
    Route::resource('bookings', BookingController::class);

    Route::get('team/trash', [TeamController::class, 'trash'])->name('team.trash');
    Route::post('team/{id}/restore', [TeamController::class, 'restore'])->name('team.restore');
    Route::post('team/restore-all', [TeamController::class, 'restoreAll'])->name('team.restoreAll');
    Route::delete('team/{id}/force-delete', [TeamController::class, 'forceDelete'])->name('team.forceDelete');
    Route::delete('team/force-delete-all', [TeamController::class, 'forceDeleteAll'])->name('team.forceDeleteAll');
    Route::resource('team', TeamController::class);

    Route::get('testimonials/trash', [TestimonialController::class, 'trash'])->name('testimonials.trash');
    Route::post('testimonials/{id}/restore', [TestimonialController::class, 'restore'])->name('testimonials.restore');
    Route::post('testimonials/restore-all', [TestimonialController::class, 'restoreAll'])->name('testimonials.restoreAll');
    Route::delete('testimonials/{id}/force-delete', [TestimonialController::class, 'forceDelete'])->name('testimonials.forceDelete');
    Route::delete('testimonials/force-delete-all', [TestimonialController::class, 'forceDeleteAll'])->name('testimonials.forceDeleteAll');
    Route::resource('testimonials', TestimonialController::class);

    Route::resource('social-links', SocialLinkController::class);

    Route::get('subscribers/trash', [SubscriberController::class, 'trash'])->name('subscribers.trash');
    Route::post('subscribers/{id}/restore', [SubscriberController::class, 'restore'])->name('subscribers.restore');
    Route::post('subscribers/restore-all', [SubscriberController::class, 'restoreAll'])->name('subscribers.restoreAll');
    Route::delete('subscribers/{id}/force-delete', [SubscriberController::class, 'forceDelete'])->name('subscribers.forceDelete');
    Route::delete('subscribers/force-delete-all', [SubscriberController::class, 'forceDeleteAll'])->name('subscribers.forceDeleteAll');
    Route::resource('subscribers', SubscriberController::class);

    Route::get('contact_messages/trash', [ContactMessageController::class, 'trash'])->name('contact_messages.trash');
    Route::post('contact_messages/restore-all', [ContactMessageController::class, 'restoreAll'])->name('contact_messages.restoreAll');
    Route::post('contact_messages/{id}/restore', [ContactMessageController::class, 'restore'])->name('contact_messages.restore');
    Route::delete('contact_messages/{id}/force-delete', [ContactMessageController::class, 'forceDelete'])->name('contact_messages.forceDelete');
    Route::resource('contact_messages', ContactMessageController::class);

    Route::resource('schedules', ScheduleController::class);

});

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

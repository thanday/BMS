<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Eng\Channels\ChannelEvents;
use App\Http\Livewire\Eng\Channels\ListChannels;
use App\Http\Livewire\Eng\Events\CreateEvents;
use App\Http\Livewire\Eng\Events\DetailEvets;
use App\Http\Livewire\Eng\Events\EditEvent;
use App\Http\Livewire\Eng\Events\ListEvents;
use App\Http\Livewire\Eng\Reports\AllEvents;
use App\Http\Livewire\Eng\Reports\EventTechCount;
use App\Http\Livewire\Eng\Reports\Show;
use App\Http\Livewire\Eng\Role;
use App\Http\Livewire\Eng\Settings\ListPermissions;
use App\Http\Livewire\Eng\Settings\ListRoles;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Eng\Users\ListUsers;
use App\Http\Livewire\Eng\Users\ViewUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware' => ['role:user|admin|technician|super-admin|manager|marketing']], function () {

    Route::get('eng/dashboard', DashboardController::class)->name('eng.dashboard');
    Route::get('/notify', [DashboardController::class, 'notify'])->name('notify');
    Route::get('/markasread/{id}', [DashboardController::class, 'markasread'])->name('markasread');
});

//  route for marketing user 
Route::group(['middleware' => ['role:user|admin|technician|super-admin|manager|marketing']], function () {
    Route::get('eng/dashboard', DashboardController::class)->name('eng.dashboard');
    Route::get('eng/events', ListEvents::class)->name('eng.events');
  //  Route::get('eng/events/viewevents', ListEvents::class)->name('eng.events.viewevents');

});

Route::get('eng/createevents', CreateEvents::class)->name('eng.createevents')->middleware('role:marketing|super-admin');
Route::get('eng/events/edit/{id}', EditEvent::class, 'edit')->name('eng.edit')->middleware('role:marketing|super-admin');
Route::get('eng/event/{id}', DetailEvets::class)->name('eng.detailevents')->middleware('role:marketing|super-admin|technician|admin|manager');



Route::group(['middleware' => ['role:admin|technician|super-admin|manager|user|marketing']], function () {
    Route::get('eng/users', ListUsers::class)->name('eng.users');
    Route::get('eng/users/{id}', ViewUser::class)->name('eng.view-user');
    Route::get('eng/channels', ListChannels::class)->name('eng.channels');
    Route::get('eng/channel/{id}', ChannelEvents::class)->name('eng.channelevents');
    Route::get('eng/reports', Show::class)->name('eng.show');
    Route::get('eng/reports/allevents', AllEvents::class)->name('eng.allevents');
    Route::get('eng/reports/technicianReport', EventTechCount::class)->name('eng.eventtechcount');
    Route::get('eng/reports/download-pdf', [EventTechCount::class, 'downloadPDF']);
    Route::get('eng/reports/download_event-pdf', [AllEvents::class, 'downloadPDF']);

});

Route::group(['middleware' => ['role:admin|super-admin']], function () {
    Route::get('eng/role', ListRoles::class)->name('eng.role');
    Route::get('eng/permission', ListPermissions::class)->name('eng.permissions');
    // Route::get('eng/events/edit/{id}', [ListEvents::class, 'edit'])->name('eng.edit');
    Route::delete('eng/role/{role}/permissions/{permission}', [ListRoles::class, 'revokePermission'])->name('eng.role.permission.revoke');
    Route::delete('eng/user/{user}/role/{role}', [ListRoles::class, 'deleteRole'])->name('eng.user.role.remove');
    Route::delete('eng/permission/{permission}/user/{user}', [ViewUser::class, 'revokePermission'])->name('eng.user.permission.revoke');
    Route::delete('eng/role/{role}/user/{user}', [ViewUser::class, 'deleteRole'])->name('eng.user.role.delete');

});

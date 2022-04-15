<?php

use App\Http\Controllers\ChangePassController;
use Illuminate\Support\Facades\Route;

// use Illuminate\Support\Facades\Mail;

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

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

// Route::prefix('/')
//     ->get('/', [UserDashboardController::class, 'index'])
// /*
// |--------------------------------------------------------------------------
// | Which Home Middleware
// |--------------------------------------------------------------------------
// | Which home middleware to support one login page for multiple user
// | because static var HOME which is the destnation after user login is '/'.
// | It is checking user's role, user or admin. if someone login with
// | user role then redirect to '/' or user's dashboard and that's it. but if
// | the role is admin then first go to '/' which is user's dashboard and then
// | redirect to '/admin' or admin's dashboard.
//  */
//     ->middleware(['auth', 'which.home'])
//     ->name('user.home');

require 'web/user.php';
require 'web/admin.php';

/*
| So basically we have 2 users here, USER and ADMIN. USER prefix is '/'
| and ADMIN prefix is 'admin'. Here we have change password feature that
| can be used by either USER nor ADMIN.
 */

$users = [
    '/', 'admin',
];

foreach ($users as $user)
{
    Route::prefix($user)
        ->middleware(['auth'])
        ->group(function () use ($user)
    {
            if ($user == '/')
        {
                $user = 'user';
            }

            Route::get('/change-pass', [ChangePassController::class, 'index'])
                ->name($user . '.change-pass.index');
            Route::put('/change-pass/update', [ChangePassController::class, 'update'])
                ->name($user . '.change-pass.update');
        });
}

<?php

use App\Http\Controllers\Auth\AuthenticatedSessionByMobileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\MobileVerificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserByMobileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ResetPasswordByMobileController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    //register user By email
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    //register user By email
    Route::get('register_by_mobile', [RegisteredUserByMobileController::class, 'create'])
        ->name('register.mobile');
    Route::post('register_by_mobile', [RegisteredUserByMobileController::class, 'store'])
        ->name('register.by.mobile');

    //login user By email
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('login');

    //login user By mobile
    Route::get('login_by_mobile', [AuthenticatedSessionByMobileController::class, 'create'])
        ->name('login.mobile');
    Route::post('login_by_mobile', [AuthenticatedSessionByMobileController::class, 'store'])
        ->name('login.by.mobile');


    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');

    //forget password by mobile

    Route::get('show-forgot-password-by-mobile', [ResetPasswordByMobileController::class, 'showForgetPasswordByMobile'])
        ->name('show.forget.password.mobile');
    Route::post('send-forgot-password-by-mobile', [ResetPasswordByMobileController::class, 'sendForgetPasswordCode'])
        ->name('send.forget.password.mobile');
    Route::get('show-reset-password-by-mobile', [ResetPasswordByMobileController::class, 'showResetPasswordByMobile'])
        ->name('show.reset.password.mobile');
    Route::post('check-reset-password-by-mobile', [ResetPasswordByMobileController::class, 'checkResetPasswordByMobile'])
        ->name('check.reset.password.mobile');

});

Route::middleware('auth')->group(function () {

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    //mobile verification
    Route::get('show_mobile_verification', [MobileVerificationController::class, 'showVerificationCode'])
        ->name('show.mobile.verification');
    Route::post('send_mobile_verification', [MobileVerificationController::class, 'sendVerificationCode'])
        ->name('send.mobile.verification');
    Route::get('show_check_code', [MobileVerificationController::class, 'showCheckCode'])
        ->name('show.check.code');
    Route::post('check_mobile_code', [MobileVerificationController::class, 'checkUserMobileCode'])
        ->name('check.mobile.code');


    //logout email
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

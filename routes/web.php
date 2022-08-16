<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ACL\{
    ProfileController, PermissionController, PermissionProfileController, PlanProfileController,
    PermissionRoleController, RoleController, RoleUserController
};

use App\Http\Controllers\Admin\{
    PlanController, DetailplanController
};

Route::prefix('admin')
        ->namespace('Admin')
        //->middleware('auth')
        ->group(function() {

//Rotas Plans
Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
Route::put('plans/{url}/update', [PlanController::class, 'update'])->name('plans.update');
Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
Route::delete('plans/{url}', [PlanController::class, 'delete'])->name('plans.delete');
Route::post('plans/store', [PlanController::class, 'store'])->name('plans.store');
Route::get('admin/plans', [PlanController::class, 'index'])->name('plans.index');
//Fim Rotas Plans

//Routes Details Plan
Route::get('plans/{url}/details', [DetailplanController::class, 'index'])->name('details.plan.index');
Route::get('plans/{url}/details/create', [DetailplanController::class, 'create'])->name('details.plan.create');
Route::delete('plans/{url}/details/{idDetail}', [DetailplanController::class, 'delete'])->name('details.plan.delete');
Route::get('plans/{url}/details/{idDetail}', [DetailplanController::class, 'show'])->name('details.plan.show');
Route::put('plans/{url}/details/{idDetail}', [DetailplanController::class, 'update'])->name('details.plan.update');
Route::get('plans/{url}/details/{idDetail}/edit', [DetailplanController::class, 'edit'])->name('details.plan.edit');
Route::post('plans/{url}/details', [DetailplanController::class, 'store'])->name('details.plan.store');
//Fim Routes Details Plan

// Profile Routes
Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
Route::put('profiles/{url}/update', [ProfileController::class, 'update'])->name('profiles.update');
Route::get('profiles/create', [ProfileController::class, 'create'])->name('profiles.create');
Route::get('profiles/{url}', [ProfileController::class, 'show'])->name('profiles.show');
Route::get('profiles/{url}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::delete('profiles/{url}', [ProfileController::class, 'delete'])->name('profiles.delete');
Route::post('profiles/store', [ProfileController::class, 'store'])->name('profiles.store');
Route::get('profiles', [ProfileController::class, 'index'])->name('profiles.index');
//Fim Profile Routes

// Permissions Routes
Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
Route::put('permissions/{url}/update', [PermissionController::class, 'update'])->name('permissions.update');
Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::get('permissions/{url}', [PermissionController::class, 'show'])->name('permissions.show');
Route::get('permissions/{url}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::delete('permissions/{url}', [PermissionController::class, 'destroy'])->name('permissions.delete');
Route::post('permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
//Fim Permissions Routes

//Permission x Profile Routes
Route::get('profiles/{id}/permission/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionProfile'])->name('profiles.permission.detach');
Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');
Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'])->name('profiles.permissions');
Route::get('permissions/{id}/profile', [PermissionProfileController::class, 'profiles'])->name('permissions.profiles');
// Fim Permission x Profile Routes

//Route Plan x Profile
Route::get('plans/{id}/profile/{idProfile}/detach', [PlanProfileController::class, 'detachProfilePlan'])->name('plans.profile.detach');
Route::post('plans/{id}/profiles', [PlanProfileController::class, 'attachProfilesPlan'])->name('plans.profiles.attach');
Route::any('plans/{id}/profiles/create', [PlanProfileController::class, 'profilesAvailable'])->name('plans.profiles.available');
Route::get('plans/{id}/profiles', [PlanProfileController::class, 'profiles'])->name('plans.profiles');
Route::get('profiles/{id}/plans', [PlanProfileController::class, 'plans'])->name('profiles.plans');
//Fim Route Plan x Profile

Route::get('/plans', [PlanController::class, 'index'])->name('admin.index');

});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

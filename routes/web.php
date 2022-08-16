<?php

use App\Http\Livewire\UserTable;
use App\Http\Livewire\UserPosition;
use App\Http\Livewire\PositionTable;
use App\Http\Livewire\Admin\Mutation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarBerkas;
use App\Http\Livewire\Admin\UserAdmin;
use App\Http\Livewire\Admin\GroupAdmin;
use App\Http\Livewire\Admin\SalarySlip;
use App\Http\Livewire\User\DocumentPph;
use App\Http\Controllers\ListController;
use App\Http\Livewire\User\UserFamilies;
use App\Http\Controllers\BerkasController;
use App\Http\Livewire\Admin\PositionAdmin;
use App\Http\Livewire\User\EmployeeStatus;
use App\Http\Livewire\User\EmployeeAddress;
use App\Http\Livewire\User\EmployeeEducation;
use App\Http\Controllers\BerkasControllerUser;
use App\Http\Controllers\SalarySlipController;
use App\Http\Controllers\UserFamilyController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\DocumentPphController;
use App\Http\Controllers\ListKontrakController;
use App\Http\Livewire\Admin\UserAdministration;
use App\Http\Controllers\BerkasKontrakController;
use App\Http\Controllers\PdfCertificateController;
use App\Http\Controllers\BerkasKontrakUserController;
use App\Http\Controllers\UpdateMemberReduksiController;
use App\Http\Controllers\InputMemberReduksiController;
use App\Http\Controllers\MemberReduksiController;
use App\Http\Controllers\InputMemberReduksiFronlinerController;


use App\Http\Controllers\DocumentPphPribadiController;
use App\Http\Controllers\PhotoController;
use App\Http\Livewire\Employee\EventPresenceComponent;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	return view('dashboard');
})->name('dashboard');

Route::get('document-pph/{nik}/{nip}', [DocumentPphController::class, 'show'])->name('user.document-pph');

Route::prefix('user')->middleware(['auth:sanctum', 'role:user'])->group(function () {

	Route::delete('user-family/{user-family}', [UserFamilies::class, 'destroy'])->name('user-family.destroy');
	Route::get('families', function () {
		return view('livewire.user.families');
	})->name('user.families');
	Route::get('document-pph', [DocumentPphPribadiController::class, 'show'])->name('user.document-pph-pribadi');
	Route::get('employee-data', EmployeeStatus::class)->name('employee.data');
	Route::get('employee-education', EmployeeEducation::class)->name('employee.education');
	Route::get('employee-addresses', EmployeeAddress::class)->name('employee.addresses');
	Route::get('event-presences', EventPresenceComponent::class)->name('event.presences');
	Route::get('photo/{photo}', [PhotoController::class,'show'])->name('photo.show');
	// Route::get('user-update',function () {return view('livewire.user.index-employee-update');})->name('user.update');

	Route::delete('user-family/{user-family}', [UserFamilies::class, 'destroy'])->name('user-family.destroy');
	Route::get('families', function () {
		return view('livewire.user.families');
	})->name('user.families');
	Route::get('document-pph', [DocumentPphPribadiController::class, 'show'])->name('user.document-pph-pribadi');
	Route::get('lists', [ListController::class, 'index']);
	Route::get('salary-slip', function () {
		return view('livewire.salary.index-salary-slip');
	})->name('user.salary-slip');
	Route::get('info-rekan', function () {
		return view('livewire.employee.index-info-rekan');
	})->name('employee.info-rekan');
});

Route::middleware(['auth', 'role:administrator'])->group(function () {

    Route::resource('MemberInputReduksi',InputMemberReduksiController::class);
	Route::resource('Berkas', BerkasController::class);
    Route::resource('MemberUpdateReduksi',UpdateMemberReduksiController::class);
    Route::resource('MemberReduksi',MemberReduksiController::class);
	Route::resource('MemberReduksiFrontliner',InputMemberReduksiFronlinerController::class);
    Route::resource('BerkasUser', BerkasControllerUser::class);
    Route::resource('DaftarBerkas', DaftarBerkas::class);
    Route::resource('ListKaryawan', BerkasKontrakUserController::class);
    Route::resource('ListKontrak', ListKontrakController::class);
	Route::get('/ListKaryawan/cari', [BerkasKontrakUserController::class, 'cari'])->name('cari');
    Route::resource('DaftarKontrak', BerkasKontrakController::class);
    Route::resource('API', KAI_APIController::class);
	

	Route::get('employees', function () {
		return view('livewire.admin.index');
	})->name('admin.employees');
	Route::get('users-address', function () {
		return view('livewire.admin.index-user-address');
	})->name('admin.users-address');
	Route::get('users', function () {
		return view('livewire.admin.index-user');
	})->name('admin.users');
	Route::get('users-family', function () {
		return view('livewire.admin.index-user-families');
	})->name('admin.users-families');
	Route::delete('users/{id}/delete', [UserAdministration::class, 'destroy'])->name('user.destroy');

	Route::get('admin/salary-slip', SalarySlip::class)->name('admin.salary-slip');
});

Route::prefix('superadmin')->middleware(['auth', 'role:superadministrator'])->group(function () {
	Route::get('salaries', function () {
		return view('livewire.admin.index-monthly-salaries');
	})->name('admin.salaries');
	Route::get('mutation/{position_id}', Mutation::class)->name('mutation');
	Route::get('users', UserTable::class)->name('users');
	Route::get('positions', PositionTable::class)->name('positions');
	Route::get('/position-admin', PositionAdmin::class)->name('position-admin');
	Route::get('/group-admin', GroupAdmin::class)->name('group-admin');
	Route::get('/user-admin', UserAdmin::class)->name('user-admin');
});

Route::controller(SalarySlipController::class)
->group(function () {
	Route::get('salary-slip/{uuid}', 'show')->name('user.salary-slip-document');
	Route::get('salary-slip-offcycle/{uuid}', 'show1')->name('user.salary-slip-offcycle');
	Route::get('salary-slip-all/{uuid}/{ttd}', 'all')->name('user.salary-slip-all');
});

    Route::group(['prefix' => "list-kontrak"], function() {
        Route::get('/edit/{id}', [ListKontrakController::class, 'edit']);
    });
	Route::prefix('MemberReduksi1')->group(function () {
		
		Route::get('/{id}', [\App\Http\Controllers\MemberReduksiController::class, 'edit'])->name('MemberReduksi1.edit');

	});

<?php

use Illuminate\Support\Facades\Route;

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

Route::get('pdf-view',function(){
    return view('test-download');
});

Auth::routes(['verify'=>true]);

Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('home');

Route::get('/home',[App\Http\Controllers\HomeController::class,'index']);
//Admin
Route::group(['middleware' => ['auth','admin','verified']], function () {
    Route::get('/admin/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'dashboard'])->name('admin-dashboard');
    Route::get('registered-applicants',[App\Http\Controllers\Admin\DashboardController::class,'users'])->name('admin.users');
Route::get('/registered-applicants/{user}',[App\Http\Controllers\Admin\DashboardController::class,'downloadusers'])->name('download.user');

    Route::get('/categories',[App\Http\Controllers\Admin\CategoryController::class,'index'])->name('category.index');
    Route::post('/categories/store',[App\Http\Controllers\Admin\CategoryController::class,'store'])->name('category.store');
    Route::get('/categories/{category}/edit',[App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('category.edit');
    Route::patch('/categories/{category}/update',[App\Http\Controllers\Admin\CategoryController::class,'update'])->name('category.update');
    Route::delete('/categories/{category}/delete',[App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('category.delete');


    Route::get('/departments',[App\Http\Controllers\Admin\DepartmentController::class,'index'])->name('department.index');
    Route::post('/departments/store',[App\Http\Controllers\Admin\DepartmentController::class,'store'])->name('department.store');
    Route::get('/departments/{department}/edit',[App\Http\Controllers\Admin\DepartmentController::class,'edit'])->name('department.edit');
    Route::patch('/departments/{department}/update',[App\Http\Controllers\Admin\DepartmentController::class,'update'])->name('department.update');
    Route::delete('/departments/{department}/delete',[App\Http\Controllers\Admin\DepartmentController::class,'destroy'])->name('department.delete');


    Route::get('/intakes',[App\Http\Controllers\Admin\IntakeController::class,'index'])->name('intake.index');
    Route::post('/intake/store',[App\Http\Controllers\Admin\IntakeController::class,'store'])->name('intake.store');
    Route::get('/intake/{intake}/edit',[App\Http\Controllers\Admin\IntakeController::class,'edit'])->name('intake.edit');
    Route::patch('/intake/{intake}/update',[App\Http\Controllers\Admin\IntakeController::class,'update'])->name('intake.update');
    Route::delete('/intake/{intake}/delete',[App\Http\Controllers\Admin\IntakeController::class,'destroy'])->name('intake.delete');

    Route::get('/countries',[App\Http\Controllers\Admin\CountryController::class,'index'])->name('country.index');
    Route::post('/country/store',[App\Http\Controllers\Admin\CountryController::class,'store'])->name('country.store');
    Route::get('/country/{country}/edit',[App\Http\Controllers\Admin\CountryController::class,'edit'])->name('country.edit');
    Route::patch('/country/{country}/update',[App\Http\Controllers\Admin\CountryController::class,'update'])->name('country.update');
    Route::delete('/country/{country}/delete',[App\Http\Controllers\Admin\CountryController::class,'destroy'])->name('country.delete');



    Route::get('/academic-year',[App\Http\Controllers\Admin\AcademicYearController::class,'index'])->name('academic-year');
    Route::post('/academic-year/store',[App\Http\Controllers\Admin\AcademicYearController::class,'store'])->name('academic-year.store');
    Route::get('/academic-year/{academicYear}/edit',[App\Http\Controllers\Admin\AcademicYearController::class,'edit'])->name('academic-year.edit');
    Route::patch('/academic-year/{academicYear}/update',[App\Http\Controllers\Admin\AcademicYearController::class,'update'])->name('academic-year.update');
    Route::delete('/academic-year/{academicYear}/delete',[App\Http\Controllers\Admin\AcademicYearController::class,'destroy'])->name('academic-year.delete');


    Route::get('/programmes',[App\Http\Controllers\Admin\ProgrammeController::class,'index'])->name('programme.index');
    Route::get('/programmes/create',[App\Http\Controllers\Admin\ProgrammeController::class,'create'])->name('programme.create');
    Route::get('/programmes/{programme}/edit',[App\Http\Controllers\Admin\ProgrammeController::class,'edit'])->name('programme.edit');
    Route::patch('/programmes/{programme}/update',[App\Http\Controllers\Admin\ProgrammeController::class,'update'])->name('programme.update');
    Route::delete('/programmes/{programme}/delete',[App\Http\Controllers\Admin\ProgrammeController::class,'destroy'])->name('programme.delete');
    Route::get('/programmelist/{programme}',[App\Http\Controllers\Admin\ProgrammeController::class,'applicationlist'])->name('programme.application.list');

    //edit programme-user
    Route::get('/programme_edit_app/{programme}',[App\Http\Controllers\Admin\ProgrammeController::class,'editapplicationlist'])->name('edit_programme_list');
    //edit-programme-listblade
    Route::patch('update_programme/{programme}',[App\Http\Controllers\Admin\ProgrammeController::class,'updateapplicationdetails'])->name('updateapplication');


    Route::post('/programmes/store',[App\Http\Controllers\Admin\ProgrammeController::class,'store'])->name('programme.store');

     Route::get('/examined-by',[App\Http\Controllers\Admin\ExaminedByController::class,'index'])->name('examinedBy.index');
    Route::Post('/examined-by/store',[App\Http\Controllers\Admin\ExaminedByController::class,'store'])->name('examinedBy.store');
    Route::get('/examined-by/{examinedBy}/edit',[App\Http\Controllers\Admin\ExaminedByController::class,'edit'])->name('examinedBy.edit');
    Route::patch('/examined-by/{examinedBy}/update',[App\Http\Controllers\Admin\ExaminedByController::class,'update'])->name('examinedBy.update');
    Route::delete('/examined-by/{examinedBy}/delete',[App\Http\Controllers\Admin\ExaminedByController::class,'destroy'])->name('examinedBy.delete');

    Route::get('education-system',[App\Http\Controllers\Admin\EducationSystemController::class,'index'])->name('educationSystem.index');
    Route::post('education-system/store',[App\Http\Controllers\Admin\EducationSystemController::class,'store'])->name('educationSystem.store');
    Route::get('education-system/{educationSystem}/edit',[App\Http\Controllers\Admin\EducationSystemController::class,'edit'])->name('educationSystem.edit');
    Route::patch('education-system/{educationSystem}/update',[App\Http\Controllers\Admin\EducationSystemController::class,'update'])->name('educationSystem.update');
    Route::delete('education-system/{educationSystem}/delete',[App\Http\Controllers\Admin\EducationSystemController::class,'destroy'])->name('educationSystem.delete');


    //faq
    Route::get('admin/faq',[App\Http\Controllers\Admin\FaqController::class,'index'])->name('faq.index');
    Route::get('admin/faq/{faq}/edit',[App\Http\Controllers\Admin\FaqController::class,'edit'])->name('faq.edit');
    Route::post('admin/faq/create',[App\Http\Controllers\Admin\FaqController::class,'store'])->name('faq.store');
    Route::patch('admin/faq/{faq}/update',[App\Http\Controllers\Admin\FaqController::class,'update'])->name('faq.update');
    Route::delete('admin/faq/{faq}/delete',[App\Http\Controllers\Admin\FaqController::class,'destroy'])->name('faq.delete');

    Route::get('/admin-messages/index',[App\Http\Controllers\Admin\MessageController::class,'index'])->name('admin.message.index');
    Route::get('/admin-compose',[App\Http\Controllers\Admin\MessageController::class,'create'])->name('admin.message.create');
    Route::post('/admin-compose/store',[App\Http\Controllers\Admin\MessageController::class,'store'])->name('admin.message.store');
    Route::get('/admin-messages/{message}',[App\Http\Controllers\Admin\MessageController::class,'show'])->name('admin.message.show');
    Route::delete('/admin-messages/{message}/delete',[App\Http\Controllers\Admin\MessageController::class,'destroy'])->name('admin.message.delete');
    Route::get('/messages/sent',[App\Http\Controllers\Admin\MessageController::class,'sent'])->name('admin.message.sent');
});

    //REPLY MESSAGE
    Route::post('reply_message_testing_kit/{message}',[App\Http\Controllers\ReplyController::class,'storeReply'])->name('reply.message');
    Route::get('faq',[App\Http\Controllers\Admin\FaqController::class,'front'])->name('faq.front');


    Route::get('/programmes/{programme:name}',[App\Http\Controllers\Admin\ProgrammeController::class,'show'])->name('programme.show');



 //student
Route::group(['middleware' => ['auth','verified']], function () {
Route::get('/online-application',[App\Http\Controllers\Student\ApplicationController::class,'create'])->name('application.create');

Route::get('/student-dashboard',[App\Http\Controllers\Student\DashboardController::class,'index'])->name('student.dashboard');

//profile
//tertiary
Route::patch('tertiary-info',[App\Http\Controllers\ProfileController::class,'tertiary'])->name('tertiary.details.store');
//secondary
Route::patch('secondary-info',[App\Http\Controllers\ProfileController::class,'secondary'])->name('secondary.details.store');
//primary
Route::patch('primary-info',[App\Http\Controllers\ProfileController::class,'primaryschool'])->name('primary.details.store');


Route::patch('education-level',[App\Http\Controllers\ProfileController::class,'level'])->name('education.store');

// Route::post('education/snob/save',[App\Http\Controllers\ProfileController::class,'education'])->name('education.store');
//primary
Route::post('education-primary',[App\Http\Controllers\ProfileController::class,'primary'])->name('education.primary');
//personal
Route::post('education-personal',[App\Http\Controllers\ProfileController::class,'personal'])->name('personal.store');

//work
Route::patch('education-work',[App\Http\Controllers\ProfileController::class,'work'])->name('work.store');
//personal contacts
Route::patch('personal-contacts',[App\Http\Controllers\ProfileController::class,'contact'])->name('contact.store');
//kin
Route::patch('kin-store',[App\Http\Controllers\ProfileController::class,'nextkin'])->name('kin.store');

//application-
Route::get('apply-admission',[App\Http\Controllers\Student\ApplicationController::class,'applyAdmission'])->name('apply-admission');


//intake application
Route::get('intake-application',[App\Http\Controllers\Student\ApplicationController::class,'intakeAdmission'])->name('intake-application');

//show programmes according to intake
Route::get('intake/{intake}',[App\Http\Controllers\Admin\IntakeController::class,'show'])->name('intake.show');

//confirm programme application
Route::post('/programme/{programme}',[App\Http\Controllers\Admin\ProgrammeController::class,'confirmapplication'])->name('applyprogramme');


//select level of study
Route::post('level',[App\Http\Controllers\ProfileController::class,'level'])->name('level.store');

//pdf page
Route::get('/student-info',[App\Http\Controllers\Student\DashboardController::class,'pdf'])->name('student.pdf');
});

//pdf fownload
Route::get('fownload_funny',[App\Http\Controllers\Student\DashboardController::class,'download_student'])->name('download.student');

//
Route::get('/student-messages',[App\Http\Controllers\Student\MessageController::class,'index'])->name('student.message.index');
Route::get('/student-compose',[App\Http\Controllers\Student\MessageController::class,'create'])->name('student.message.create');
Route::post('/student-compose/store',[App\Http\Controllers\Student\MessageController::class,'store'])->name('student.message.store');
Route::get('/student-messages/{message}',[App\Http\Controllers\Student\MessageController::class,'show'])->name('student.message.show');
Route::delete('/student-messages/{message}/delete',[App\Http\Controllers\Student\MessageController::class,'destroy'])->name('student.message.delete');
Route::get('/studentmessages/sent',[App\Http\Controllers\Student\MessageController::class,'sent'])->name('student.message.sent');

<?php

use App\Http\Controllers\ProfileStepsController;
use App\Http\Controllers\profile\Step1Controller;
use App\Http\Controllers\profile\Step2Controller;
use App\Http\Controllers\profile\Step3Controller;
use App\Http\Controllers\profile\Step4Controller;
use App\Http\Controllers\profile\Step5Controller;
use App\Http\Controllers\profile\Step6Controller;
use App\Http\Controllers\profile\Step8Controller;

Route::get('/primary-information',[ProfileStepsController::class,'step1'])->name('step1');
Route::get('/personal-information',[ProfileStepsController::class,'step2'])->name('step2');
Route::get('/education-background',[ProfileStepsController::class,'step3'])->name('step3');
Route::get('/work-experience',[ProfileStepsController::class,'step4'])->name('step4');
Route::get('/contact-information',[ProfileStepsController::class,'step5'])->name('step5');
Route::get('/next-of-kin-information',[ProfileStepsController::class,'step6'])->name('step6');
Route::get('/emergency-contact',[ProfileStepsController::class,'step7'])->name('step7');
Route::get('/referee-contact',[ProfileStepsController::class,'step8'])->name('step8');
Route::get('/apply-for-programe',[ProfileStepsController::class,'step9'])->name('step9');


//step8 routes
Route::post('/step8/store',[Step8Controller::class,'store'])->name('step8.store');
Route::patch('/step8/{refereeContact}/update',[Step8Controller::class,'update'])->name('step8.update');
Route::delete('/step8/{refereeContact}/delete',[Step8Controller::class,'destroy'])->name('step8.delete');

//step6 routes
Route::post('/step6/store',[Step6Controller::class,'store'])->name('step6.store');

//step 5 routes
Route::post('/step5/store',[Step5Controller::class,'store'])->name('step5.store');

//step4 routes
Route::post('/step4/store',[Step4Controller::class,'store'])->name('step4.store');
Route::patch('/step4/{workExperience}/update',[Step4Controller::class,'update'])->name('step4.update');
Route::delete('/step4/{workExperience}/delete',[Step4Controller::class,'destroy'])->name('step4.delete');

//step 3 routes
Route::post('/step3/store',[Step3Controller::class,'store'])->name('step3.store');
Route::patch('/step3/update/{educationBackground}/update/STEP3',[Step3Controller::class,'update'])->name('step3.educationBackground.update');
Route::delete('/step3/destroy/{educationBackground}/delete/STEP3',[Step3Controller::class,'destroy'])->name('educationBackground.delete');


//step2 routes
Route::post('step2/store',[Step2Controller::class,'store'])->name('step2.store');


//step1 routes
Route::post('step1/store',[Step1Controller::class,'store'])->name('step1.store');

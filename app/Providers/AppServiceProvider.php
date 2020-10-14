<?php

namespace App\Providers;
use App\Models\Country;
use App\Models\Faq;
use App\Models\User;
use App\Models\Intake;
use App\Models\Message;
use App\Models\Category;
use App\Models\Programme;
use App\Models\Department;
use App\Models\ExaminedBy;
use App\Models\AcademicYear;
use App\Models\EducationSystem;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('categories',Category::all());
        View::share('departments',Department::all());
        View::share('academicYears',AcademicYear::all());
        View::share('intakes',Intake::all());
        View::share('programmes',Programme::all());
        View::share('examinedBys',ExaminedBy::all());
        View::share('educationSystems',EducationSystem::all());
        View::share('faqs',Faq::all());
        View::share('messages',Message::all());
        View::share('countries',Country::all());
    }
}

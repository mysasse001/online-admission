<?php

namespace App\Providers;
use App\Models\Faq;
use App\Models\User;
use App\Models\Design;
use App\Models\Intake;
use App\Models\Country;
use App\Models\Message;
use App\Models\Category;
use App\Models\Programme;
use App\Models\Department;
use App\Models\ExaminedBy;
use App\Models\AcademicYear;
use App\Models\Application;
use App\Models\EducationSystem;
use App\Models\PaymentOption;
use Illuminate\Pagination\Paginator;
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
        // Schema::defaultStringLength(191);
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
        View::share('design',Design::latest()->limit(1)->get()[0]);
        View::share('applications',Application::all());
        View::share('paymentOptions',PaymentOption::class);
        Paginator::useBootstrap();

    }
}

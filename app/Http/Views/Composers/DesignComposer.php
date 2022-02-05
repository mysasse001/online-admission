<?php

namespace App\Http\Views\Composers;

use App\Models\Design;
use Illuminate\View\View;


class DesignComposer
{

    public function compose(View $view)
    {
        $design = Design::latest()->limit(1)->get()[0];

        $view->with('design', $design);
    }


}

<?php

namespace App\Modules\UtilitiesSection\Admin\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Core\Controllers\Controller;

class UtilitiesDiagramAdminController extends Controller
{   
     /**
     * Front отрисовка страницы
     *
     * @param 
     * @return 
     */
    public function FrontView()
    {           
        $info = [
            'email'       => Auth::user()->email(),
        ];
        return view('utilities.admin.diagrams', ['info' => $info]);   
    }

}


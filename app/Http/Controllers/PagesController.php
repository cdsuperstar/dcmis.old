<?php

namespace App\Http\Controllers;

use App\models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index(){
        $owner = new Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $myl='my shit 1 ...';
        $lesson=['shit on ','aaa',343];
        return view("pages.home",compact('lesson','myl'));
    }

    public function about(){
        return view("welcome");
    }
}

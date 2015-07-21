<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;

class PagesController extends Controller
{
    public function index(){
//        $owner = new Role();
//        $owner->name         = 'owner';
//        $owner->display_name = 'Project Owner'; // optional
//        $owner->description  = 'User is the owner of a given project'; // optional
//        $owner->save();
        \Debugbar::addMessage("shit onme","fuck");
        $myl='my shit 1 ...';
        $lesson=['shit on ','aaa',343];
        return view("pages.home",compact('lesson','myl'));
    }

    public function about(){
        return view("welcome");
    }

    public function getUsercout()
    {
        //linlu
        //linlu add again
        return User::all()->count();
    }
    public function users(){
        // var data=ajax.getresponse('/Users');
        $users=User::all();
        return $users->toJson();
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{
    public function index()
    {
//        $owner = new Role();
//        $owner->name         = 'owner';
//        $owner->display_name = 'Project Owner'; // optional
//        $owner->description  = 'User is the owner of a given project'; // optional
//        $owner->save();
//        \Debugbar::addMessage("shit onme","fuck");
        $myl = 'my shit 1 ...';
        $lesson = ['shit on ', 'aaa', 343];
        return view("pages.home", compact('lesson', 'myl'));
    }

    public function about()
    {
        return view("welcome");
    }

    public function getUsercout()
    {
        //linlu
        //linlu add again
        return User::all()->count();
    }

    public function users()
    {
        // var data=ajax.getresponse('/Users');
        //wxb
        $users = User::all();
//        return response()->json(['users'=>$users->toJson()]);
        return response()->json($users);
    }

    /**
     * test user add method
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function adduser(Request $request)
    {
        $hellodata = $request->all();
        User::create([
            'name' => $hellodata['name'],
            'email' => $hellodata['email'],
            'password' => bcrypt('123'),
        ]);
        \Debugbar::addMessage($request->all(), 'shit');
        return view('welcome');
    }

    public function main()
    {
        return view("main");
    }

    public function login()
    {
        $user = User::all()->first()->toJson();
        return $user;
//        return view("login");
    }
}

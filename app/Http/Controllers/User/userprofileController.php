<?php

namespace App\Http\Controllers\User;

use App\models\userprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class userprofileController extends Controller
{
    public function getData($id = '')
    {
        //
        if ($id == '') {
            return false;
        }
        $userprofile=userprofile::firstOrCreate(['id'=>$id]);

        return response()->json($userprofile);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function postData(Request $request)
    {
        //
        $userprofile=userprofile::firstOrCreate(['id'=>$request->input('id')]);


        if($userprofile->update($request->input())){
            return response()->json([
                'messages' => trans('userprofile.updatesuccess'),
                'success' => true,
                'data' => $userprofile->toJson(),
            ]);
        }
        return response()->json(['errors' => trans('userprofile.nofound')]);
    }

    public function postSelfdata(Request $request)
    {
        $request->merge(['id'=>$request->user()->id]);
        return $this->postData($request);
    }
}

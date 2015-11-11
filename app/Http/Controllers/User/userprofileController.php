<?php

namespace App\Http\Controllers\User;

use App\models\userprofile;
use Illuminate\Http\Request;
use App\Http\Requests;
use Storage;
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

    public function getSelfdata(Request $request)
    {
        //
        $userprofile=userprofile::firstOrCreate(['id'=>$request->user()->id]);

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

        $tmp = $request->input('uploadfile');
        if(is_array($tmp)){
            $filestring=$tmp['result'];
            $comma = strpos($filestring, ',');
            $filedata = base64_decode(substr($filestring, $comma+1));
            $disk=Storage::disk('local_public');
            if($request->input('signpic')<>''){
                $signpic=str_random(30).substr($request->input('signpic'),strripos($request->input('signpic'),'.'));
                $request->merge(['signpic'=>$signpic]);
            }
        }


        if($userprofile->update($request->input())){
            if(is_array($tmp))$disk->put('/images/users/'.$request->input('id').'/'.$signpic,$filedata);

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

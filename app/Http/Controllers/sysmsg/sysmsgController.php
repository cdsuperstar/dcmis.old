<?php

namespace App\Http\Controllers\sysmsg;

use App\models\sysmsg;
use Illuminate\Http\Request;
use Cache;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class sysmsgController extends Controller
{

    protected $cacheTime = 5;

    public function getData($id = '', Request $request)
    {
        //
        if ($id == '') {
            return false;
        }
        $sSKey='sysmsg_'.$request->user()->id.'_' . $id;
        if (Cache::has($sSKey)) {
            $usersysmsgs = Cache::get($sSKey);
        } else {
            $usersysmsgs = Cache::remember($sSKey, $this->cacheTime, function () use ($id, $request) {
                return DB::table('sysmsgs')->where('friend_id', $id)->where('user_id', $request->user()->id)->get();
            });
        }
        return response()->json($usersysmsgs);
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

        $sSenderKey = 'sysmsg_' . $request->user()->id . '_' . $request->input('friend_id');
        $sReceiveKey='sysmsg_'.$request->input('friend_id').'_' . $request->user()->id;
        Cache::forget($sSenderKey);
        Cache::forget($sReceiveKey);

        $newSMsg=new sysmsg();
        $newSMsg->user_id=$request->user()->id;
        $newSMsg->friend_id=$request->input('friend_id');
        $newSMsg->sender=true;
        $newSMsg->content=$request->input('content');
        $newSMsg->readed=true;

        $newRMsg=new sysmsg();
        $newRMsg->user_id=$request->input('friend_id');
        $newRMsg->friend_id=$request->user()->id;
        $newRMsg->sender=false;
        $newRMsg->content=$request->input('content');
        $newRMsg->readed=false;

        if($newSMsg->save()&&$newRMsg->save()){
            return response()->json([
                'messages' => trans('sysmsgs.savesuccess'),
                'success' => true,
                'data' => '',
            ]);
        }
        return response()->json(['errors' => trans('sysmsgs.sendfailed')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function deleteData($id)
    {
        //
        $sysmsgtodel=sysmsg::where('id',$id)->first();
        $sSenderKey = 'sysmsg_' . $sysmsgtodel->user_id . '_' . $sysmsgtodel->friend_id;
        Cache::forget($sSenderKey);

        if(sysmsg::destroy($id)){
            return response()->json([
                'messages' => trans('sysmsgs.deletesuccess'),
                'success' => true,
                'data' => '',
            ]);
        }else{
            return response()->json(['errors' => trans('sysmsgs.nofound')]);
        }

    }

}

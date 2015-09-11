<?php

namespace App\Http\Controllers\sysmsg;

use App\models\sysmsg;
use Illuminate\Http\Request;
use Cache;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class sysmsgController extends Controller
{
    public function getData($id = '')
    {
        //
        if ($id == '') {
            return;
        }

        return;
//        Cache::remember()
        $msgs = sysmsg::where('user_id', $id)->get();
        return response()->json($msgs);
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


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function putData(Request $request, $id)
    {

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

    }

}

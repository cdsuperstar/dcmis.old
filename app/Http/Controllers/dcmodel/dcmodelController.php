<?php

namespace App\Http\Controllers\dcmodel;

use App\models\dcmodel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class dcmodelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $dcmodel = dcmodel::all();
        return response()->json($dcmodel);

    }
    public function getEdition()
    {

        return view('assets.edition')->with([
            'fields' => dcmodel::$angularrules,
            'title' => '模块编辑器',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        return $request->input();
        $recData = new dcmodel();
        if ($recData) {
            foreach ($request->input() as $key => $val) {
                $recData->$key = $val;
            }
            if ($recData->save()) {
                return response()->json([
                    'messages' => trans('dcmodels.savesuccess'),
                    'success' => true,
                    'data' => $recData->toJson(),
                ]);
            }
        }
        return response()->json(['errors' => $recData->errors()->all()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if (!$id) return false;

        $recData = dcmodel::findOrFail($id);
        if ($recData) {
            foreach ($request->input() as $key => $val) {
                $recData->$key = $val;
            }
            if ($recData->updateUniques()) {
                return response()->json([
                    'messages' => trans('dcmodels.updatesuccess'),
                    'success' => true,
                    'data' => $recData->toJson(),
                ]);
            } else {
                return response()->json(['errors' => $recData->errors()->all()]);
            }
        }
        return response()->json(['errors' => [trans('dcmodels.nofound')]]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $aTodel=array();
        $aTmp=json_decode($id);
        if( is_array($aTmp)){
            $aTodel=$aTmp;
        }else{
            $aTodel[]=$id;
        }

        $deletedRows = dcmodel::destroy($aTodel);
        if($deletedRows){
            return response()->json([
                'messages' => trans('dcmodels.deletesuccess',['rows'=>$deletedRows]),
                'success' => true,
                'data' => $deletedRows,
            ]);
        }else{
            return response()->json(['errors' => trans('dcmodels.deletesuccess',['rows'=>$deletedRows])]);
        }
    }

}

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
    public function getData($id = '')
    {
        //
        if ($id == '') {
            $dcmodel = dcmodel::all();
        } else {
            $dcmodel = dcmodel::where('id', $id)->get();
        }
        return response()->json($dcmodel);
    }

    public function getList()
    {
        $datas = dcmodel::all();
        return response()->json($datas);
    }

    public function getEdition()
    {

        return view('assets.edition')->with([
            'fields' => dcmodel::$angularrules,
            'title' => '模块编辑器',
        ]);
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
        $recData = new dcmodel();
        if ($recData) {

            $recData->fill($request->input());
            if ($request->input('modelcss') || $request->input('modelscript')) {
                $recData->files = $request->input('modelcss');
                $recData->files .= sprintf("'/views/%s/%s.css',", $request->input('name'), $request->input('name'));
                $recData->files .= $request->input('modelscript');
                $recData->files .= sprintf("'/views/%s/%s.js',", $request->input('name'), $request->input('name'));
            }
            $recData->url = '/' . $request->input('name') . '.html';
            $recData->templateurl = '/dcassets/templateurl/' . $request->input('name');

            if ($recData->save()) {
                $recData->makeModel($request->input('template'));
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
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function putData(Request $request, $id)
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
     * @param  int $id
     * @return Response
     */
    public function deleteData($id)
    {
        //
        $aTodel = array();
        $aTmp = json_decode($id);
        if (is_array($aTmp)) {
            $aTodel = $aTmp;
        } else {
            $aTodel[] = $id;
        }

        $deletedRows = dcmodel::destroy($aTodel);
        if ($deletedRows) {
            return response()->json([
                'messages' => trans('dcmodels.deletesuccess', ['rows' => $deletedRows]),
                'success' => true,
                'data' => $deletedRows,
            ]);
        } else {
            return response()->json(['errors' => trans('dcmodels.deletesuccess', ['rows' => $deletedRows])]);
        }
    }

}

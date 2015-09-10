<?php

namespace App\Http\Controllers\pxunit;

use Illuminate\Http\Request;
use App\models\pxunitgrp;
use App\models\pxunit;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class pxunitController extends Controller
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
            $pxunit = pxunit::all();
        } else {
            $pxunit = pxunit::where('id', $id)->get();
        }
        return response()->json($pxunit);
    }

    public function postMovenode(Request $req)
    {
        $pNode = pxunitgrp::where('id', '=', $req->parent)->first();
        $cNode = pxunitgrp::where('id', '=', $req->node['id'])->first();
        $cNode->makeFirstChildOf($pNode);
        for ($i = 0; $i < $req->position; $i++) {
            if ($cNode->getRightSibling() != null)
                $cNode->moveRight();
        }
        return response()->json([
            'messages' => trans('pxunits.movesuccess', ['cNode' => $cNode->pxunit->title, 'pNode' => $pNode->pxunit->title]),
            'success' => true,
            'data' => '',
        ]);
    }

    public function getTree()
    {
        $tree = pxunitgrp::leftjoin('pxunits', 'pxunitgrps.pxunit_id', '=', 'pxunits.id')->orderby('pxunitgrps.lft', 'asc')->get(['pxunitgrps.id as id', 'pxunitgrps.parent_id as parent', 'pxunits.name as text', 'pxunits.logo', 'pxunitgrps.pxunit_id as data']);
        foreach ($tree as $node) {
            if ($node->parent == null) {
                $node->parent = '#';
            }
        }
        return response()->json($tree);
    }

    public function getList()
    {
        $datas = pxunit::all();
        return response()->json($datas);
    }

    public function getEdition()
    {

        return view('assets.edition')->with([
            'fields' => pxunit::$angularrules,
            'title' => '组织结构编辑器',
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
        $recData = new pxunit();
        if ($recData) {

            $recData->fill($request->input());

            if ($recData->save()) {
                $pNode = pxunitgrp::where('id', '=', 1)->first();
                $pNode->children()->create(['pxunit_id' => $recData->id]);

                return response()->json([
                    'messages' => trans('pxunits.savesuccess'),
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

        $recData = pxunit::findOrFail($id);
        if ($recData) {
            foreach ($request->input() as $key => $val) {
                $recData->$key = $val;
            }
            if ($recData->updateUniques()) {
                return response()->json([
                    'messages' => trans('pxunits.updatesuccess'),
                    'success' => true,
                    'data' => $recData->toJson(),
                ]);
            } else {
                return response()->json(['errors' => $recData->errors()->all()]);
            }
        }
        return response()->json(['errors' => [trans('pxunits.nofound')]]);

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

        foreach ($aTodel as $key) {
            $recData = pxunit::findOrFail($key);
            $recData->delModel();
        }
        $deletedRows = pxunit::destroy($aTodel);

        if ($deletedRows) {
            pxunitgrp::rebuild(true);
            return response()->json([
                'messages' => trans('pxunits.deletesuccess', ['rows' => $deletedRows]),
                'success' => true,
                'data' => $deletedRows,
            ]);
        } else {
            return response()->json(['errors' => trans('pxunits.deletesuccess', ['rows' => $deletedRows])]);
        }
    }

}

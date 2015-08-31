<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getData($id = '')
    {
        $datas = User::where('id', '=', $id)->get();
        return response()->json($datas);
        //
    }

    public function getList()
    {
//        $count=DB::table('users')->count();
//        $data=User::where($tableState->search->predicateobject,'>',0)
//            ->orderBy($tableState->sort->predicate,$tableState->sort->reverse?'desc':'asc')
//            ->paginate
        $datas = User::all();
        return response()->json($datas);
    }

    public function postUserpwd(Request $request)
    {
        $user=$request->user();

        if(!Hash::check($request->input('oldpwd'),$user->password))
            return response()->json(['errors' => trans('users.userpwdfailed_notmatch')]);
        $user->password=$request->input('newpwd');
        $user->password_confirmation=$request->input('confirmnewpwd');
        if($user->updateUniques()){
            return response()->json([
                'messages' => trans('users.userpwdsuccess'),
                'success' => true,
                'data' => '',
            ]);
        }else{
            return response()->json(['errors' => $user->errors()->all()]);
        }

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
        $user = new User();
        if ($user) {
            foreach ($request->input() as $key => $val) {
                $user->$key = $val;
            }
            if ($user->save()) {
                return response()->json([
                    'messages' => trans('users.savesuccess'),
                    'success' => true,
                    'data' => $user->toJson(),
                ]);
            }
        }
        return response()->json(['errors' => $user->errors()->all()]);

    }


    public function getEdition()
    {

        return view('assets.edition')->with([
            'fields' => User::$angularrules,
            'title' => '用户编辑器',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return
     */
    public function putData(Request $request, $id)
    {
        //
        if (!$id) return false;

        $user = User::findOrFail($id);
        if ($user) {
            foreach ($request->input() as $key => $val) {
                $user->$key = $val;
            }
            if ($user->updateUniques()) {
                return response()->json([
                    'messages' => trans('users.updatesuccess'),
                    'success' => true,
                    'data' => $user->toJson(),
                ]);
            } else {
                return response()->json(['errors' => $user->errors()->all()]);
            }
        }
        return response()->json(['errors' => [trans('users.nofound')]]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function deleteData($id)
    {
        $aTodel = array();
        $aTmp = json_decode($id);
        if (is_array($aTmp)) {
            $aTodel = $aTmp;
        } else {
            $aTodel[] = $id;
        }

        $deletedRows = User::destroy($aTodel);
        if ($deletedRows) {
            return response()->json([
                'messages' => trans('users.deletesuccess', ['rows' => $deletedRows]),
                'success' => true,
                'data' => $deletedRows,
            ]);
        } else {
            return response()->json(['errors' => trans('users.deletesuccess', ['rows' => $deletedRows])]);
        }
    }
}

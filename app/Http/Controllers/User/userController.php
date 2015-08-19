<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
        //
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
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findorFail($id);
//        $res=$user->update();
//        dump($res);
        return 1;
    }

    public function getAll()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return
     */
    public function update(Request $request, $id)
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
    public function destroy($id)
    {
        $deletedRows = User::destroy($id);
        return response()->json($deletedRows);
    }
}

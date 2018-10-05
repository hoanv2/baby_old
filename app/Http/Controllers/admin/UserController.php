<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.user.index',compact('users'));
    }

    public function store(Request $request)
    {
        $request->password = bcrypt($request->password);
        $users = User::create($request->all());
        return response()->json([
            'data' => $users,
            'status' => true,
        ]);
    }

    public function edit(Request $request){
        $id = $request->get('id');
        $data = User::find($id);
        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function update(Request $request){
        $data = $request->all();
        $datas= User::find($data['id'])->update($data);
        return response()->json([
            'status' => true,
            'data' => $data,
        ]);

    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json([
            'errors' =>false,
            'messages' => 'xóa thành công',
        ]);
    }
}
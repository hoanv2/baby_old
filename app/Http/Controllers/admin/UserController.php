<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = DB::table('users')->paginate(5);
        $query = User::query();
        $order = $request->input('order', 'asc');
        $order = ($order == $request->input('order')) ? ($order == 'asc' ? 'desc' : 'asc') : 'desc';

        return view('admin.user.index',compact('users','order'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $users = User::create($data);
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
//        $data['password'] = bcrypt($data['password']);
        User::find($data['id'])->update($data);
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

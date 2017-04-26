<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getList()
    {
        $userModel = new User();
        $user = $userModel->getList();
        return view('admin.user.list', compact('user'));
    }

    public function getAdd()
    {
        return view('admin.user.add');
    }

    public function postAdd(UserRequest $request)
    {
        $user = new User();

        $user->name = $request->txtName;
        $user->email = $request->txtEmail;
        $user->password = Hash::make($request->txtPass);
        $user->remember_token = $request->_token;

        $user->save();
        return redirect()->route('admin.user.getList')->with([
            'flash_level' => 'success',
            'flash_message' => 'Success!! Complete Add User'
        ]);
    }

    public function getDelete($id)
    {
        $userModel = new User();
        $user = $userModel->findUser($id);
        $user->delete($id);
        return redirect()->route('admin.user.getList')->with([
            'flash_level' => 'success',
            'flash_message' => 'Success!! Complete Delete User'
        ]);

    }

    public function getEdit($id)
    {
        $userModel = new User();
        $user = $userModel->findUser($id);
        return view('admin.user.edit', compact('user', 'id'));
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request,
            [
                'txtName' => 'required',
                'txtRePass' => 'same:txtPass',
                'txtEmail' => 'required'
            ],
            [
                'txtName.required' => 'Please enter your name',
                'txtRePass.same' => 'New Pass and RePass do not match',
                'txtEmail.required' => 'Email not null'
            ]
        );
        $userModel = new User();
        $user = $userModel->findUser($id);
        $user->name = $request->txtName;
        $user->password = Hash::make($request->txtPass);
        $user->email = $request->txtEmail;
        $user->save();
        return redirect()->route('admin.user.getList')->with([
            'flash_level' => 'success',
            'flash_message' => 'Success!! Complete Update User'
        ]);
    }

}

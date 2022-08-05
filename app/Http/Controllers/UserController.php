<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Contracts\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        return view('users.login');
    }

    public function truthLogin(LoginRequest $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if(Auth::attempt($credentials)){
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => ' ',
            'password' => 'Email or Password is incorrect',
        ]);
    }

    public function logout()
    {
        
        Auth::logout();
        return redirect('/login')->with('error', "Logout Successfully");
    }

    public function userDetail($id)
    {
        $userDetail = $this->userService->getUserDetail($id);
        return view('users.user_detail', ['user' => $userDetail ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->getUserList();
        return view('users.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    public function createConfirm(UserCreateRequest $request)
    {

        $user = $this->userService->getUserConfirm($request);
        
        return view('users.create_confirm', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $user = $this->userService->getUserCreate($request);

        return redirect('/user/users')->with('success', 'User created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user = $this->userService->userEdit($id);
        return view('users.edit', ['user' => $user]);
    }

    public function editConfirm(EditUserRequest $request)
    {
        $user = $this->userService->getEditConfirm($request);
        return view('users.edit_confirm', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $user = $this->userService->userUpdate($request, $id);
       
        return redirect("/user/user_detail/$id")->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userService->userDelete($id);
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }

    public function password()
    {
        return view('users.password');
    }
    public function confirmPassword(PasswordRequest $request)
    {

        if(Hash::check($request->current_password, Auth::user()->password)){
            $user = $this->userService->confirmPassword($request);
            return redirect("/user/user_detail/$user->id")->with('success', 'Password Change successfully');
        }
        
        return back()->with('error', 'Current Password does not match');

    }

    public function search(Request $request)
    {
        $users = $this->userService->userSearch($request->search);
       if(count($users) > 0){
            return view('users.index', compact('users'))->withQuery($users);
       }else{
            return redirect('/user/users');
       }
    }
}

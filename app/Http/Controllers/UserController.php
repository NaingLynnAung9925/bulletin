<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Contracts\Services\User\UserServiceInterface;

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

    public function truthLogin(Request $request)
    {
       
         $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if(Auth::attempt($credentials)){
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ])->onlyInput('password');
    }

    public function logout()
    {
        
        Auth::logout();
        return redirect('/login')->with('success', "Logout Successfully");
    }

    public function user_detail($id)
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

    public function create_confirm(Request $request)
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

    public function edit_confirm(Request $request)
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
}

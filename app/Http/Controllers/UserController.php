<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Contracts\Services\User\UserServiceInterface;

class UserController extends Controller
{
    private $userInterface;
    public function __construct(UserServiceInterface $userInterface)
    {
        $this->userInterface = $userInterface;
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
        $userDetail = $this->userInterface->getUserDetail($id);
        return view('users.user_detail', ['user' => $userDetail ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userInterface->getUserList();
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = $this->userInterface->getUserConfirm($request);
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
        $request['created_user_id'] = Auth::user()->id;
        $request['updated_user_id'] = Auth::user()->id;
        $user = $this->userInterface->getUserCreate($request);
        
        return redirect('/user/users')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

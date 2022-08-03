<?php

namespace App\Dao\User;
use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Auth;
class userDao implements UserDaoInterface
{
    public function getUserList()
    {
        $users = User::where('deleted_user_id', null)->paginate(5);
        return $users;
    }

    public function getUserConfirm($request)
    {
        if($request->hasFile('image')){
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $image);
            $request['image'] = $image;
        }else{
            $request['image'] = '/images/profile.png';
        }
        
        $user = $request->all();
        
        return $user;
    }
    public function getUserCreate($request)
    {
        
        if($request->type == 'Admin'){
            $request->type = 0;
        }else{
            $request->type = 1;
        }
        if($request->hasFile('image')){
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $image);
            $request['image'] = $image;
        }else{
            $request['image'] = '/images/profile.png';
        }
       
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type' => $request->type,
            'image' => $request->image,
            'phone' => $request->phone,
            'address' => $request->address,
            'dob' => $request->dob,
            'created_user_id' => $request->created_user_id,
            'updated_user_id' => $request->created_user_id
        ]);
    
        $user->save();
        return $user;
    }
    public function getUserDetail($id)
    {
        
        $user = User::find($id);
        
        if($user->type == 0)
        {
            $user->type = 'Admin';
        }else{
            $user->type = 'User';
        }
        return $user;
    }
}
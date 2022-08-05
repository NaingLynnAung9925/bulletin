<?php

namespace App\Dao\User;
use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class userDao implements UserDaoInterface
{
    public function getUserList()
    {
        $users = User::where('deleted_user_id', null)->simplePaginate(5);
        return $users;
    }

    public function getUserConfirm($request)
    {
        
        $user = [
            'name'  => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'type' => $request->type,
            'image' => $request->image,
            'phone' => $request->phone,
            'address' => $request->address,
            'dob' => $request->dob,
        ];
        
        return $user;
    }
    public function getUserCreate($request)
    {
        
        if($request->type == 'Admin'){
            $request->type = 0;
        }else{
            $request->type = 1;
        }
        $request['created_user_id'] = Auth::user()->id;
        $request['updated_user_id'] = Auth::user()->id;
       
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
    public function userDelete($id)
    {
        $user = User::find($id);
        $user->deleted_user_id = Auth::user()->id;
        $user->delete();
        $user->save();
        return $user;
    }
    public function userEdit($id)
    {
        $user = User::find($id);
        return $user;
    }
    public function getEditConfirm($request)
    {

        $user = [
            'id' => $request->id,
            'name'  => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'type' => $request->type,
            'image' => $request->image,
            'phone' => $request->phone,
            'address' => $request->address,
            'dob' => $request->dob,
        ];
        
        return $user;
    }
    public function userUpdate($request, $id)
    {

        if($request->type == 'Admin'){
            $request->type = 0;
        }else{
            $request->type = 1;
        }
        $request['updated_user_id'] = Auth::user()->id;

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $request->image;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->updated_user_id = $request->updated_user_id;
        $user->update();
       
        return $user;
    }
    public function confirmPassword($request)
    {
            
        $user = Auth::user();
        $user->password = bcrypt($request->new_password);
        $user->updated_user_id = Auth::user()->id;
        $user->save();
        return $user;
           
    }
    public function userSearch($search)
    {
        $user = User::where('name', 'LIKE', '%'. $search . '%')
                    ->simplePaginate(5);
        return $user;
    }
}

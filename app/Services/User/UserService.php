<?php

namespace App\Services\User;
use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Storage;
class UserService implements UserServiceInterface
{
    private $userDao;
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }
    public function getUserList()
    {
        return $this->userDao->getUserList();
    }
    public function getUserConfirm($request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password'
        ]);
        
        if($request->hasFile('image')){
            $fileName = time().'.'.$request->image->extension();
            Storage::putFileAs('public/images', $request->file('image'), $fileName);
             $request->image = '/storage/images/'.$fileName;
            
        }else{
            $request->image = '/images/profile.png';
        }
        
        return $this->userDao->getUserConfirm($request); 
    }
    public function getUserCreate($request)
    {
        if($request->hasFile('image')){
            $fileName = time().'.'.$request->image->extension();
            Storage::putFileAs('public/images', $request->file('image'), $fileName);
            $request->image = '/storage/images/'.$fileName;
        }
        return $this->userDao->getUserCreate($request);
    }
    public function getUserDetail($id)
    {
        return $this->userDao->getUserDetail($id);
    }
    public function userDelete($id)
    {
        return $this->userDao->userDelete($id);
    }
    public function userEdit($id)
    {
        return $this->userDao->userEdit($id);
    }
    public function getEditConfirm($request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        if($request->hasFile('image')){

            $fileName = time().'.'.$request->image->extension();
            Storage::putFileAs('public/images', $request->file('image'), $fileName);
             $request->image = '/storage/images/'.$fileName;
            
        }else{
            $request->image = '/images/profile.png';
        }
        return $this->userDao->getEditConfirm($request);
    }
    public function userUpdate($request, $id){
        
        return $this->userDao->userUpdate($request, $id);
    }   
}

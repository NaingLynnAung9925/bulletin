<?php

namespace App\Services\User;
use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

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
        return $this->userDao->getUserConfirm($request); 
    }
    public function getUserCreate($request)
    {
        return $this->userDao->getUserCreate($request);
    }
    public function getUserDetail($id)
    {
        return $this->userDao->getUserDetail($id);
    }
}
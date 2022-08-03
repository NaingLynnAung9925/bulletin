<?php 

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
    public function getUserList();
    public function getUserConfirm($request);
    public function getUserCreate($request);
    public function getUserDetail($id);
}

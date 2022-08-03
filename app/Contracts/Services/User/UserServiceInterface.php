<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
    public function getUserList();
    public function getUserConfirm($request);
    public function getUserCreate($request);
    public function getUserDetail($id);
}
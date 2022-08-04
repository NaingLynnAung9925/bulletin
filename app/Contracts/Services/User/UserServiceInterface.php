<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
    public function getUserList();
    public function getUserConfirm($request);
    public function getUserCreate($request);
    public function getUserDetail($id);
    public function userDelete($id);
    public function userEdit($id);
    public function getEditConfirm($request);
    public function userUpdate($request, $id);
}
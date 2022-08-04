<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
    public function getPostList($request);
    public function getPostConfirm($request);
    public function getPostCreate($request);
}
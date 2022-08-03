<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
    public function getPostList($request);
    public function getPostConfirm($request);
    public function getPostCreate($request);
}

<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
    public function getPostList($request);
    public function getPostConfirm($request);
    public function getPostCreate($request);
    public function postDelete($id);
    public function postEdit($id);
    public function getEditConfirm($request);
    public function postUpdate($request, $id);
    public function postRestore();
    public function restoreItem($id);
}

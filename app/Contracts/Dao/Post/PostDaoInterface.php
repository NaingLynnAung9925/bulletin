<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
    public function getPostList();
    public function getCategory();
    public function getPostConfirm($request);
    public function getPostCreate($request);
    public function postDelete($id);
    public function postEdit($id);
    public function getEditConfirm($request);
    public function postUpdate($request, $id);
    public function postRestore();
    public function restoreItem($id);
    public function delete($id);
    public function postSearch($search);
    public function importCsv($request);
}

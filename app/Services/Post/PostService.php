<?php

namespace App\Services\Post;
use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;

class PostService implements PostServiceInterface
{
    private $postDao;
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }
    public function getPostList()
    {
        return $this->postDao->getPostList();
    }

    public function getCategory()
    {
        return $this->postDao->getCategory();
    }

    public function getPostConfirm($request)
    {
        return $this->postDao->getPostConfirm($request);
    }

    public function getPostCreate($request)
    {
        return $this->postDao->getPostCreate($request);
    }

    public function postDelete($id)
    {
        return $this->postDao->postDelete($id);
    }

    public function postEdit($id)
    {
        return $this->postDao->postEdit($id);
    }

    public function getEditConfirm($request)
    {
        return $this->postDao->getEditConfirm($request);
    }

    public function postUpdate($request, $id)
    {
        return $this->postDao->postUpdate($request, $id);
    }

    public function postRestore()
    {
        return $this->postDao->postRestore();
    }

    public function restoreItem($id)
    {
        return $this->postDao->restoreItem($id);
    }

    public function delete($id)
    {
        return $this->postDao->delete($id);
    }

    public function postSearch($search)
    {
        return $this->postDao->postSearch($search);
    }

    public function importCsv($request)
    {
        return $this->postDao->importCsv($request);
    }
}

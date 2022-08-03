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
    public function getPostList($request)
    {
        return $this->postDao->getPostList($request);
    }
    public function getPostConfirm($request)
    {
        return $this->postDao->getPostConfirm($request);
    }
    public function getPostCreate($request)
    {
        return $this->postDao->getPostCreate($request);
    }
}
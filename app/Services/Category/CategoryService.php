<?php

namespace App\Services\Category;

use App\Contracts\Services\Category\CategoryServiceInterface;
use App\Contracts\Dao\Category\CategoryDaoInterface;

class CategoryService implements CategoryServiceInterface
{
  private $categoryDao;
  public function __construct(CategoryDaoInterface $categoryDao){
    $this->categoryDao = $categoryDao;
  }

  public function getCategoryList()
  {
    return $this->categoryDao->getCategoryList();
  }

  public function getCategoryConfirm($request)
  {
    return $this->categoryDao->getCategoryConfirm($request);
  }

  public function getCategoryCreate($request)
  {
    return $this->categoryDao->getCategoryCreate($request);
  }

  public function categoryEdit($id)
  {
    return $this->categoryDao->categoryEdit($id);
  }

  public function categoryEditConfirm($request)
  {
    return $this->categoryDao->categoryEditConfirm($request);
  }

  public function categoryUpdate($request, $id)
  {
    return $this->categoryDao->categoryUpdate($request, $id);
  }

  public function categoryDelete($id)
  {
    return $this->categoryDao->categoryDelete($id);
  }
  
}

<?php

namespace App\Contracts\Services\Category;

interface CategoryServiceInterface
{
  public function getCategoryList();
  public function getCategoryConfirm($request);
  public function getCategoryCreate($request);
  public function categoryEdit($id);
  public function categoryEditConfirm($request);
  public function categoryUpdate($request, $id);
  public function categoryDelete($id);
}

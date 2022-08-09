<?php

namespace App\Dao\Category;
use App\Contracts\Dao\Category\CategoryDaoInterface;
use App\Models\Category;
use App\Models\Post;


class CategoryDao implements CategoryDaoInterface
{
  public function getCategoryList()
  {
    $categories = Category::where('deleted_at', null)->paginate(10);
    return $categories;
  }

  public function getCategoryConfirm($request)
  {
    $category = [
      'category_name' => $request->category_name
    ];
    return $category;

  }
  public function getCategoryCreate($request)
  {
    $category = new Category([
      'category_name' => $request->category_name,
    ]);
    $category->save();
    return $category;
  }

  public function categoryEdit($id)
  {
    $category =  Category::find($id);
    return $category;
  }

  public function categoryEditConfirm($request)
  {
    $category = [
      'id' => $request->id,
      'category_name' => $request->category_name,
    ];
    return $category;
  }

  public function categoryUpdate($request, $id)
  {
    $category = Category::find($id);
    $category->category_name = $request->category_name;
    $category->update();
    return $category;
  }

  public function categoryDelete($id)
  {
    $category = Category::find($id);
    $category->delete();
    return $category;
  }
}

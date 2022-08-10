<?php

namespace App\Dao\Post;
use App\Contracts\Dao\Post\PostDaoInterface;
use Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use DB;

class PostDao implements PostDaoInterface
{
    public function getPostList($request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        if($user->type == 0)
        {
            $data = Post::where('deleted_at', null)->orderBy('id', 'DESC')->paginate(10);
        }else
        {
            $data = Post::where('deleted_at', null)->where('created_user_id',$id)->orderBy('id', 'DESC')->paginate(10);
        }
        return $data;
    }

    public function getCategory()
    {
        $categories = Category::all();
        return $categories;
    }

    public function getPostConfirm($request)
    {
        $postData = [
            'title' => $request->title,
            'description' => $request->description,
            'categories' => $request->categories,
        ];
        return $postData;
    }
    public function getPostCreate($request)
    {
        
        
        $post = new Post([
            'title' => $request->title,
            'description' => $request->description,
            'created_user_id' => $request->created_user_id,
            'updated_user_id' => $request->created_user_id,
        ]);
        

        $post->save();
        foreach($request->categories as $category_name){
            $category = Category::where('category_name', $category_name)->first();
             DB::table('category_post')->insert([
                'post_id'   => $post->id,
                'category_id'   => $category->id
            ]);
        }

        // $category = Category::whereIn('category_name', $request->categories)->get();
        // $post->categories()->saveMany($category);
      
        // $category = Category::whereIn('category_name', $request->categories)->get();
        // $post->categories()->attach($category);
        return $post;
    }
    public function postDelete($id)
    {
        $post = Post::find($id);
        $post->deleted_user_id = Auth::user()->id;
        $post->delete();
        $post->save();
        return $post;
    }
    public function postEdit($id)
    {
        $post = Post::find($id);
        return $post;
    }
    public function getEditConfirm($request)
    {
        $post = [
            'id' => $request->id,
            'title' => $request->title,
            'description' => $request->description,
            'categories' => $request->categories
        ];
        return $post;
    }
    public function postUpdate($request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->updated_user_id = Auth::user()->id;

        DB::table('category_post')->where('post_id', $post->id)->delete();
        
        foreach($request->categories as $category_name){
            $category = Category::where('category_name', $category_name)->first();
            DB::table('category_post')->insert([
                'post_id'   => $post->id,
                'category_id'   => $category->id
            ]);
        }

        // $post->categories()->detach($category);
        // $post->categories()->attach($category);
        $post->update();
        return $post;
    }
    public function postRestore()
    {
        $post = Post::onlyTrashed()->paginate(10);
        return $post;
    }
    public function restoreItem($id)
    {
        $post = Post::onlyTrashed()->find($id)->restore();
        return $post;
    }

    public function delete($id)
    {
        $post = Post::onlyTrashed()->find($id)->forceDelete();
        return $post;
    }

    public function postSearch($search)
    {
        $post = Post::where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('user', function($user) use($search){
                        $user->where('name', 'LIKE', '%' . $search . '%');
                    })
                    ->paginate(10);
        return $post;
    }

    public function importCsv($request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xls,xlsx,csv,pdf'
        ]);
        $rows = [];
        $path = $request->file('import_file')->getRealPath();
        $records = array_map('str_getcsv', file($path));
        if(!count($records) > 0){
            return 'Error';
        }
        $fields = array_map('strtolower', $records[0]);
        array_shift($records);
        foreach ($records as $record) {
            if(count($fields) != count($record)){
                return redirect('/')->with('error', 'Csv upload invalid data');
            }
            $record = array_map("html_entity_decode", $record);
            $record = array_combine($fields, $record);
            $rows[] = $record;
        }
        foreach($rows as $data){
            
            Post::updateOrCreate([
                'id' => $data['id'],
                'title' => $data['title'],
                'description' => $data['description'],
                'created_user_id' => $data['created_user_id'],
                'updated_user_id' => $data['updated_user_id']
            ]);
        }
        
    }
}

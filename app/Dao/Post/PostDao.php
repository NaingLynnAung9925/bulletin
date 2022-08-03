<?php

namespace App\Dao\Post;
use App\Contracts\Dao\Post\PostDaoInterface;
use Auth;
use App\Models\User;
use App\Models\Post;

class PostDao implements PostDaoInterface
{
    public function getPostList($request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        if($user->type == 0)
        {
            $data = Post::where('deleted_user_id', null)->paginate(5);
        }else
        {
            $data = Post::where('deleted_user_id', null)->where('created_user_id',$id)->paginate(5);
        }
        return $data;
    }
    public function getPostConfirm($request)
    {
        $postData = [
            'title' => $request->title,
            'description' => $request->description
        ];
        return $postData;
    }
    public function getPostCreate($request)
    {
        
        $post = new Post([
            'title' => $request->title,
            'description' => $request->description,
            'created_user_id' => $request->created_user_id,
            'updated_user_id' => $request->created_user_id
        ]);
        
        $post->save();
        return $post;
    }
}
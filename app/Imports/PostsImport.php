<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class PostsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
        return Post::updateOrCreate([
            'id' => $row['id'],
            'title' => $row['title'],
            'description' => $row['description'],
            'created_user_id' => $row['created_user_id'],
            'updated_user_id' => $row['updated_user_id']
        ]);
       
        
    }
    public function rules(): array
    {
        return [
            // 'title' => "unique:posts,title"
        ];
    }

}

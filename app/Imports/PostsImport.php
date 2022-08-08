<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;

class PostsImport implements ToModel, WithHeadingRow, WithUpsertColumns
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
        return new Post([
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
    public function upsertColumns()
    {
        return ['title', 'description'];
    }
}

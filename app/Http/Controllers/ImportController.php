<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ImportController extends Controller
{
    public function import(Request $request)
    {
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
        return redirect('/')->with('success', 'Import successfully');
    }
    // private function clear_encoding_str($value)
    // {
    //     if(is_array($value)){
    //         $clean = [];
    //         foreach($value as $key => $val){
    //             $clean[$key] = mb_convert_encoding($val, 'UTF-8', 'UTF-8');
    //         }
    //         return $clean;
    //     }
    //     return mb_convert_encoding($value, 'UTF-8', 'UTF-8');
    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Exports\PostsExport;
use App\Imports\PostsImport;
use Excel;

class ImportExportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xls,xlsx,csv,pdf'
        ]);
        Excel::import(New PostsImport , $request->file('import_file'));
        return redirect('/')->with('success', 'Import File uploaded successfully');
    }
    public function export(Request $request)
    {
        return Excel::download(new PostsExport , 'posts.csv');
    }
}

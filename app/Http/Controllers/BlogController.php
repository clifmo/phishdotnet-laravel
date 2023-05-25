<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    protected $dataPath;
    protected $data;

    function __construct()
    {
        $this->dataPath = base_path() . '/public/data/blog.json';
        $this->data = json_decode(file_get_contents($this->dataPath));
    }

    function index()
    {
        $blogs = json_decode(file_get_contents($this->dataPath));
        $header = "Blogs";
        return view('blog.index', compact('blogs', 'header'));
    }

    function show($id)
    {

        $blogs = json_decode(file_get_contents($this->dataPath));

        $blog = null;
        foreach ($blogs as $blog) {
            if ($blog->id == $id) {
                break;
            }
        }

        $blogs = [$blog];
        $header = "Blogs";

        return view('blog.index', compact('blogs', 'header'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    protected $dataPath;
    protected $data;

    function __construct()
    {
        $this->dataPath = base_path() . '/public/data/news.json';
        $this->data = json_decode(file_get_contents($this->dataPath));
    }

    function index()
    {
        $news = json_decode(file_get_contents($this->dataPath));

        return view('news.index', compact('news'));
    }

    function show($id)
    {

        $news = json_decode(file_get_contents($this->dataPath));
        $new = null;
        foreach ($news as $new) {
            if ($new->id == $id) {
                break;
            }
        }

        $news = [$new];

        return view('news.index', compact('news'));
    }
}

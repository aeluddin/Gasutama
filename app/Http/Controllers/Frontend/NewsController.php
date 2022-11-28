<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::filter(request(['search']))->paginate(5);
        return view('frontend.news.index', [
            'title' => 'News',
            'datas' => $data
        ]);
    }
    public function show($id)
    {
        $data = News::find($id);

        return view('frontend.news.show',[
            'title' => 'Sehow News',
            'data' => $data
        ]);
    }
}

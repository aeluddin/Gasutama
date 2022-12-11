<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortoDesain;
use Illuminate\Http\Request;

class DesignPortoController extends Controller
{
    public function index()
    {
        $categorys = Category::get();
        $datas = PortoDesain::with('images')->filter(request(['search']))->paginate(5);
        // dd($datas);

        return view(
            'frontend.designporto.index',
            compact('datas', 'categorys'),
            [
                'title' => 'Porto Desain'
            ]
        );
    }
    public function show($id)
    {
        $PortoDesain = PortoDesain::find($id);
        if (!$PortoDesain) abort(404);
        $images = $PortoDesain->images;
        return view('frontend.designporto.show', compact('PortoDesain', 'images'), [
            'title' => 'View Porto Desain'
        ]);
    }
}

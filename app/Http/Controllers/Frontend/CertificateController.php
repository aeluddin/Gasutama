<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sartifikasi;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        // $categorys = Category::get();
        $datas = Sartifikasi::with('images')->filter(request(['search']))->paginate(5);
        return view('frontend.certificate.index',
            [
                'title' => 'Create Sartifikasi',
                // 'categorys' => $categorys,
                'datas' => $datas,
            ]
        );
    }
}

<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sartifikasi;


class GetSartifikatController extends Controller
{
    public function index()
    {
        $data = Sartifikasi::all();
        return view('sertifikat',[
            'title' => 'sertifikasi',
            'datas' => $data
        ]);

    }

    public function show($id)
    {
        $sartifikasi = Sartifikasi::find($id);
        if (!$sartifikasi) abort(404);
        $images = $sartifikasi->images;
        return view('dashboard.sartifikasi.show', compact('sartifikasi', 'images'), [
            'title' => 'View Sartifikasi'
        ]);
    }
}

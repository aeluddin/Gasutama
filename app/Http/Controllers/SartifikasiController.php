<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Sartifikasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SartifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::get();
        $datas = Sartifikasi::filter(request(['search']))->paginate(5);
        return view(
            'dashboard.sartifikasi.create',
            compact('datas','categorys'),
            [
                'title' => 'Create Sartifikasi'
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $data = $req->validate([
            'title' => 'required|unique:sartifikasis',
            'category' => '',
        ]);
        $data['slug'] = Str::slug($req->title);

        // dd($req->file('images'));
        $fotoSartifikasi = Sartifikasi::create($data);
        if ($req->has('images')) {
            foreach ($req->file('images') as $image) {
                $imageName = $data['slug'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('Sartifikasi'), $imageName);
                Image::create([
                    'sartifikasi_id' => $fotoSartifikasi->id,
                    'image' => $imageName
                ]);
            }
        }
        return back()->with('success', 'Sartifikasi Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sartifikasi = Sartifikasi::find($id);
        if (!$sartifikasi) abort(404);
        $images = $sartifikasi->images;
        return view('dashboard.sartifikasi.show', compact('sartifikasi', 'images'), [
            'title' => 'View Sartifikasi'
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sartifikasi = Sartifikasi::find($id);
        if (!$sartifikasi) {
            abort(404);
        }
        $categorys = Category::all();
        $datas = Sartifikasi::paginate('5');
        // dd($Sartifikasi);
        return view(
            'dashboard.sartifikasi.edit',
            compact('sartifikasi', 'datas','categorys'),
            [
                'title' => 'Update Sartifikasi'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
        ]);
        $data['slug'] = Str::slug($request->title);
        Sartifikasi::where('id', $id)
            ->update($data);
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $data['slug'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('Sartifikasi'), $imageName);
                Image::create([
                    'sartifikasi_id' => $id,
                    'image' => $imageName
                ]);
            }
        }
        return back()->with('success', 'Sartifikasi Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Sartifikasi::find($id);
        $images = $data->images;

        if (!$data->id) abort(404); {
            foreach ($images as $image) {
                // dd($image->id);
                $img = $image->id;
                $data2 = Image::find($img);
                if (!$data2->id) abort(404); {
                    unlink(public_path('Sartifikasi/' . $data2->image));
                    $data2->delete();
                }
            }
        }
        // dd($images);
        $data->delete();
        return redirect('/dashboard/sartifikasi')->with('success', 'Sartifikasi Dihapus!');
    }
    public function destroyImage(Image $data)
    {
        if (!$data->id) abort(404); {
            unlink(public_path('Sartifikasi/' . $data->image));
            $data->delete();
            return back()->with('success', 'Gambar Berhasil Delete');
        }
    }
}

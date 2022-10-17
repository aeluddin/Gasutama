<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\PortoDesain;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PortoDesainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::get();
        $datas = PortoDesain::filter(request(['search']))->paginate(5);
        // dd($datas);

        return view(
            'dashboard.desain.create',
            compact('datas','categorys'),
            [
                'title' => 'Create Porto Desain'
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
            'title' => 'required|unique:porto_desains',
            'category' => '',
        ]);

        $data['slug'] = Str::slug($req->title);

        // dd($data);
        $fotoDesain = PortoDesain::create($data);
        if ($req->has('images')) {
            foreach ($req->file('images') as $image) {
                $imageName = $data['slug'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('PortoDesain'), $imageName);
                Image::create([
                    'porto_desain_id' => $fotoDesain->id,
                    'image' => $imageName
                ]);
            }
        }
        return back()->with('success', 'Porto Desain Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PortoDesain = PortoDesain::find($id);
        if (!$PortoDesain) abort(404);
        $images = $PortoDesain->images;
        return view('dashboard.desain.show', compact('PortoDesain', 'images'), [
            'title' => 'View Pofile Projek'
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
        $PortoDesain = PortoDesain::find($id);
        if (!$PortoDesain) {
            abort(404);
        }
        $categorys = Category::all();
        $datas = PortoDesain::paginate('5');
        // dd($PortoDesain);
        return view(
            'dashboard.desain.edit',
            compact('PortoDesain', 'datas','categorys'),
            [
                'title' => 'Update Porto Desain'
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
        PortoDesain::where('id', $id)
            ->update($data);
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $data['slug'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('PortoDesain'), $imageName);
                Image::create([
                    'porto_desain_id' => $id,
                    'image' => $imageName
                ]);
            }
        }
        return back()->with('success', 'Profile Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PortoDesain::find($id);
        $images = $data->images;

        if (!$data->id) abort(404); {
            foreach ($images as $image) {
                // dd($image->id);
                $img = $image->id;
                $data2 = Image::find($img);
                if (!$data2->id) abort(404); {
                    unlink(public_path('PortoDesain/' . $data2->image));
                    $data2->delete();
                }
            }
        }
        // dd($images);
        $data->delete();
        return redirect('/dashboard/porto_desain')->with('success', 'Porto Desain Dihapus!');
    }
    public function destroyImage(Image $data)
    {
        if (!$data->id) abort(404); {
            unlink(public_path('PortoDesain/' . $data->image));
            $data->delete();
            return back()->with('success', 'Gambar Berhasil Delete');
        }
    }
}

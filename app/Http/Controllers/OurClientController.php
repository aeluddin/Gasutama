<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\OurClient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OurClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = OurClient::filter(request(['search']))->paginate(5);
        return view(
            'dashboard.ourclient.create',
            compact('datas'),
            [
                'title' => 'Create Our Client'
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $data = $req->validate([
            'title' => 'required|unique:our_clients',
        ]);
        $data['slug'] = Str::slug($req->title);
        $fotoOurClient = OurClient::create($data);
        if ($req->has('images')) {
            foreach ($req->file('images') as $image) {
                $imageName = $data['slug'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('OurClient'), $imageName);
                Image::create([
                    'our_client_id' => $fotoOurClient->id,
                    'image' => $imageName
                ]);
            }
        }
        return back()->with('success', 'OurClient Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ourClient = OurClient::find($id);
        if (!$ourClient) abort(404);
        $images = $ourClient->images;
        return view('dashboard.ourclient.show', compact('ourClient', 'images'), [
            'title' => 'View OurClient'
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
        $ourClient = OurClient::find($id);
        if (!$ourClient) {
            abort(404);
        }
        $datas = OurClient::paginate('5');
        // dd($ourClient);
        return view(
            'dashboard.ourclient.edit',
            compact('ourClient', 'datas'),
            [
                'title' => 'Update OurClient'
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
        ]);
        $data['slug'] = Str::slug($request->title);
        OurClient::where('id', $id)
            ->update($data);
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $data['slug'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('OurClient'), $imageName);
                Image::create([
                    'our_client_id' => $id,
                    'image' => $imageName
                ]);
            }
        }
        return back()->with('success', 'OurClient Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = OurClient::find($id);
        $images = $data->images;

        if (!$data->id) abort(404); {
            foreach ($images as $image) {
                // dd($image->id);
                $img = $image->id;
                $data2 = Image::find($img);
                if (!$data2->id) abort(404); {
                    unlink(public_path('OurClient/' . $data2->image));
                    $data2->delete();
                }
            }
        }
        // dd($images);
        $data->delete();
        return redirect('/dashboard/ourclient')->with('success', 'OurClient Dihapus!');
    }
    public function destroyImage(Image $data)
    {
        if (!$data->id) abort(404); {
            unlink(public_path('OurClient/' . $data->image));
            $data->delete();
            return back()->with('success', 'Gambar Berhasil Delete');
        }
    }
}

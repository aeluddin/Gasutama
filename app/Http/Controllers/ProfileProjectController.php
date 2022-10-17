<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Profile_proyek;
use Illuminate\Support\Str;

class ProfileProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::get();
        $data = Profile_proyek::filter(request(['search','category']))->paginate(5);
        // dd($Profile_proyek);
        return view(
            'dashboard.profile.create',
            compact('data','categorys'),
            [
                'title' => 'Create Profile Proyek'
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {   
        //return $req->file('coverImage')->store('cover-image');
        $data = $req->validate([
            'title' => 'required|unique:profile_proyeks',
            'category_id' => 'required',
            'coverImage' => 'image',
            'deskripsi'=> ''
        ]);

        $data['slug'] = Str::slug($req->title);

        if($req->file('coverImage')){
            $data['coverImage'] = $req->file('coverImage')->store('cover-image');
        }

        // dd($data);

        $new_product = Profile_proyek::create($data);

        if ($req->has('images')) {
            foreach ($req->file('images') as $image) {
                $imageName = $data['slug'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('product_images'), $imageName);
                Image::create([
                    'profile_proyek_id' => $new_product->id,
                    'image' => $imageName
                ]);
            }
        }
        return back()->with('success', 'Profile Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Profile_proyek::find($id);
        if (!$product) abort(404);
        $images = $product->images;
        return view('dashboard.profile.show', compact('product', 'images'), [
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
        $Profile_proyek = Profile_proyek::find($id);
        if (!$Profile_proyek) {
            abort(404);
        }
        $categorys = Category::all();
        $data = Profile_proyek::paginate('5');
        // dd($Profile_proyek);
        return view(
            'dashboard.profile.edit',
            compact('Profile_proyek', 'data','categorys'),
            [
                'title' => 'Update Profile project'
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
        // $data1 = Profile_proyek::find($id);
        $data = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'deskripsi'=> ''
        ]);
        $data['slug'] = Str::slug($request->title);
        Profile_proyek::where('id', $id)
            ->update($data);
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $data['slug'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('product_images'), $imageName);
                Image::create([
                    'profile_proyek_id' => $id,
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
        $data = Profile_proyek::find($id);
        $images = $data->images;

        if (!$data->id) abort(404); {
            foreach ($images as $image) {
                // dd($image->id);
                $img = $image->id;
                $data2 = Image::find($img);
                if (!$data->id) abort(404); {
                    unlink(public_path('product_images/' . $data2->image));
                    $data2->delete();
                }
            }
        }
        // dd($images);
        $data->delete();
        return redirect('/dashboard/profile')->with('success', 'Profile Dihapus!');
    }

    public function destroyImage(Image $data)
    {
        if (!$data->id) abort(404); {
            unlink(public_path('product_images/' . $data->image));
            $data->delete();
            return back()->with('success', 'Gambar Berhasil Delete');
        }
    }
}

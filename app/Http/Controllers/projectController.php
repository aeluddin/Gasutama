<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Profile_proyek;
use Illuminate\Support\Str;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categorys = Category::get();
        // $data = Profile_proyek::filter(request(['search','category']))->paginate(5);
        // dd($Profile_proyek);
        // $product = Profile_proyek::find($id);
        // $images = $product->images;
        
        $data = profile_proyek::all();

        return view('frontend.projectPortofolio',compact('data'));
        
        // $data = profile_proyek::all();
        // return view('frontend.projectPortofolio', compact('data'));
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
        return view('frontend.projectPortofolioDetails', compact('product', 'images'), [
            'title' => 'View Pofile Projek'
        ]);
    }
}
<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Profile_proyek;
use App\Http\Controllers\Controller;


class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::get();
        $data = Profile_proyek::with('images','category')->filter(request(['search','category']))->paginate(5);
        return view('frontend.projectPorto.index',compact('data','categorys'));
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Profile_proyek::with('images')->find($id);
        if (!$product) abort(404);
        $images = $product->images;
        return view('frontend.projectPorto.show', compact('product', 'images'), [
            'title' => 'View Pofile Projek'
        ]);
    }
}

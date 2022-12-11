<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = News::filter(request(['search']))->paginate(5);
        return view('dashboard.news.create', [
            'title' => 'News',
            'datas' => $data
        ]);
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
     * @param  \App\Http\Requests\  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->file('imgc'));

        $data = $request->validate([
            'title' => 'required|unique:news',
            'imgc' => 'required',
        ]);
        $data['slug'] = Str::slug($data['title']);
        if ($request->file('imgc')) {
            $imageName =  $data['slug'] .'-image-' . time() . rand(1, 1000) . '.' . $request->file('imgc')->extension();
            $request['imgc']->move(public_path('news_image'), $imageName);
            $data['imgc'] = $imageName;
        }
        $news = News::create($data);

        return redirect('dashboard/news/'.$news->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = News::find($id);

        return view('dashboard.news.show',[
            'title' => 'Sehow News',
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = News::find($id);
        $datas = News::filter(request(['search']))->paginate(5);
        return view('dashboard.news.edit', [
            'title' => 'News',
            'datas' => $datas,
            'data' => $data,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'imgc' => '',
            'content' => 'required',
        ]);
        $data['slug'] = Str::slug($data['title']);
        if ($request->file('imgc')) {
            $imageName =  $data['slug'] .'-image-' . time() . rand(1, 1000) . '.' . $request->file('imgc')->extension();
            $request['imgc']->move(public_path('news_image'), $imageName);
            $data['imgc'] = $imageName;
            $news = News::find($id);
            unlink(public_path('news_image/' . $news->imgc));
        }
        $news = News::where('id', $id)->update($data);
        // dd($news);

        return redirect('dashboard/news/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images =Image::where('news_id', $id )->get();
        // Storage::delete('news_image/'.$images[1]->image);

        foreach ($images as $image) {
            // dd($image->id);
            $img = $image->id;
            $data2 = Image::find($img);
            if ($data2->image){
                Storage::delete('news_image/'.$data2->image ,'public');
                $data2->delete();
            }
        }
        $news = News::find($id);
        unlink(public_path('news_image/' . $news->imgc));
        News::destroy($id);
        return redirect('dashboard/news');
    }

    public function uploadImage(Request $request, $id)
    {
        // dd($id);

        $fileName = $id.$request->file('file')->getClientOriginalName();
        $imgpath = $request->file('file')->storeAs('news_image', $fileName ,'public');
        Image::create([
            'news_id' => $id,
            'image' => $fileName
        ]);
        // $imageName = 'image-' . time() . rand(1, 1000) . '.' . $request->extension();
        // $request->move(public_path('news_cover'), $imageName);

        // $imgpath = request()->file('file')->store('uploads', 'public');
        // dd($imgpath);
        return response()->json(['location' => "/storage/$imgpath"]);
    }
}

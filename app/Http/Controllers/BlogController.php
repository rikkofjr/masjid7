<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;
use Carbon\Carbon;
use Auth;

use App\Models\Blog;
class BlogController extends Controller
{
  

    public function __construct(){
       $this->middleware(['auth', 'isHumas']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'judul.required' => 'Judul blog harap diisi',
            'isi.required' => 'Isi blog harap diisi',
            'gambar.max' => 'ukuran gambar tidak lebih dari :max kb ',
            'gambar.mimes' => 'Extensi yang diperbolehkan hanya jpg,png,jpeg '
        ];
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg|max:500'
        ], $messages);
        
        $image = $request->file('gambar');

        $blog = new Blog;
        $blog->judul = $request->judul;
        //if user upload image
        if(is_uploaded_file($image)){
            $imageName = 'blog-tmbn-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads',$imageName);
            $blog->gambar = $imageName;
        }else{
            $blog->gambar = 'tmbnail.jpg';
        }
        //
        $blog->isi = $request->isi;
        $blog->penulis = Auth::user()->id;
        $blog->save();
        
        //execut this method when image name has been posted in databse
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('dashboard.blog.edit', compact('blog'));
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
        $messages = [
            'judul.required' => 'Judul blog harap diisi',
            'isi.required' => 'Isi blog harap diisi',
            'gambar.max' => 'ukuran gambar tidak lebih dari :max kb ',
            'gambar.mimes' => 'Extensi yang diperbolehkan hanya jpg,png,jpeg '
        ];
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg|max:500'
        ], $messages);
        
        $image = $request->file('gambar');

        $blog = new Blog;
        $blog->judul = $request->judul;
        //if user upload image
        if(is_uploaded_file($image)){
            $imageName = 'blog-tmbn-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads',$imageName);
            $blog->gambar = $imageName;
        }
        //
        $blog->isi = $request->isi;
        $blog->penulis = Auth::user()->id;
        $blog->save();
        
        //execut this method when image name has been posted in databse
        return redirect()->back()->with('rubah', 'Data' .$blog->judul. 'Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Auth;
use Session;
class BlogController extends Controller
{
    public function homepage()
    {

        $blog = Blog::all();
        return view('blog.home',['blog'=>$blog]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loginUserId =Auth::id();
        $blog = Blog::all()->where('UserId',$loginUserId);
        return view('adminpanal.main', ['displayBlog'=>$blog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required|min:4|max:100',
            'body'=>'required|min:50'
            ]);
        $blog = new Blog();
        $blog->Title = $request->title;
        $blog->content = $request->body;
        $blog->UserId = Auth::id();
        $blog->save();
        Session::flash('success','new Blog is successfully added');
        return redirect()->route('Blog.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        $blogarr =array(
            'id' => $id,
            'blog' =>$blog
        );
        return view('blog.view',$blogarr );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $blog = Blog::find($id);
        return view('adminpanal.edit')->with('blogEdit', $blog);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'updatedtitle'=> 'required|min:4|max:100',
            'updatedbody'=>'required|min:50'
        ]);

        $blog = Blog::find($id);
        $blog->Title = $request->updatedtitle;
        $blog->content = $request->updatedbody;
        $blog->save();
        Session::flash('success',' Blog is successfully Updated');
        return redirect()->route('Blog.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        Session::flash('success','Blog is successfully Deleted');
        return redirect()->route('Blog.index');
    }
}

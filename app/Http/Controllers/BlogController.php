<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $bloglist=Blog::paginate(6);

        return view('store.blog')->withbloglist($bloglist);

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
    public function store(Request $request)
    {
        if(Auth::check()){
            $comment=new Comment();
            $comment->comment=$request->message;
            $comment->blog_id=$request->blogid;
            $comment->created_by=$request->userid;
            $comment->save();

            return response()->json(array('comment' => $comment), 200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bloglist = Blog::where('store_id', '=', "$id")->paginate(6);
        return view('store.blog')->withbloglist($bloglist);
    }


    public function showBlogSingle(Request $request)
    {
        $blogsingle = Blog::where('id',$request->blogsingleid)->first();
        $comments= Comment::where('blog_id',$blogsingle->id)->get();
        return view('store.blogsingle')->withblogsingle($blogsingle)->with(array('comments'=>$comments));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

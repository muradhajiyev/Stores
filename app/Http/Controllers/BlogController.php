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
            $blog=new Blog();
            $blog->title=$request->title;
            $blog->text=$request->text;
            $blog->image_id=1;
            $blog->store_id=$request->store_id;
            $blog->save();

            return redirect(URL::to('/store/blog/'.$request->id));
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

        return view('store.blogsingle')->withblogsingle($blogsingle);
    }



    public function  getComments($id){

        $comments= Comment::where('blog_id',$id)->get();

       return  $comments->toArray();
    }



    public function  storeComments(Request $request){
        $comment = new Comment();
        $comment->parent = $request->parent;
        $comment->content = $request->content;
        $comment->fullname = $request->name;
        $comment->blog_id = $request->blogId;
        $comment->save();
        return $request->content;
        return $request->message;
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

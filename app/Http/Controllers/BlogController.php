<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Image;
use App\Store;
use Illuminate\Support\Facades\Auth;
use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

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
    public function create(Request $request)
    {
        $store=Store::find($request->store);
        return view('store.create',["store"=>$store]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:30',
            'text' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,bmp,png|max:4000'

        ]);

        if(Auth::check()){
            $dir = config('settings.blog_base_path') . date("Y-m-d");
            $image = new Image();
            $path = $request->file('image')->store($dir);
            $filename = substr($path,strlen($dir) + 1);
            $image->file_name = $filename;
            $image->extension = $request->image->extension();
            $image->file_size = filesize($request->image);
            $image->path = date("Y-m-d").'/'.$filename;
            $image->save();

            $blog=new Blog();
            $blog->title=$request->title;
            $blog->text=$request->text;
            $blog->image_id=$image->id;
            $blog->store_id=$request->store_id;
            $blog->save();

            return redirect(URL::to("/store/blog/$request->store_id"));
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
        $store=Store::find($id);
        return view('store.blog',["store"=>$store])->withbloglist($bloglist);
    }


    public function showBlogSingle(Request $request)
    {
        $blogsingle = Blog::where('id',$request->blogsingleid)->first();
        $store=Store::find($request->storeId);
        return view('store.blogsingle',["store"=>$store])->withblogsingle($blogsingle);
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

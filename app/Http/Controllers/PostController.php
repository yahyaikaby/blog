<?php

namespace App\Http\Controllers;

use App\Post;
use DB;
use App\Http\Requests\StorePost;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $posts=DB::select('select * from posts');
       //$posts= Post::all();
       //$posts= Post::orderBy('title','asc')->take(1)->get();
        //$posts= Post::orderBy('title','asc')->get();
        $posts= Post::orderBy('title','asc')->paginate(12);
        return view('pages.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
    // validation
	$validated = $request->validated();
	//handel file uplaoaded
	if ($request->hasFile('cover_image')) {
		# get file name and extention
		$fileNameWithEx=$request->file('cover_image')->getClientOriginalName();
		// get file name
		$fileName=pathinfo($fileNameWithEx,PATHINFO_FILENAME);
		//get extention
		$fileEx=$request->file('cover_image')->getClientOriginalExtension();
		// file name to store
		$fileNameToStore=$fileName.'_'.time().'.'.$fileEx;
		//upload image
		$path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
	} else {
		$fileNameToStore='noimage.jpg';
	}

	//save post
	/*$post=new Post();
	$post->title=$request->input('title');
	$post->body=$request->input('body');
	$post->user_id=auth()->user()->id;
	$post->cover_image=$fileNameToStore;
	$post->save();*/

        $data=$request->all();
		$data['cover_image'] = $fileNameToStore;
		$data['user_id'] = auth()->user()->id;


	//$request->merge(['cover_image'=>$fileNameToStore]);
	$post=Post::create($data);
     return redirect ('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     // return  $post=Post::where('title','yahya')->get();
       $post=Post::find($id);
       return view('pages.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
	public function edit($id)

    {
		$post=Post::find($id);
		if (auth()->user()->id!==$post->user_id) {
			return redirect('index')->with('error','uncorrect user');
		}

       return view('pages.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
		//validation
		$validated = $request->validated();
		//handel file uploaded
		if ($request->hasFile('cover_image')) {
			# get file name and extention
			$fileNameWithEx=$request->file('cover_image')->getClientOriginalName();
			// get file name
			$fileName=pathinfo($fileNameWithEx,PATHINFO_FILENAME);
			//get extention
			$fileEx=$request->file('cover_image')->getClientOriginalExtension();
			// file name to store
			$fileNameToStore=$fileName.'_'.time().'.'.$fileEx;
			//upload image
			$path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
		}

		$post= Post::find($id);
		if ($request->hasFile('cover_image')){
		$data=$request->all();
		$data['cover_image'] = $fileNameToStore;
		$post->update($data);
        return redirect ('index');
		}
		else {
		$post->update($request->all());
        return redirect ('index');
		}


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$post=Post::find($id);
		if (auth()->user()->id!==$post->user_id) {
			return redirect('index')->with('error','uncorrect user');
		}
		if ($post->cover_image!='noimage.jpg') {
			# delete image
			Storage::delete('public/cover_images/'.$post->cover_image);
		}
		$post->delete();
		return redirect('index')->with('message','Iteam deleted');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }
}

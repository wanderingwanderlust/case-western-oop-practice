<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{

    protected $post;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->middleware('auth');
        $this->post = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $name = "Greg";

        return view('home', [ 'name' => $name ]);
    }

    public function store(Request $request)
    {

        try{
            $this->post->save([
                'title' => $request->get('title'),
                'slug' => $request->get('slug'),
                'intro' => $request->get('intro'),
                'image' => $request->get('image'),
                'status' => $request->get('status')
            ]);
        } catch( \Exception $e){
            return $e;
        }


        return 'success';
    }


}

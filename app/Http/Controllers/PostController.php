<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;
use App\Model\User;
use Auth;
use GrahamCampbell\Markdown\Facades\Markdown;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }


    public function index()
    {
        return view('blog.all');
    }

    public function create()
    {
        return view('blog.create')->with('userID', Auth::getUser()->id);
    }


    public function show($id)
    {
        $post = Post::findBySlug($id);
        $post['content'] = Markdown::convertToHtml($post['content']);
        return view('blog.show')->with('post', $post);
    }
}

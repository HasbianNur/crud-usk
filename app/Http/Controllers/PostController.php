<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        // $user = User::all();
        // $posts = PostModel::latest()->get();
        // return view('posts.index', compact('posts','user'));
        // if(PostModel::where('role', Auth()->user()->role == 'admin'))
        if((Auth()->user()->role == "admin") || (Auth()->user()->role == "operator"))
        {
            return view('posts.index', [
                'title' => 'Main Page Admin/Operator',
                'posts' => PostModel::all()
            ]);
        }else{
            return view('posts.index',[
                'title'  => 'Main Page',
                'posts'  => PostModel::where('user_id', Auth()->user()->id)->get()
            ]);
        }
    }

    public function welcome()
    {
        return view('welcome', [
            'title' => 'USK | Hasbian Nur',
            'posts' => PostModel::all()
        ]);
    }

    public function create()
    {
        $data = [
            'title'     => 'Create Data'
        ];
        return view('posts.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required|string|max:155',
            'content'   => 'required',
            'status'    => 'required'
        ]);

        $post = PostModel::create([
            'title'     => $request->title,
            'content'   => $request->content,
            'status'    => $request->status,
            'slug'      => Str::slug($request->title),
            'user_id'   => Auth()->user()->id
        ]);


        if ($post) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function edit($id)
    {
        $post = PostModel::findOrFail($id);
        $title = 'Edit Data';
        return view('posts.edit', compact('post','title'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:155',
            'content' => 'required',
            'status' => 'required'
        ]);

        $post = PostModel::findOrFail($id);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'slug' => Str::slug($request->title)
        ]);

        if ($post) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function destroy($id)
    {
        $post = PostModel::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('post.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}

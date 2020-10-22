<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $authUser = Auth::user();
        $q = \Request::query();
        $param = ['authUser' => $authUser];

        if (isset($q['category_id'])) {
            $posts = Post::latest()->where('category_id', $q['category_id'])->simplePaginate(10);

            return view('posts.category', [
                'posts' => $posts, $param,
                'authUser' => $authUser,
            ]);

        } else if (isset($q['prefecture_id'])) {
            $posts = Post::latest()->where('prefecture_id', $q['prefecture_id'])->simplePaginate(10);

            return view('posts.category', [
                'posts' => $posts, $param,
                'authUser' => $authUser,
            ]);

        } else if (isset($q['buy_id'])) {
            $posts = Post::latest() ->where('buy_id', $q['buy_id'])->simplePaginate(10);

            return view('posts.category', [
                'posts' => $posts, $param,
                'authUser' => $authUser,
            ]);
        }
        $posts = Post::latest()->simplePaginate(12);
        return view('posts.index', [
            'posts' => $posts, $param,
            'authUser' => $authUser
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $authUser = Auth::user();
        $param = ['authUser' => $authUser,];

        return view('posts.create', ['authUser' => $authUser, $param,]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if ($request->isMethod('post')) {
            $post = new Post;
            $post->user_id = $request->user_id;
            $post->category_id = $request->category_id;
            $post->content = $request->content;
            $post->title = $request->title;
            $post->prefecture_id = $request->prefecture_id;
            $post->address = $request->address;
            $post->price = $request->price;
            $post->buy_id = $request->buy_id;

        } if ($request->hasFile('image')) {
            $post->image = $request->file('image');
            $filename = $request->file('image')->store('/public/image');
            $post->image = basename($filename);
        }

            $post->save();

        return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $authUser = Auth::user();
        $param = ['authUser' => $authUser,];

        if (Auth::check()){
        return view('posts.show', [
            'post' => $post, $param,
            'authUser' => $authUser,
        ]);
        } else {
        return redirect(route('login'))->with('success', '投稿を見るにはログインが必要です。');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($post_id,Request $request)
    {
        $post = Post::findOrFail($post_id);
        $post->user_id = $request->user_id;
        $post->content = $request->content;
        $post->title = $request->title;
        $post->save();

        return redirect()->route('posts.show', ['post' => $post]);with('success', '保存しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);

        \DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });

        return redirect('/');
    }

    public function search(Request $request)
    {

        $authUser = Auth::user();
        $param = [
            'authUser' => $authUser,
        ];
        $q = \Request::query();

        if (isset($q['buy_id']) && isset($q['prefecture_id']) && isset($q['category_id']) && isset($request->search)) {
            $posts = Post::latest()
            ->where('buy_id', $q['buy_id'])->where('prefecture_id', $q['prefecture_id'])
            ->where('category_id', $q['category_id'])->where('title', 'like', "%{$request->search}%")
            ->simplePaginate(10);

        } elseif (isset($q['prefecture_id']) && isset($q['category_id']) && isset($request->search)) {
            $posts = Post::latest()
            ->where('prefecture_id', $q['prefecture_id'])
            ->where('category_id', $q['category_id'])->where('title', 'like', "%{$request->search}%")
            ->simplePaginate(10);

        } elseif (isset($q['buy_id']) && isset($q['prefecture_id']) && isset($request->search)) {
            $posts = Post::latest()
            ->where('buy_id', $q['buy_id'])->where('prefecture_id', $q['prefecture_id'])
            ->where('title', 'like', "%{$request->search}%")
            ->simplePaginate(10);

        } elseif (isset($q['buy_id']) && isset($q['category_id']) && isset($request->search)) {
            $posts = Post::latest()
            ->where('buy_id', $q['buy_id'])->where('category_id', $q['category_id'])
            ->where('title', 'like', "%{$request->search}%")->simplePaginate(10);

        } elseif (isset($q['buy_id']) && isset($q['prefecture_id']) && isset($q['category_id'])) {
            $posts = Post::latest()
            ->where('buy_id', $q['buy_id'])->where('prefecture_id', $q['prefecture_id'])
            ->where('category_id', $q['category_id'])->simplePaginate(10);

        } elseif (isset($q['prefecture_id']) && isset($request->search)) {
            $posts = Post::latest()->where('prefecture_id', $q['prefecture_id'])
            ->where('title', 'like', "%{$request->search}%")->simplePaginate(10);

        } elseif (isset($q['buy_id']) && isset($request->search)) {
            $posts = Post::latest()->where('buy_id', $q['buy_id'])->where('title', 'like', "%{$request->search}%")->simplePaginate(10);

        } elseif (isset($q['category_id']) && isset($request->search)) {
            $posts = Post::latest()->where('category_id', $q['category_id'])->where('title', 'like', "%{$request->search}%")->simplePaginate(10);

        }elseif (isset($q['prefecture_id']) && isset($q['buy_id'])) {
            $posts = Post::latest()->where('prefecture_id', $q['prefecture_id'])->where('buy_id', $q['buy_id'])->simplePaginate(10);

        } elseif (isset($q['category_id']) && isset($q['buy_id'])) {
            $posts = Post::latest()->where('category_id', $q['category_id'])->where('buy_id', $q['buy_id'])->simplePaginate(10);

        } elseif (isset($q['prefecture_id']) && isset($request->search)) {
            $posts = Post::latest()->where('prefecture_id', $q['prefecture_id'])->where('title', 'like', "%{$request->search}%")->simplePaginate(10);

        } elseif (isset($q['prefecture_id']) && isset($q['category_id'])) {
            $posts = Post::latest()->where('prefecture_id', $q['prefecture_id'])->where('category_id', $q['category_id'])->simplePaginate(10);

        } elseif (isset($request->search)) {
            $posts = Post::where('title', 'like', "%{$request->search}%")->orWhere('content', 'like', "%{$request->search}%")->simplepaginate(10);

        } elseif (isset($q['category_id'])) {
            $posts = Post::latest()->where('category_id', $q['category_id'])->simplePaginate(10);

        } elseif (isset($q['prefecture_id'])) {
            $posts = Post::latest()->where('prefecture_id', $q['prefecture_id'])->simplePaginate(10);

        } elseif (isset($q['buy_id'])) {
            $posts = Post::latest()->where('buy_id', $q['buy_id'])->simplePaginate(10);

        } else {
            $posts = Post::latest()->simplePaginate(10);
        }
        $search_result = '検索結果　'.$posts->count().'件';
        return view('posts.search', [
            'authUser' => $authUser,
            'posts' => $posts, $param,
            'search_result' => $search_result,
        ]);

}
}

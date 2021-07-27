<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'allNews']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('landing-page', [
            'news' => News::with('category','author')->latest()
                ->paginate(10)
        ]);
    }

    public function allNews(){
        return view('all-news', [
            'news' => News::with('category','author')->latest()
                ->filter(request(['search', 'author','category']))
                ->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', [
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','unique:news,title'],
            'thumbnail' => 'required|image',
            'content' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $news = new News;

        $news->title = $request->title;
        $news->slug = Str::slug($request->title, '-');
        $news->content = $request->content;
        $news->published_at = now();
        $news->category_id = $request->category_id;
        $news->user_id = auth()->id();
        $news->thumbnail = $request->file('thumbnail')->store('posts/thumbnails', 'public');

        $news->save();

        return redirect('/news/'.$news->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $news->increment('number_of_visitor');
        return view('show', [
            'news' => News::with(['category', 'comments','author'])->where('id', '=', $news->id)->first(),
            'similarNews' => News::getSimilarNews($news)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('edit', [
            'news' => $news,
            'category' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => ['required','unique:news,title'],
            'content' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if ($request->hasFile('thumbnail')) {
            $request->validate([
                'thumbnail' => 'required|image',
            ]);
            $news->thumbnail = $request->file('thumbnail')->store('posts/thumbnails', 'public');
        }

        $news->title = $request->title;
        $news->slug = Str::slug($request->title, '-');
        $news->content = $request->content;
        $news->category_id = $request->category_id;
        $news->save();

        return redirect('/news/'.$news->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect('/');
    }
}

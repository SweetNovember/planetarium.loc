<?php

namespace App\Http\Controllers;

use App\News;
use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));

        $news = new News();
        $news = $news->where('message', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy('create_date', 'desc')
            ->paginate(5);

        if ($request->ajax()) {
            return view('news.index', compact('news'));
        } else {
            return view('news.ajax', compact('news'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $themes = Theme::pluck('name', 'id');

        if ($request->isMethod('get'))
            return view('news.form', compact('themes'));

        $rules = [
            'header' => 'required',
            'message' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }
        $news = new News();
        $news->header = $request->header;
        $news->message = $request->message;
        $news->create_date = $request->create_date;
        $news->user_id = $request->user_id;
//        $news->theme_id = $request->theme_id;
        $news->theme_id = $request->get('theme_id');
        var_dump($news);
        $news->save();

        return response()->json([
            'fail' => false,
            'redirect_url' => url('news')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $themes = new Theme();
        $themes = $themes->where('id', function ($query) use ($id) {
            $query->select('theme_id')->from('news')->where('id', '=', $id);
        })->get();
        $theme_name = '';
        foreach ($themes as $theme) {
            $theme_name = $theme['name'];
        }
        if ($request->isMethod('get')) {
            return view('news.detail', ['item' => News::find($id), 'name_theme' => $theme_name]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->isMethod('get'))
            return view('news.form', ['news' => News::find($id)]);

        $rules = [
            'header' => 'required',
            'message' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);

        $news = News::find($id);
        $news->header = $request->header;
        $news->message = $request->message;
        $news->create_date = $request->create_date;
        $news->user_id = $request->user_id;
        $news->theme_id = $request->theme_id;
        $news->save();

//        var_dump('...\n');
//        print_r(response()->json([
//            'fail' => false,
//            'redirect_url' => 'http://planetarium.loc/news'
//        ]));
        return response()->json([
            'fail' => false,
            'redirect_url' => url('news')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        News::destroy($id);
        return redirect('news');
    }

    public function readXML(Request $request)
    {
        $url = 'http://zele.ru/allrssnovosti.xml';
        $url_1 = 'http://elementy.ru/rss/news/cosmos';
        $rss = simplexml_load_file($url_1);

//        foreach ($rss->channel->item as $item) {
//            echo '<h1>'.$item->title.'</h1>';
//            echo $item->description;
//        }

//        if ($request->ajax()) {
        return view('news.readXML', compact('rss'));

    }

}

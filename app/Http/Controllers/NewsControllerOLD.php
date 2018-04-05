<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsControllerOLD extends Controller
{
    public function index(){
        $news = DB::table('news')->select('users.name','news.id','news.header','news.message','news.create_date')
            ->join('users', function($join) {
                $join->on('news.user_id', '=', 'users.id');
            })
            ->orderBy('news.id','desc')
            ->paginate(1);
//        var_dump($n);
//        ->where('users.id', '=', Auth::user()->getAuthIdentifier())
//        $news = News::latest()->paginate(10);
        return view('news.index',compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){

        return view('news.create');
    }

    /**
     * @param News $news
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(News $news)
    {
        return view('news.show',compact('news'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'header' => 'required',
            'message' => 'required',
        ]);
        News::create($request->all());
        return redirect()->route('news.index')
            ->with('success','News created successfully');
    }


    public function edit(News $news)
    {
        return view('news.edit',compact('news'));
    }

    public function update(Request $request,News $news)
    {
        request()->validate([
            'header' => 'required',
            'message' => 'required',
        ]);
        $news->update($request->all());
        return redirect()->route('news.index')
            ->with('success','News updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        return redirect()->route('news.index')
            ->with('success','News deleted successfully');
    }
}

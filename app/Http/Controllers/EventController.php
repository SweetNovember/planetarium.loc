<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request)
    {
        $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));

        $request->session()->put('field', $request
            ->has('field') ? $request->get('field') : ($request->session()
            ->has('field') ? $request->session()->get('field') : 'information'));

        $request->session()->put('sort', $request
            ->has('sort') ? $request->get('sort') : ($request->session()
            ->has('sort') ? $request->session()->get('sort') : 'asc'));

        $events = new Event();
        $events = $events->where('information', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy('date_time_start', 'desc')
            ->paginate(6);
        //->orderBy($request->get('field'), $request->session()->get('sort'))
        if ($request->ajax()) {
            return view('events.index', compact('events'));
        } else {
            return view('events.ajax', compact('events'));
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Event $event
     */
    public function show(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            return view('events.detail', ['item' => Event::find($id)]);
        }
    }

    public function store(Request $request)
    {
        request()->validate([
            'header' => 'required',
            'message' => 'required',
        ]);
        News::create($request->all());
        return redirect()->route('news.index')
            ->with('success', 'News created successfully');
    }


    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        request()->validate([
            'header' => 'required',
            'message' => 'required',
        ]);
        $news->update($request->all());
        return redirect()->route('news.index')
            ->with('success', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            Event::destroy($request->id);
            return response(['message' => 'You sign successfully.']);
        }
    }
}

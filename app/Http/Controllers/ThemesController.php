<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Theme;
use App\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('nl');
        $topics = Theme::with('topics', 'lastTopic.user')->get();

        $themes = Theme::all();
//        $topics = Topic::with('theme', 'lastTopic.user')->get()->find($id);

        return view('themes.index')->with('themes', $themes)->with('topics', $topics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('themes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Theme::create($request->input()); //Dit doet hetzelfde als bovenstaande

        return redirect('/');
    }

    /**j
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Carbon::setLocale('nl');
        $topics = Topic::with('theme', 'lastReply.user')->get()->find($id);


        $theme = Theme::with('topics')->find($id);

        return view('themes.theme')->with('topics', $topics)->with('theme', $theme);
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
        $theme = Theme::find($id);
    }
}

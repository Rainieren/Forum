<?php

namespace App\Http\Controllers;

use App\User;
use App\Theme;
use App\Topic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{

    public function topic() {
        return view('topics.topic', array('user' => Auth::user()));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($theme_id)
    {
        $theme = Theme::with('topics')->findOrFail($theme_id);
        //$topic = Topic::with('theme')->findOrFail($topic_id);

        return view('topics.create')->withTheme($theme);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Topic::create($request->input()); //Dit doet hetzelfde als bovenstaande

        return redirect()->route('showtheme', ['theme_id' => $request->input('theme_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($theme_id, $topic_id)
    {
        $theme = Theme::with('topics')->findOrFail($theme_id);
        $topic = Topic::with('theme')->findOrFail($topic_id);

        return view('topics.topic')->withTopic($topic)->withTheme($theme);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd("[$id] Edit");
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
        //
    }
}

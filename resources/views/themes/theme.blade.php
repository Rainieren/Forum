@extends('layouts.default')

@section('content')
    <div class="container main-content">
        <div class="row first-row">
            @if(Auth::check())
            <div class="col s12">
                <div class="card">
                    <div class="card-content clearfix">
                        <a href="{{ route('createtopic', ['theme_id' => $theme->id]) }}" class="waves-effect waves-light btn blue-grey darken-4">New topic <i class="material-icons right">edit</i></a>
                    </div>
                </div>
            </div>
            @endif

            <div class="col s12">
                <div class="card">
                    <div class="card-content"><span class="card-title">{{ $theme->theme_title }} - Topics</span>
                            @if($theme->topics->count() == 0)
                                    <div class="row">
                                        <div class="col s12 ">
                                                <div class="col s12">
                                                    <span class="card-title" style="font-style: italic; color: grey">No topics yet! Create one!</span>
                                                </div>
                                        </div>
                                    </div>
                            @else
                            <div class="collection">
                            @foreach($theme->topics as $topic)
                                <a href="{{ route('showtopic', ['theme_id'=>$theme->id, 'topic_id' => $topic->id]) }}" class="collection-item avatar collection-link"><img src="/uploads/avatars/{{ $topic->user->avatar }}" alt="" class="circle">
                                    <div class="row">
                                        <div class="col s6">
                                            <div class="row last-row">
                                                <div class="col s12">
                                                    <h6>{{ $topic->topic_title }}</h6>
                                                    <p>{!! str_limit($topic->topic_text, $limit = 125, $end = '...') !!}</p>
                                                </div>
                                            </div>
                                            <div class="row last-row">
                                                <div class="col s12 post-timestamp">Posted by: {{ $topic->user->username }} on: {{  $topic->created_at }}</div>
                                            </div>
                                        </div>
                                        <div class="col s2">
                                            <h6 class="title center-align">Replies</h6>
                                            <p class="center replies">{{ $topic->replies->count() }}</p>
                                        </div>
                                        <div class="col s2">
                                            <h6 class="title center-align">Status</h6>
                                            <div class="status-wrapper center-align">
                                                <span class="status-badge status-open">open</span>
                                            </div>
                                        </div>
                                        <div class="col s2">
                                            <h6 class="title center-align">Last reply</h6>
                                            <p class="center-align">Naam</p>
                                            <p class="center-align">Tijd</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

                @if(Auth::check())
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content clearfix">
                                <a href="{{ route('createtopic', ['theme_id'=>$theme->id]) }}" class="waves-effect waves-light btn blue-grey darken-4">New topic <i class="material-icons right">edit</i></a>
                            </div>
                        </div>
                    </div>
                @endif
        </div>
    </div>
@endsection
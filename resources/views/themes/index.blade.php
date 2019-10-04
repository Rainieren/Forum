@extends('layouts.default')

@section('content')

    <div class="container first-container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-content"><span class="card-title">Themes</span>
                        <div class="collection">
                            @foreach($themes as $theme)
                            <a href="{{ route('showtheme', ['theme_id' => $theme->id]) }}" class="collection-item avatar collection-link">
                                <img src="{{ asset('img/icon.png') }}" alt="" class="circle">
                                    <div class="row">
                                        <div class="col s8">
                                            <div class="row last-row">
                                                <div class="col s12">
                                                    <span class="card-title">{{ $theme->theme_title }}</span>
                                                    <p>{{ $theme->theme_description }}</p>
                                                </div>
                                            </div>
                                            <div class="row last-row">
                                                <div class="col s12 post-timestamp">Admin: {{ $theme->user->username }}</div>
                                            </div>
                                        </div>
                                            <div class="col s2">
                                                <h6 class="title center-align">Statistieken</h6>
                                                <p class="center-align">{{ $theme->topics->count() }} topic(s)</p>
                                            </div>
                                            <div class="col s2">
                                                <h6 class="title center-align">Last topic</h6>
                                                @if($theme->lastTopic)
                                                <p class="center-align">{{ $theme->lastTopic->user->username }}</p>
                                                <p class="center-align">{{ $theme->lastTopic->created_at->diffForHumans() }}</p>
                                                @else
                                                    <p class="center-align" style="color: grey; font-style: italic">No Topics</p>
                                                    <p class="center-align" style="color: grey; font-style: italic">yet</p>
                                                @endif
                                            </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
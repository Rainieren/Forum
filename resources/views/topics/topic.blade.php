@extends('layouts.default')

@section('content')
<div class="container first-container">
    <div class="row first-row">
        <div class="col s12">
            <div class="card">
                <div class="card-content clearfix">
                    <span class="card-title">{{ $theme->theme_title }} - {{ $topic->topic_title }}
                        <span class="status-badge status-open">Open</span>
                    </span>
                </div>
            </div>
            <div class="card blue-grey lighten-5">
                <div class="card-content">
                    <div class="collection">
                        <div class="collection-item row">
                            <div class="col s3" style="padding-bottom: 20px;">
                                <div class="avatar collection-link">
                                    <div class="row">
                                        <div class="col s3">
                                            <a href="{{ route('showprofile', ['username' => $topic->user->username ]) }}">
                                                <img src="{{ asset('uploads/avatars/' . $topic->user->avatar) }}" class="circle responsive-img" style="">
                                            </a>
                                        </div>
                                        <div class="col s9">
                                            <p class="user-name">
                                                <a href="{{ route('showprofile', ['username' => $topic->user->username ]) }}">
                                                    {{ $topic->user->username }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    @if($topic->user->role_id == 2)
                                    Role:<p class="administrator-label-topic">{{ $topic->user->role->role_name }}</p>
                                    @else
                                        <p style="">Role: {{ $topic->user->role->role_name }}</p>
                                    @endif
                                    <p>Member since: {{ $topic->user->created_at }}</p>
                                    <p class="post-timestamp">Posted: {{$topic->created_at }}</p>
                                </div>
                            </div>
                            <div class="col s9">
                                <div class="row last-row">
                                    <div class="col s12">
                                        <p>{!! $topic->topic_text !!}</p>
                                    </div>
                                </div>
                                <div class="row last-row block-timestamp">
                                    <div class="col s6">
                                        <p class="post-timestamp">Last changed: {{ $topic->updated_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="col s6">
                                        @if(Auth::guest())

                                        @elseif(Auth::user()->username == $topic->user->username || Auth::user()->role_id == 2 )
                                            <p class="post-timestamp right">
                                                <a href="{{ route('deletetopic', ['id' => $topic->id]) }}" class="waves-effect waves-light btn button-xs-danger button-normaltext right"
                                                   onclick="event.preventDefault(); document.getElementById('delete-form{{ $topic->id }}').submit();">delete
                                                    <form id="delete-form{{ $topic->id }}"
                                                          action="{{ route('deletetopic', ['id' => $topic->id]) }}"
                                                          method="POST"
                                                          style="display: none">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </a>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::guest())
                <div class="not-loggedin-text">
                    <p class="center">You need to <a href="{{ url('/login') }}">sign in</a> to participate in this discussion.</p>
                </div>
            @else
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Leave a Reply</span>
                    <div class="row">
                        <form method="POST" action="{{ route('createreply') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                            <div class="col s1">
                                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" class="rounded" style="height: 64px;width: 64px;position: relative;top: 15px;">
                            </div>
                            <div class="form-group col s11 input-field customfield">
                                <textarea id="message-body textarea1" class="form-control" rows="10" name="reply_text" placeholder="Got something to say?" style=""></textarea>
                            </div>
                            <div class="col s12 offset-s1">
                                <button class="btn blue right answeringbutton z-depth-0" type="submit"><i class="material-icons right">reply</i>Reply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            <div class="card">
                <div class="card-content">
                    <p>Comments • {{ $topic->replies->count() }}</p>
                    @foreach($topic->replies->sortByDesc('created_at') as $reply)
                    <div class="collection" style="">
                            <div class="collection-item row" >
                                <div class="col s3" style="padding-bottom: 20px;">
                                    <div href="" class="avatar collection-link">
                                        <div class="row">
                                            <div class="col s3">
                                                <a href="{{ route('showprofile', ['username' => $reply->user->username ]) }}">
                                                    <img src="{{ asset('uploads/avatars/' . $reply->user->avatar) }}" alt="" class="" style="width: 50px;">
                                                </a>
                                            </div>
                                            <div class="col s9">
                                                <p class="user-name"><a href="{{ route('showprofile', ['username' => $reply->user->username ]) }}">{{ $reply->user->username }}</a></p>
                                            </div>
                                        </div>
                                        @if($reply->user->role_id == 2)
                                            Role:<p class="administrator-label-topic">{{ $reply->user->role->role_name }}</p>
                                        @elseif($reply->user->role_id == 3)
                                            Role:<p class="moderator-label">{{ $reply->user->role->role_name }}</p>
                                        @else
                                            <p style="">Role: {{ $reply->user->role->role_name }}</p>
                                        @endif
                                        <p>Posted: {{ $reply->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="col s9">
                                    <div class="row last-row">
                                        <div class="col s12">
                                            <p>{{ $reply->reply_text }}</p>
                                        </div>
                                    </div>
                                    <div class="row last-row block-timestamp">
                                        <div class="col s6">
                                            @if(Auth::guest())
                                            @else
                                                <a href="">
                                                    <small style="font-size: 14px; color: grey">Reply</small>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col s6">
                                            @if(Auth::guest())
                                            @elseif(Auth::user()->username == $reply->user->username)
                                                    <a href="{{ route('deletereply', ['id' => $reply->id]) }}"  class="waves-effect waves-light btn button-xs-danger right"
                                                       onclick="event.preventDefault(); document.getElementById('delete-form{{ $reply->id }}').submit();">Delete
                                                        <form id="delete-form{{ $reply->id }}"
                                                        action="{{ route('deletereply', ['id' => $reply->id]) }}"
                                                        method="POST"
                                                        style="display: none">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        </form>
                                                    </a>
                                                <a  class="waves-effect waves-light btn button-xs-neutral right">Edit</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if($topic->replies->count() == 0 )
                        <h5 class="nothing-display-text">No Replies yet</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
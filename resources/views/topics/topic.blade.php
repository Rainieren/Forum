@extends('layouts.default')

@section('content')
<div class="container first-container">
    <div class="row first-row">
        <div class="col s12">
            <div class="card">
                <div class="card-content clearfix">
                    <span class="card-title">{{ $theme->theme_title }} - {{ $topic->topic_title }}&nbsp;
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
                                        <div class="col s3"><a href="{{ route('showprofile', ['username' => $topic->user->username ]) }}"><img src="{{ asset('uploads/avatars/' . $topic->user->avatar) }}" class="circle responsive-img" style=""></a></div>
                                        <div class="col s9">
                                            <p class="user-name">{{ $topic->user->username }}</p>
                                        </div>
                                    </div>
                                    <p>Role: {{ $topic->user->role->role_name }}</p>
                                    <p>Since: {{ $topic->user->created_at }}</p>
                                    <p class="post-timestamp">Posted on: {{$topic->created_at}}</p>
                                </div>
                            </div>
                            <div class="col s9">
                                <div class="row last-row">
                                    <div class="col s12">
                                        <h6 class="title">{{ $topic->topic_title }}</h6>
                                        <p>{!! $topic->topic_text !!}</p>
                                    </div>
                                </div>
                                <div class="row last-row block-timestamp">
                                    <div class="col s6">
                                        <p class="post-timestamp">Last changed: {{ $topic->updated_at }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::guest())

            @else
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Leave a Reply</span>
                    <div class="row">
                        <form method="POST" action="{{ route('createreply') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                            <div class="form-group col s12 input-field">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="message-body textarea1" class="form-control materialize-textarea" name="reply_text" placeholder="Type your reply"></textarea>
                            </div>
                            <div class="col s12">
                                <button class="btn right blue-grey darken-4" type="submit"><i class="material-icons right">reply</i>Reply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            <div class="card">
                <div class="card-content">
                    @foreach($topic->replies->sortByDesc('created_at') as $reply)
                    <div class="collection">
                            <div class="collection-item row">
                                <div class="col s3" style="padding-bottom: 20px;">
                                    <div href="" class="avatar collection-link">
                                        <div class="row">
                                            <div class="col s3"><a href="{{ route('showprofile', ['username' => $reply->user->username ]) }}"><img src="{{ asset('uploads/avatars/' . $reply->user->avatar) }}" alt="" class="circle" style="width: 50px;"></a></div>
                                            <div class="col s9">
                                                <p class="user-name">{{ $reply->user->username }}</p>
                                            </div>
                                        </div>
                                        <p>Role: {{ $reply->user->role->role_name }}</p>
                                        <p>Since: {{ $reply->user->created_at }}</p>
                                        <p class="post-timestamp">Posted on: {{ $reply->created_at }}</p>
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
                                            <p class="post-timestamp">Last changed: {{ $reply->updated_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if($topic->replies->count() == 0 )
                            <h5 style="font-style: italic; color: grey" >No Replies yet</h5>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@extends('layouts.default')

@section('content')
    <div class="container">

        <div id="profile-page" class="section">
            <!-- profile-page-header -->
            <div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="{{ asset('uploads/banners/' . $user->banner) }}" alt="{{ $user->username }}'s backgroundbanner" style="">
                </div>
                <figure class="card-profile-image">
                    <img src="{{ asset('uploads/avatars/' . $user->avatar) }}" alt="profile image" class="circle z-depth-2 responsive-img activator profielpaginafoto">
                </figure>
                <div class="card-content">
                    <div class="row">
                        <div class="col s2 offset-s2">
                            <h4 class="card-title grey-text text-darken-4">{{ $user->username }}</h4>
                            <p class="medium-small grey-text">{{ $user->role->role_name }}</p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4">Topics posted</h4>
                            <p class="medium-small grey-text">{{ $user->topics->count() }}</p>
                        </div>
                        <div class="col s2 center-align">
                            <h4 class="card-title grey-text text-darken-4">Replies posted</h4>
                            <p class="medium-small grey-text">{{ $user->replies->count() }}</p>
                        </div>
                        <div class="col s3 center-align">
                            <h4 class="card-title grey-text text-darken-4">Member since: </h4>
                            <p class="medium-small grey-text">{{ $user->created_at}}</p>
                        </div>
                        @if(Auth::user()->username == $user->username)
                        <div class="col s1 right-align">
                            <a href="{{ route('editprofile', ['username' => Auth::user()->username])}}" class="btn-floating activator waves-effect waves-light red darken-12 right" style="bottom: 45px;">
                                <i class="material-icons">mode_edit</i>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
            <!--/ profile-page-header -->
        </div>

            <div class="row">
                <div class="col l5 m5 s5">
                    <div class="card blue darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">About me</span>
                            <p>{{ $user->user_about }}</p>
                        </div>
                    </div>
                </div>


                @if($user->topics->count() == 0 )
                    <div class="col l7 m7 s7">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Last Topic</span>
                                <h5 style="font-style: italic; color: grey" >No topics yet</h5>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col l7 m7 s7">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Last Topic</span>
                                <h6>{{ $user->topics->sortBydesc('id')->first()->topic_title }}</h6>
                                <p>{!!  str_limit($user->topics->sortBydesc('id')->first()->topic_text, $limit = 255, $end = '...') !!}</p>
                            </div>
                            <div class="card-action right-align">
                                <a href="" class="blue-grey-text text-darken-4">Go to topic</a>
                            </div>
                        </div>
                    </div>
                @endif


                @if($user->replies->count() == 0)
                    <div class="col l6 m6 s6">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Last Reply</span>
                                <h5 style="font-style: italic; color: grey" >No replies yet</h5>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col l7 m7 s7 right">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Last Reply</span>
                                <p>{{ str_limit($user->replies->sortBydesc('id')->first()->reply_text, $limit = 255, $end = '...') }}</p>
                            </div>
                            <div class="card-action right-align">
                                <a href="" class="blue-grey-text text-darken-4">Go to reply</a>
                            </div>
                        </div>
                    </div>
                @endif



            </div>
        </div>

@stop
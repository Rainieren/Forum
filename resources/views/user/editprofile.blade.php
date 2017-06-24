@extends('layouts.default')

@section('content')
    <div class="container main-content">
        <div class="row first-row">
            <div class="col l12 m12 s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Edit your profile</span>
                        <div class="row">
                            <div class="col l12 m12 s12">
                                <div class="card">
                                    <div class="card-content">
                                        <span class="card-title">Edit about me!</span>
                                        <form enctype="multipart/form-data" action="{{ route('updateprofile', ['username' => Auth::user()->username]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            <div class="row">
                                                <div class="col s12 form-group">
                                                    <label for="message-body textarea1">About me</label>
                                                    <textarea id="message-body textarea1" class="form-control materialize-textarea" name="user_about" placeholder="Type something about yourself" data-length="255">{{ $user->user_about }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <button type="submit" class="btn btn-default pull-right">Change</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                            <span class="card-title">Change your photo's</span>
                            <h6>Change your profile picture</h6>
                            <div class="row">
                                <div class="col l12 m12 s12">
                                    <div class="card">
                                        <div class="card-content">
                                            <form enctype="multipart/form-data" action="{{ route('updateavatar', ['username' => Auth::user()->username]) }}" method="POST">
                                                <input type="file" name="avatar">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="pull-right btn btn-primary" value="Change profile">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6>Change your banner</h6>

                            <div class="row">
                                <div class="col l12 m12 s12">
                                    <div class="card">
                                        <div class="card-content">
                                            <form enctype="multipart/form-data" action="{{ route('updatebanner', ['username' => Auth::user()->username]) }}" method="POST">
                                                <input type="file" name="banner">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="pull-right btn btn-primary" value="Change banner">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

{{--<form enctype="multipart/form-data" action="profile" method="POST">--}}
    {{--<input type="file" name="avatar">--}}
    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
    {{--<input type="submit" class="pull-right btn btn-primary" value="Change profile">--}}
{{--</form>--}}

{{--<form enctype="multipart/form-data" action="profile" method="POST">--}}
    {{--<input type="file" name="banner">--}}
    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
    {{--<input type="submit" class="pull-right btn btn-primary" value="Change banner">--}}
{{--</form>--}}


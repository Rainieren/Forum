@extends('layouts.default')

@section('content')
    <div class="container main-content">
        <div class="row first-row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content clearfix">
                        <span class="card-title">New theme</span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <form method="POST" action="">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="row">
                                <div class="input-field col s6 has-error form-group">
                                    <input id="title" class="form-control" type="text" name="theme_title" placeholder="Title of theme" data-length="55">
                                    <label for="title">Title of theme</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 form-group">
                                    <textarea id="message-body textarea1" class="form-control materialize-textarea" name="theme_description" placeholder="Theme description" data-length="255"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s6">
                                    {{--<span class="card-title">Upload theme picture</span>--}}
                                    {{--<div class="file-field input-field form-group">--}}
                                        {{--<div class="btn cyan darken-1 disabled"><span>Theme picture</span>--}}
                                            {{--<input id="attachement" type="file" name="attachment">--}}
                                        {{--</div>--}}
                                        {{--<div class="file-path-wrapper form-group">--}}
                                            {{--<input type="text" placeholder="Doesn't work lolololol" class="file-path validate form-control">--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                                <div class="col s6">
                                    {{--<span class="card-title">Open - Close theme</span>--}}
                                    {{--<form action="#">--}}
                                        {{--<p>--}}
                                            {{--<input name="group1" type="radio" id="test1" class="green"/>--}}
                                            {{--<label for="test1">Open</label>--}}
                                        {{--</p>--}}
                                        {{--<p>--}}
                                            {{--<input name="group1" type="radio" id="test2" class="red"/>--}}
                                            {{--<label for="test2">Close</label>--}}
                                        {{--</p>--}}
                                    {{--</form>--}}
                                </div>
                            <div class="row">
                                <div class="col s12">
                                    <button class="btn right blue-grey darken-4" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{--<script type="text/javascript" src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('js/editor.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('js/blog.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
@endsection
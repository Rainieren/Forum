@extends('layouts.default')

@section('content')
    <div class="container main-content">
        <div class="row first-row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content clearfix"><span class="card-title">New topic</span><span class="right">For theme: {{ $theme->theme_title }}</span></div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <form method="POST" action="{{ route('createtopic', ['theme_id' => $theme->id ]) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                            <div class="row">
                                <div class="input-field col s6 has-error form-group">
                                    <input id="title" class="form-control" type="text" name="topic_title" placeholder="Title of topic">
                                    <label for="title" class="active">Title of topic</label><span>Titel is mandatory!</span>
                                </div>
                                {{--<div class="file-field input-field col s6 form-group">--}}
                                    {{--<div class="btn cyan darken-1 disabled"><span>Attachment</span>--}}
                                        {{--<input id="attachement" type="file" name="attachment" class="disabled">--}}
                                    {{--</div>--}}
                                    {{--<div class="file-path-wrapper form-group">--}}
                                        {{--<input type="text" placeholder="geen" class="file-path validate form-control">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                            <div class="row">
                                <div class="col s12 form-group">
                                    <textarea id="message-body" class="form-control" name="topic_text"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    Hier komen opties om het onderwerp te sluiten of
                                    aan te geven dat het opgelost is, alleen bij bewerken
                                </div>
                                <div class="col s6">
                                    <button class="btn right cyan darken-1" type="submit">Save</button>
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
    <script type="text/javascript" src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/editor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/blog.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
@stop
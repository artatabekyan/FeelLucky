@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Feel Lucky</div>

                    <div class="card-body">
                        <h2>your Unique Url is <b>{{$slug}}</b></h2>

                        <input type="hidden" id="appID" value="{{$slug}}">
                        <button class="btn btn-secondary" onclick="copyURL()">Copy URL</button>
                        <a href="{{ route('generateNewUrl' , ['id' => $userSlug->id]) }}" class="btn btn-secondary">Generate new one</a>
                        <a href="{{ route('deactivateUrl' , ['id' => $userSlug->id]) }}" class="btn btn-secondary">Deactivate URL</a>
                        <br>
                        <br>
                        <a href="{{ route('feelLucky' , ['id' => $userSlug->id]) }}" class="btn btn-secondary">Im feeling lucky</a>
                        <a href="{{ route('history' , ['id' => $userSlug->id]) }}" class="btn btn-secondary">History</a>

                        @if(isset($randomNumber))
                            <h3>Your number is <b>{{$randomNumber}}</b> and you <b>{{$result}}</b> </h3>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

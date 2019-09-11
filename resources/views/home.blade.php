@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Hi! Welcom to FeelLucy international funzone.</h2>
                    <br>
                    <h3>Here are your <a href="{{ route('pageA') }}">UNUQUE URL!</a></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

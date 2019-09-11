@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Feel Lucky</div>

                    <div class="card-body">
                        <h2>Your Lucky History (last 3 one)</h2>
                        @if(count($history) == 0)
                            <h3>You haven't tried your chance </h3>
                        @else
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Result</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($history as $key=>$value)
                                    <tr>
                                        <th scope="row">#{{ $key + 1 }}</th>
                                        <td>{{$value->result}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

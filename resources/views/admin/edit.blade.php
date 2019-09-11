@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Feel Lucky</div>

                    <div class="card-body">
                        <form id="add-user-form" method="POST" action="{{ route('admin.postUpdate') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="form-group card-body card-block">
                                <div class="form-group">
                                    <label class="form-control-label">UserName</label>
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                                           value="{{$user->username}}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group card-body card-block">
                                <div class="form-group">
                                    <label class="form-control-label">Phone</label>
                                    <input id="phone" type="text"
                                           class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                           value="{{$user->phone}}" required autofocus>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Password: If you don't want to change the password <b>don't
                                        fill this</b> and <b>next</b> fields</label>
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">User role</label>
                                <select id="select_role" class="form-control" name="role">
                                    <option style="color: blue" value="admin" {{ $user->role == 'admin' ? 'selected' : ''  }}>Admin</option>
                                    <option style="color: green" value="user" {{ $user->role == 'user' ? 'selected' : ''  }}>User</option>
                                </select>
                            </div>
                            <div class="card-footer">

                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Add
                                </button>
                                <a href="{{ URL::previous() }}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Cansel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

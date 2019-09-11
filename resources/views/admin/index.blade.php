@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Feel Lucky</div>

                    <div class="card-body">
                        <a href="{{ route('admin.getCreate') }}" class="add-btn btn btn-warning btn-sm">Add user</a>
                        <br>
                        <br>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Role</th>
                                <th scope="col">Registered date </th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $value)
                                <tr class="main-category" data-id="{{ $value->id }}">
                                    <th scope="row">#{{ $key + 1 }}</th>
                                    <td>{{ $value->username }}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td>{{ $value->role }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.getUpdate' , ['id' => $value->id]) }}"
                                           class="btn btn-primary btn-sm">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_modal_{{ $value->id }}">
                                            Delete
                                        </button>

                                        <div class="modal fade" id="delete_modal_{{ $value->id }}"  tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="smallmodalLabel">Delete user?!</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Are you sure, you want to delete <b>{{ $value->name }}</b> form users???
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                                        <a href="{{ route('admin.getDelete' , ['id' => $value->id]) }}" class="btn btn-danger btn-sm">Confirm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

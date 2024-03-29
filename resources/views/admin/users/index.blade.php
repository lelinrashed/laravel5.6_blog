@extends('layouts.app')


@section('content')

    <div class="card">
        <h2 class="card-title text-center pt-3">Users</h2>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Permissions</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @if($users->count() > 0)
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img height="60px" width="60px" style="border-radius: 50%" src="{{ asset($user->profile->avatar) }}" alt="">

                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                @if($user->admin)
                                    <a href="{{ route('user.not-admin', ['id'=> $user->id]) }}" class="btn btn-sm btn-danger">Remove Permission</a>
                                @else
                                    <a href="{{ route('user.admin', ['id'=> $user->id]) }}" class="btn btn-sm btn-success">Make Admin</a>
                                @endif
                            </td>
                            <td>
                                @if(Auth::id() !== $user->id)
                                    <a href="{{ route('user.delete', ['id'=> $user->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No user available !</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@stop
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Users</div>
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                     <tbody>
                        @foreach($users as $user)
                        @if($user->deleted==1)
                        @else
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->type}}</td>
                            <td>
                                <a href="{{route('admin.users.edit',$user->id)}}" class="float-left">
                                    <button type="button" class="btn btn-primary btm-sm">Edit</button>
                                </a>
                                <a style="visibility: hidden"class="float-left"><-</a>
                                <a class="float-left">
                                <button type="button" class="btn btn-danger ttm-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$user->id}}">
                                    Delete
                                </button>
                                </a>
                                {{-- Delete - Modal --}}
                                <div class="modal fade" id="modal-delete-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <form action="{{ route('admin.softD', $user->id)}}" method="POST" class="float-left">
                                     @csrf
                                     @method('POST')
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Delete {{$user->name." ".$user->surname}}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" value="delete" class="btn btn-danger btm-sm"/>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                                </div>
                                {{-- End Delete Modal --}}
                                <a style="visibility: hidden"class="float-left"><-</a>
                                <a class="float-left">
                                 @if($user->actived=='0')
                                    <form action="{{ route('admin.activate', $user->id)}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-primary" type="submit">Activate User</button>
                                    </form>
                                         @else
                                    <form action="{{ route('admin.disable', $user->id)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Disable User</button>
                                    </form>
                                         @endif
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                     </tbody>
                 </table>
                 {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


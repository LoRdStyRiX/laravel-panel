@extends('layouts.template')

@section('title-page')
@ {{$user->name}}'s details
@endsection



@section('content')


@if($errors->any())
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif


{{-- shop owner's detail --}}

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="div">
                    <h5>User's Detail</h5>
                </div>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <th>Shop Owner</th>
                            <td> : </td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th>E-mail</th>
                            <td> : </td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td> : </td>
                            <td>{{$user->password}}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <div class="card col-md-12 col-sm-12">
            <div class="card-header border-transparent">
                <h3 class="card-title">Edit Dat</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <form action="{{route('user.update' , $user->id)}}" method="post">
                    @csrf
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label>Seller Name</label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}"required placeholder="user's name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" required placeholder="user's email">
                        <input type="text" name="level" hidden value="seller">

                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password"
                            placeholder="user's password, minimum 8 char" autocomplete="false">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default" data-toggle="modal">
                            submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

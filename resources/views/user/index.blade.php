@extends('layouts.template')



@section('title-page')
User Data Page

@endsection

@section('content')
<div class="card">


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

    <div class="card-header">
        <div class="row">
            <div class="col-md-8">
                <h3 class="card-title">Shop Owner Data</h3>


            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                    Add Data
                </button>
            </div>
        </div>

    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Option(s)</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="#" class="btn btn-outline-info" data-toggle="dropdown"> Option </a>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="{{route('user.show', $item->id)}}">Detail</a>
                                    <form action="{{route('user.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Delete data?')">Delete</button>
                                  </form>
                                </div>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Option(s)</th>

                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User Data (Seller)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('user.store')}}" method="post">
                @csrf
                <div class="modal-body">


                    <div class="form-group">
                        <label>Seller Name</label>
                        <input type="text" class="form-control" name="name" required placeholder="user's name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="user's email">
                        <input type="text" name="level" hidden value="seller">

                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required
                            placeholder="user's password, minimum 8 char">
                    </div>

                    {{-- <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" class="form-control" name="password-confirmation" required placeholder="confirm password">
            </div> --}}


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

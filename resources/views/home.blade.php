@extends('layouts.template')

@section('content')


@if(Auth::user()->level == 'admin')
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
@else
{{-- if user's profile had not been completed --}}
@if(!$data_profile)
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i>Hello, {{Auth::user()->name}}</h5>
    <p>Profile had not been completed, please complete your profile <a href="#" data-toggle="modal" data-target="#modal-profile-xl">
      here!</a> 
    </p>
    <ul>
      {{-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-profile-xl">
        Add Data
    </button> --}}
    </ul>
</div>

{{-- modal profile --}}

@if($errors->any())
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i> Sorry, Error</h5>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="modal fade" id="modal-profile-xl">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Add User Data (Seller)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">

                  <div class="form-group">
                    <label>Profile picture</label>
                    <input type="file" class="form-control" name="profile_photo" required>
                </div>

                  <div class="form-group">
                      <label>Phone Number</label>
                      <input type="number" class="form-control" name="phone_number" required placeholder="phone number ex. +1234 5678 90">
                  </div>
                  <div class="form-group">
                      <label>Birthdate</label>
                      <input type="date" class="form-control" name="birthdate" required placeholder="date of birth ex. 9/1/01">
                      <input type="number" name="id_user" hidden value="{{Auth::user()->id}}">

                  </div>
                  <div class="form-group">
                      <label>gender</label>
                      <select name="gender" class="form_control" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                  </div>

                  <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" cols="10" rows="3" required></textarea>
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
@endif
@endif



@endsection

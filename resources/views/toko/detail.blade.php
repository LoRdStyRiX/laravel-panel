@extends('layouts.template')

@section('page-title')
Detail {{$data->toko_name}}
@endsection

@section('content')

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

{{-- Area Detai Pemilik Toko --}}
<div class="row">
    <div class="col-md-12 col-sm-12">
        {{-- show data card --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h5>Detail Toko</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama Toko</th>
                            <td width="5%"> : </td>
                            <td width="50%">{{$data->toko_name}}</td>
                            <td rowspan="7">
                                <img src="{{asset('storage/image/toko/'.$data->toko_icon)}}" alt="image">
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Pemilik</th>
                            <td width="5%"> : </td>
                            <td width="50%">{{$data->user->name}}</td>
                        </tr>
                        <tr>
                            <th>Status Toko</th>
                            <td width="5%"> : </td>
                            <td width="50%">
                                @if ($data->status_active == TRUE)
                                    <span class="badge badge-success">Toko Aktif</span>
                                @else
                                    <span class="badge badge-danger">Toko Non-Aktif</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td width="5%"> : </td>
                            <td width="50%">{{$data->toko_categorie}}</td>
                        </tr>
                        <tr>
                            <th>hari Buka</th>
                            <td width="5%"> : </td>
                            <td width="50%">{{$data->open_date}}</td>
                        </tr>
                        <tr>
                            <th>Jam Operasi</th>
                            <td width="5%"> : </td>
                            <td width="50%">{{$data->open}} - {{$data->close}}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi Toko</th>
                            <td width="5%"> : </td>
                            <td width="50%">{!! $data->toko_desc !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        {{-- card-edit --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('seller.update', $data->id)}}" method="post">

                    @csrf
                    {{method_field('PUT')}}

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Toko</label>
                            <input type="text" name="toko_name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Pemilik</label>
                            <select name="id_user" class="form-control">
                                <option value="">Pilih nama pemilik</option>
                                @foreach($data as $item)
                                    {{-- @if($item->level == 'seller')
                                        <option value="{{$data->user->name}}">
                                    @endif --}}
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Toko</label>
                                <textarea name="desc_toko" id="summernote">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Kategori Toko</label>
                            <select name="toko_categorie" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <option value="electronics">Elektronik</option>
                                <option value="automotive">Otomotif</option>
                                <option value="fashion">Fashion</option>
                                <option value="medicine">Medicine</option>
                                <option value="culinary">Culinary</option>
                                <option value="furniture">Furniture</option>
                                <option value="accesories">Accesory</option>
    
    
    
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hari Buka : </label>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="open_date[]" id="senin"
                                    value="senin">
                                <label for="senin" class="custom-control-label">Senin</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="open_date[]" id="selasa"
                                    value="selasa">
                                <label for="selasa" class="custom-control-label">Selasa</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="open_date[]" id="rabu"
                                    value="rabu">
                                <label for="rabu" class="custom-control-label">Rabu</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="open_date[]" id="kamis"
                                    value="kamis">
                                <label for="kamis" class="custom-control-label">Kamis</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="open_date[]" id="jumat"
                                    value="jumat">
                                <label for="jumat" class="custom-control-label">Jumat</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="open_date[]" id="sabtu"
                                    value="sabtu">
                                <label for="sabtu" class="custom-control-label">Sabtu</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="open_date[]" id="minggu"
                                    value="minggu">
                                <label for="minggu" class="custom-control-label">Minggu</label>
                            </div>
                        </div>
    
                        <div class="row justify-content-arround">
                            <div class="form-group col-md-6">
                                <label>Jam Buka</label>
                                <input type="time" class="form-control" name="open">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Jam Tutup</label>
                                <input type="time" class="form-control" name="close">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <select name="status_active" class="form-control" required>
                                <option value="0">Non-Aktif</option>
                                <option value="1">Aktif</option>
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label for="">Icon Foto</label>
                            <input type="file" name="toko_icon" class="form-control">
                        </div>
    
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
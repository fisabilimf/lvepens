@extends('layouts.app')

@section('content')
<div class="py-5"></div>
    @section('cscript')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md">
                        <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
                            @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <div class="card">
                                        <div class="card-header text-center">Profil User</div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                @if (empty(Auth::user()->profile->photo))
                                                    <img class="rounded mx-auto d-block" src="{{asset('avatar/default.png')}}" alt="" width="256px" height="256px">
                                                @else
                                                    <img class="rounded mx-auto d-block" src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->photo}}" alt="" width="256px" height="256px">
                                                @endif                                                   
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#logo">
                                                    Upload Foto
                                                </button>
                                            </div>                       
                                            <div class="form-group">
                                                <label for="">Nama Lengkap</label>
                                                <input type="text" name="name" id="" class="form-control" value="{{Auth::user()->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin</label>
                                                <select name="gender" id="" class="form-control">
                                                    @if (Auth::user()->profile->gender=='male')
                                                        <option value="male">Laki-Laki</option>
                                                    @elseif(Auth::user()->profile->gender=='female')
                                                        <option value="female">Perempuan</option>
                                                    @else
                                                        <option value="">Jenis Kelamin</option>
                                                    @endif
                                                    <option value="">Jenis Kelamin</option>
                                                    <option value="male">Laki-Laki</option>
                                                    <option value="female">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tanggal Lahir</label>
                                                <input type="date" name="dob" id="" class="form-control" value="{{Auth::user()->profile->dob}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">E-mail</label>
                                                <input type="text" name="email" id="" class="form-control" value="{{Auth::user()->email}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nomor Telepon</label>
                                                <input type="text" name="phone_number" id="" class="form-control" value="{{Auth::user()->profile->phone_number}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat</label>
                                                <input type="text" name="address" id="" class="form-control" value="{{Auth::user()->profile->address}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Bergabung Sejak</label>
                                                <input type="text" name="address" id="" class="form-control" value="{{date('d F Y', strtotime(Auth::user()->profile->created_at))}}" disabled>
                                            </div>
                                            <div class="py-2"></div>
                                            <div class="form-group text-center">
                                                <button class="btn btn-outline-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <div class="py-3"></div>
                        <div class="row">
                            <div class="modal fade" id="logo" tabindex="-1" aria-labelledby="logoLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="{{route('profile.avatar')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="logoLabel">Update Foto</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="{{asset('uploads/avatar')}}/{{Auth::user()->profile->photo}}" target="_blank">Preview Gambar</a>
                                                <div class="custom-file">
                                                    <input type="file" name="photo" id="customFile1" class="custom-file-input">
                                                    <label class="custom-file-label" for="customFile1">Pilih File</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="py-3"></div>
                </div>
            </div>
        </div>
    @endsection

@endsection

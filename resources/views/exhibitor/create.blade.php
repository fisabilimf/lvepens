@extends('layouts.app')

@section('content')
<div class="py-5"></div>
    @section('cscript')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md">
                        <form action="{{route('exhibitor.store')}}" method="POST" enctype="multipart/form-data">
                            @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <div class="card">
                                        <div class="card-header text-center">Profil Organisasi</div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                @if (empty(Auth::user()->exhibitor->logo))
                                                    <img class="rounded mx-auto d-block" src="{{asset('avatar')}}/default.png" alt="" width="256px" height="256px">
                                                @else
                                                    <img class="rounded mx-auto d-block" src="{{asset('avatar')}}/{{Auth::user()->exhibitor->logo}}" alt="" width="256px" height="256px">
                                                @endif                                                   
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#logo">
                                                    Upload Logo
                                                </button>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#coverphoto">
                                                    Upload Cover Photo
                                                </button>
                                            </div>                       
                                            <div class="form-group">
                                                <label for="">Nama Organisasi</label>
                                                <input type="text" name="ename" id="" class="form-control" value="{{Auth::user()->exhibitor->ename}}">
                                            </div>
                                            @if ($errors->has('ename'))
                                                <div class='error' style="color: red">
                                                {{$errors -> first('ename')}}
                                                </div>                            
                                            @endif
                                            <div class="form-group">
                                                <label for="">Website URL</label>
                                                <input type="text" name="website_url" id="" class="form-control" value="{{Auth::user()->exhibitor->website_url}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat Kantor</label>
                                                <input type="text" name="address" id="" class="form-control" value="{{Auth::user()->exhibitor->address}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Deskripsi Organisasi</label>
                                                <input name="description" id="exhbdesc" cols="30" rows="4" class="form-control" type="hidden" value="{{Auth::user()->exhibitor->description}}">
                                                <trix-editor input="exhbdesc" ></trix-editor>
                                            </div>

                                            <div class="py-2"></div>
                                            <div class="form-group">
                                                <label for="">Facebook</label>
                                                <input type="text" name="facebook" id="" class="form-control" value="{{Auth::user()->exhibitor->facebook}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Instagram</label>
                                                <input type="text" name="instagram" id="" class="form-control" value="{{Auth::user()->exhibitor->instagram}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Line</label>
                                                <input type="text" name="line" id="" class="form-control" value="{{Auth::user()->exhibitor->line}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Telegram</label>
                                                <input type="text" name="telegram" id="" class="form-control" value="{{Auth::user()->exhibitor->telegram}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Whatsapp</label>
                                                <input type="text" name="whatsapp" id="" class="form-control" value="{{Auth::user()->exhibitor->whatsapp}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Youtube</label>
                                                <input type="text" name="youtube" id="" class="form-control" value="{{Auth::user()->exhibitor->youtube}}">
                                            </div>
                                            <div class="py-2"></div>
                                            <div class="form-group text-center">
                                                <button class="btn btn-outline-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header text-center">Contact Person</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="cp1" id="" class="form-control" value="{{Auth::user()->exhibitor->ct_person1}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kontak (Nomor/Link)</label>
                                                <input type="text" name="cn1" id="" class="form-control" value="{{Auth::user()->exhibitor->ct_number1}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="cp2" id="" class="form-control" value="{{Auth::user()->exhibitor->ct_person2}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kontak (Nomor/Link)</label>
                                                <input type="text" name="cn2" id="" class="form-control" value="{{Auth::user()->exhibitor->ct_number2}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="cp3" id="" class="form-control" value="{{Auth::user()->exhibitor->ct_person3}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kontak (Nomor/Link)</label>
                                                <input type="text" name="cn3" id="" class="form-control" value="{{Auth::user()->exhibitor->ct_number3}}">
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
                                    <form action="{{route('exhibitor.logo')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="logoLabel">Update Logo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="{{asset('avatar')}}/{{Auth::user()->exhibitor->logo}}" target="_blank">Preview Gambar</a>
                                                <div class="custom-file">
                                                    <input type="file" name="logo" id="customFile1" class="custom-file-input">
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
                            <div class="modal fade" id="coverphoto" tabindex="-1" aria-labelledby="coverphotoLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="{{route('exhibitor.coverphoto')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="coverphotoLabel">Update Cover Photo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="{{asset('cover')}}/{{Auth::user()->exhibitor->coverphoto}}" target="_blank">Preview Gambar</a>
                                                <div class="custom-file">
                                                    <input type="file" name="coverphoto" id="customFile1" class="custom-file-input">
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
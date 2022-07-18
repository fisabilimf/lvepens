@extends('layouts.app')

@section('content')
    @section('cscript')
        <div class="container">
            <div class="py-5"></div>
            <div class="row justify-content-center">
                <div class="col-md">
                    <form action="{{route('exhibitions.store')}}" method="POST">
                        @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-header">Exhibition Post</div>
                
                                    <div class="card-body">
                
                                        <div class="form-group">
                                            <label for="">Nama/Judul Kegiatan</label>
                                            <input type="text" name="name" id="" class="form-control">
                                        </div>
                                        @if ($errors->has('name'))
                                            <div class='error' style="color: red">
                                            {{$errors -> first('name')}}
                                            </div>                            
                                        @endif
                                        <div class="form-group">
                                            <label for="">Kategori</label>
                                            <select name="category" id="" class="form-control">
                                                @foreach (App\Category::all() as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tipe Kegiatan</label>
                                            <select name="type" id="" class="form-control">
                                                @foreach (App\Type::all() as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kata Kunci</label>
                                            <input type="text" name="tags" id="" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Lokasi Kegiatan (Alamat atau Link)</label>
                                            <input type="text" name="location" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Mulai</label>
                                            <input type="date" name="start_date" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Selesai</label>
                                            <input type="date" name="end_date" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Deskripsi Kegiatan</label>
                                            <input name="description" id="exhbdesc" cols="30" rows="4" class="form-control" type="hidden">
                                            <trix-editor input="exhbdesc" ></trix-editor>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header">Contact Person</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" name="cp1" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kontak (Nomor/Link)</label>
                                            <input type="text" name="cn1" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" name="cp2" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kontak (Nomor/Link)</label>
                                            <input type="text" name="cn2" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" name="cp3" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kontak (Nomor/Link)</label>
                                            <input type="text" name="cn3" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header text-center">Post Kegiatan</div>
                                    <div class="card-body text-center">
                                        <div class="form-group">
                                            <button class="btn btn-outline-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    @endsection
@endsection

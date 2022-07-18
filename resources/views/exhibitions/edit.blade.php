@extends('layouts.app')

@section('content')
<div class="py-5"></div>
    @section('cscript')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md">
                    @foreach($exhibition as $exb)
                        <form action="{{route('exhibitions.update', [$exb->id, $exb->slug])}}" method="POST" enctype="multipart/form-data">
                            @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <div class="card">
                                        <div class="card-header text-center">Exhibition Post</div>
                    
                                        <div class="card-body">
                    
                                            <div class="form-group">
                                                <label for="">Nama/Judul Kegiatan</label>
                                                <input type="text" name="name" id="" class="form-control" value="{{$exb->name}}">
                                            </div>
                                            @if ($errors->has('name'))
                                                <div class='error' style="color: red">
                                                {{$errors -> first('name')}}
                                                </div>                            
                                            @endif
                                            <div class="form-group">
                                                <label for="">Kategori</label>
                                                <select name="category" id="" class="form-control">
                                                    <option value="{{$exb->category_id}}">Kategori ke-{{$exb->category_id}}</option>
                                                    @foreach (App\Category::all() as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tipe Kegiatan</label>
                                                <select name="type" id="" class="form-control">
                                                    <option value="{{$exb->type_id}}">Tipe kegiatan ke-{{$exb->type_id}}</option>
                                                    @foreach (App\Type::all() as $type)
                                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kata Kunci</label>
                                                <input type="text" name="tags" id="" class="form-control" value="{{$exb->tags}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Lokasi Kegiatan (Alamat atau Link)</label>
                                                <input type="text" name="location" id="" class="form-control" value="{{$exb->location}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tanggal Mulai</label>
                                                <input type="date" name="start_date" id="" class="form-control" value="{{$exb->start_date}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tanggal Selesai</label>
                                                <input type="date" name="end_date" id="" class="form-control" value="{{$exb->end_date}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Deskripsi Kegiatan</label>
                                                <input name="description" id="exhbdesc" cols="30" rows="4" class="form-control" type="hidden" value="{{$exb->description}}">
                                                <trix-editor input="exhbdesc" ></trix-editor>
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
                                                <input type="text" name="cp1" id="" class="form-control" value="{{$exb->ct_person1}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kontak (Nomor/Link)</label>
                                                <input type="text" name="cn1" id="" class="form-control" value="{{$exb->ct_number1}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="cp2" id="" class="form-control" value="{{$exb->ct_person2}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kontak (Nomor/Link)</label>
                                                <input type="text" name="cn2" id="" class="form-control" value="{{$exb->ct_number2}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="cp3" id="" class="form-control" value="{{$exb->ct_person3}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kontak (Nomor/Link)</label>
                                                <input type="text" name="cn3" id="" class="form-control" value="{{$exb->ct_number3}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2"></div>
                                    <div class="card">
                                        <div class="card-header text-center">Simpan Kegiatan</div>
                                        <div class="card-body text-center">
                                            <div class="form-group">
                                                <button class="btn btn-outline-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                    <div class="py-3"></div>
                        <div class="row">
                            <div class="col">
                                @foreach($exhibition as $imgdesc)
                                    <form action="{{route('exhibitions.imgdesc', [$imgdesc->id, $imgdesc->slug])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card">
                                            <div class="card-header text-center">Deskripsi Galeri</div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="">Deskripsi Gambar 1</label>
                                                    <input type="text" name="imgdesc1" id="" class="form-control" value="{{$imgdesc->image_desc1}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Deskripsi Gambar 2</label>
                                                    <input type="text" name="imgdesc2" id="" class="form-control" value="{{$imgdesc->image_desc2}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Deskripsi Gambar 3</label>
                                                    <input type="text" name="imgdesc3" id="" class="form-control" value="{{$imgdesc->image_desc3}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Deskripsi Gambar 4</label>
                                                    <input type="text" name="imgdesc4" id="" class="form-control" value="{{$imgdesc->image_desc4}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Deskripsi Gambar 5</label>
                                                    <input type="text" name="imgdesc5" id="" class="form-control" value="{{$imgdesc->image_desc5}}">
                                                </div>
                                                <div class="py-2"></div>
                                                <div class="form-group text-center">
                                                    <button class="btn btn-outline-success">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-header text-center">Galeri</div>
                                    <div class="py-2"></div>
                                    <div class="card-body">
                                        @foreach($exhibition as $img)
                                            <form action="{{route('exhibitions.imagepost', [$img->id, $img->slug])}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                    <a href="{{asset('uploads/images')}}/{{$img->image1}}" target="_blank">Preview Gambar 1</a>
                                                    <div class="custom-file">
                                                        <input type="file" name="image1" id="customFile1" class="custom-file-input">
                                                        <label class="custom-file-label" for="customFile1">Pilih File</label>
                                                    </div>
                                                    <div class="py-2"></div>
                                                    <a href="{{asset('uploads/images')}}/{{$img->image2}}" target="_blank">Preview Gambar 2</a>
                                                    <div class="custom-file">
                                                        <input type="file" name="image2" id="customFile2" class="custom-file-input">
                                                        <label class="custom-file-label" for="customFile2">Pilih File</label>
                                                    </div>
                                                    <div class="py-2"></div>
                                                    <a href="{{asset('uploads/images')}}/{{$img->image3}}" target="_blank">Preview Gambar 3</a>
                                                    <div class="custom-file">
                                                        <input type="file" name="image3" id="customFile3" class="custom-file-input">
                                                        <label class="custom-file-label" for="customFile3">Pilih File</label>
                                                    </div>
                                                    <div class="py-2"></div>
                                                    <a href="{{asset('uploads/images')}}/{{$img->image4}}" target="_blank">Preview Gambar 4</a>
                                                    <div class="custom-file">
                                                        <input type="file" name="image4" id="customFile4" class="custom-file-input">
                                                        <label class="custom-file-label" for="customFile4">Pilih File</label>
                                                    </div>
                                                    <div class="py-2"></div>
                                                    <a href="{{asset('uploads/images')}}/{{$img->image5}}" target="_blank">Preview Gambar 5</a>
                                                    <div class="custom-file">
                                                        <input type="file" name="image5" id="customFile5" class="custom-file-input">
                                                        <label class="custom-file-label" for="customFile5">Pilih File</label>
                                                    </div>
                                                    <div class="py-2"></div>
                                                    <div class="form-group text-center">
                                                        <button class="btn btn-outline-success">Submit</button>
                                                    </div>
                                            </form>
                                        @endforeach
                                                                                
                                        
                                        <div class="py-1"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-3"></div>
                        <div class="row">
                            <div class="col-6">
                                @foreach($exhibition as $arcdesc)
                                    <form action="{{route('exhibitions.arcdesc', [$arcdesc->id, $arcdesc->slug])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card">
                                            <div class="card-header">Deskripsi Dokumen Pendukung</div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="">Deskripsi Dokumen 1</label>
                                                    <input type="text" name="arcdesc1" id="" class="form-control" value="{{$arcdesc->archive_desc1}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Deskripsi Dokumen 2</label>
                                                    <input type="text" name="arcdesc2" id="" class="form-control" value="{{$arcdesc->archive_desc2}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Deskripsi Dokumen 3</label>
                                                    <input type="text" name="arcdesc3" id="" class="form-control" value="{{$arcdesc->archive_desc3}}">
                                                </div>
                                                <div class="py-2"></div>
                                                <div class="form-group text-center">
                                                    <button class="btn btn-outline-success">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                            <div class="col-6">
                                @foreach($exhibition as $arch)
                                    <form action="{{route('exhibitions.archivepost', [$arch->id, $arch->slug])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card">
                                            <div class="card-header">Dokumen Pendukung</div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="">Dokumen Pendukung 1</label>
                                                    <a href="{{url('uploads/archives')}}/{{$arch->archive1}}" download>Download</a>
                                                    <input type="file" name="archive1" id="" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Dokumen Pendukung 2</label>
                                                    <a href="{{url('uploads/archives')}}/{{$arch->archive2}}" download>Download</a>
                                                    <input type="file" name="archive2" id="" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Dokumen Pendukung 3</label>
                                                    <a href="{{url('uploads/archives')}}/{{$arch->archive3}}" download>Download</a>
                                                    <input type="file" name="archive3" id="" class="form-control">
                                                </div>
                                                <div class="py-2"></div>
                                                <div class="form-group text-center">
                                                    <button class="btn btn-outline-success">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                                
                            </div>
                        </div>
                        <div class="py-3"></div>
                        <div class="row">
                            <div class="col">
                                @foreach($exhibition as $faq)
                                    <form action="{{route('exhibitions.faq', [$faq->id, $faq->slug])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card">
                                            <div class="card-header text-center">FAQ</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col text-center">Pertanyaan 1</div>
                                                    <div class="col text-center">Jawaban 1</div>
                                                </div>
                                                <div class="py-2"></div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input name="question1" id="qst1" cols="12" rows="12" class="form-control" type="hidden" value="{{$faq->question1}}">
                                                        <trix-editor input="qst1" ></trix-editor>
                                                    </div>
                                                    <div class="col-6">
                                                        <input name="answer1" id="answ1" cols="12" rows="12" class="form-control" type="hidden" value="{{$faq->answer1}}">
                                                        <trix-editor input="answ1" ></trix-editor>
                                                    </div>
                                                </div>
                                                <div class="py-3"></div>
                                                <div class="row">
                                                    <div class="col text-center">Pertanyaan 2</div>
                                                    <div class="col text-center">Jawaban 2</div>
                                                </div>
                                                <div class="py-2"></div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input name="question2" id="qst2" cols="12" rows="12" class="form-control" type="hidden" value="{{$faq->question2}}">
                                                        <trix-editor input="qst2" ></trix-editor>
                                                    </div>
                                                    <div class="col-6">
                                                        <input name="answer2" id="answ2" cols="12" rows="12" class="form-control" type="hidden" value="{{$faq->answer2}}">
                                                        <trix-editor input="answ2" ></trix-editor>
                                                    </div>
                                                </div>
                                                <div class="py-3"></div>
                                                <div class="row">
                                                    <div class="col text-center">Pertanyaan 3</div>
                                                    <div class="col text-center">Jawaban 3</div>
                                                </div>
                                                <div class="py-2"></div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input name="question3" id="qst3" cols="12" rows="12" class="form-control" type="hidden" value="{{$faq->question3}}">
                                                        <trix-editor input="qst3" ></trix-editor>
                                                    </div>
                                                    <div class="col-6">
                                                        <input name="answer3" id="answ3" cols="12" rows="12" class="form-control" type="hidden" value="{{$faq->answer3}}">
                                                        <trix-editor input="answ3" ></trix-editor>
                                                    </div>
                                                </div>
                                                <div class="py-3"></div>
                                                <div class="row">
                                                    <div class="col text-center">Pertanyaan 4</div>
                                                    <div class="col text-center">Jawaban 4</div>
                                                </div>
                                                <div class="py-2"></div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input name="question4" id="qst4" cols="12" rows="12" class="form-control" type="hidden" value="{{$faq->question4}}">
                                                        <trix-editor input="qst4" ></trix-editor>
                                                    </div>
                                                    <div class="col-6">
                                                        <input name="answer4" id="answ4" cols="12" rows="12" class="form-control" type="hidden" value="{{$faq->answer4}}">
                                                        <trix-editor input="answ4" ></trix-editor>
                                                    </div>
                                                </div>
                                                <div class="py-3"></div>
                                                <div class="row">
                                                    <div class="col text-center">Pertanyaan 5</div>
                                                    <div class="col text-center">Jawaban 5</div>
                                                </div>
                                                <div class="py-2"></div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input name="question5" id="qst5" cols="12" rows="12" class="form-control" type="hidden" value="{{$faq->question5}}">
                                                        <trix-editor input="qst5" ></trix-editor>
                                                    </div>
                                                    <div class="col-6">
                                                        <input name="answer5" id="answ5" cols="12" rows="12" class="form-control" type="hidden" value="{{$faq->answer5}}">
                                                        <trix-editor input="answ5" ></trix-editor>
                                                    </div>
                                                </div>
                                                <div class="py-3"></div>
                                                <div class="row">
                                                    <div class="col"></div>
                                                    <div class="col text-center">
                                                        <button class="btn btn-outline-success">Submit</button>
                                                    </div>
                                                    <div class="col"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                        <div class="py-3"></div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header text-center">Pendaftar</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">Nama</div>
                                            <div class="col">Email</div>
                                            <div class="col text-center">Hapus</div>
                                        </div>
                                        @foreach(App\Entry::get() as $entry)
                                            <div class="row">
                                                <div class="col-4">
                                                    <input name="name" class="form-control" value="{{$entry->name}}" disabled>
                                                </div>
                                                <div class="col-4">
                                                    <input name="email" class="form-control" value="{{$entry->email}}" disabled>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <form action="{{route('exhibitions.unentry')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="exhibition_id" value="{{$entry->exhibition_id}}">
                                                        <input type="hidden" name="user_id" value="{{$entry->user_id}}">
                                                        <input type="hidden" name="name" value="{{$entry->name}}">
                                                        <input type="hidden" name="email" value="{{$entry->email}}">
                                                        <button class="btn btn-outline-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                        <div class="py-2"></div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    @endsection
@endsection
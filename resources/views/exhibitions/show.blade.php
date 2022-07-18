@extends('layouts.app')

@section('content')
<div class="py-5"></div>
    @section('cscript')
    <div class="container">
        <div class="row py-1">
            <div class="col">
                <div class="py-2"></div>
                    <div class="card rounded-lg" >
                        <div class="card-body">
                            <a href="{{route('exhibitor.index', [$exhibition->exhibitor->id, $exhibition->exhibitor->slug])}}" class="card-link">
                                <img src="{{asset('avatar')}}/{{$exhibition->exhibitor->logo}}" class="card-img-top" alt="..." style="height:32px; width:32px;">
                            </a>
                            <a href="{{route('exhibitor.index', [$exhibition->exhibitor->id, $exhibition->exhibitor->slug])}}" class="card-link">{{$exhibition->exhibitor->ename}}</a>
                        </div>
                        <div class="card-body">
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="centered-and-cropped" src="{{asset('uploads/images')}}/{{$exhibition->image1}}" class="d-block w-100" alt="Missing Images">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>First slide</h5>
                                            <p><?php echo $exhibition->image_desc1 ?></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="centered-and-cropped" src="{{asset('uploads/images')}}/{{$exhibition->image2}}" class="d-block w-100" alt="Missing Images">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Second slide</h5>
                                            <p><?php echo $exhibition->image_desc2 ?></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="centered-and-cropped" src="{{asset('uploads/images')}}/{{$exhibition->image3}}" class="d-block w-100" alt="Missing Images">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Third slide</h5>
                                            <p><?php echo $exhibition->image_desc3 ?></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="centered-and-cropped" src="{{asset('uploads/images')}}/{{$exhibition->image4}}" class="d-block w-100" alt="Missing Images">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Third slide</h5>
                                            <p><?php echo $exhibition->image_desc4 ?></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="centered-and-cropped" src="{{asset('uploads/images')}}/{{$exhibition->image5}}" class="d-block w-100" alt="Missing Images">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Third slide</h5>
                                            <p><?php echo $exhibition->image_desc5 ?></p>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </button>
                            </div>                    
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a href="{{route('exhibitions.show', [$exhibition->id, $exhibition->slug])}}" type="button" class="btn btn-outline-primary ">Detail Kegiatan</a>
                                </div>
                                @guest
                                    <div class="col"></div>
                                @elseif (Auth::user()->privilege=='visitor')
                                    <div class="col-ms-auto">
                                        <form action="{{route('exhibitions.entry')}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="exhibition_id" value="{{$exhibition->id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                            <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                            <input type="hidden" name="created_at" value="{{$timestamp = now()}}">
                                            <input type="hidden" name="updated_at" value="{{$timestamp = now()}}">
                                            <button type="submit" class="btn btn-outline-success">Daftar</button>
                                        </form>
                                        
                                    </div>     
                                    <div class="px-1"></div>
                                    <div class="col-ms-auto">
                                        <form action="{{route('exhibitions.unentry')}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="exhibition_id" value="{{$exhibition->id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                            <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                            <button type="submit" class="btn btn-outline-danger">Batal Daftar</button>
                                        </form>
                                    </div>
                                    <div class="px-3"></div>
                                    <div class="col col-lg-1">
                                        <form action="{{route('exhibitions.fav')}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="exhibition_id" value="{{$exhibition->id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="created_at" value="{{$timestamp = now()}}">
                                            <input type="hidden" name="updated_at" value="{{$timestamp = now()}}">
                                            <button type="submit" class="btn btn-outline-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-star-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098L8.16 4.1z"/>
                                                </svg>
                                                Simpan
                                            </button>
                                        </form>
                                    </div>
                                    <div class="px-2"></div>
                                    <div class="col col-lg-1">
                                        <form action="{{route('exhibitions.unfav')}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="exhibition_id" value="{{$exhibition->id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <button type="submit" class="btn btn-outline-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-x-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM6.854 5.146a.5.5 0 1 0-.708.708L7.293 7 6.146 8.146a.5.5 0 1 0 .708.708L8 7.707l1.146 1.147a.5.5 0 1 0 .708-.708L8.707 7l1.147-1.146a.5.5 0 0 0-.708-.708L8 6.293 6.854 5.146z"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                    <div class="px-3"></div>
                                @elseif (Auth::user()->privilege=='exhibitor')     
                                    <div class="col-lg-1"></div>
                                @else
                                    <div class="col-lg-1"></div>
                                @endif
                                
                            </div>
                            
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                Nama Kegiatan : 
                                <a href="{{route('exhibitions.show', [$exhibition->id, $exhibition->slug])}}">
                                    {{$exhibition->name}}
                                </a>
                            </h5>
                            <h5>
                                Lokasi Kegiatan :
                                <a href="http://{{$exhibition->location}}" target="_blank">{{$exhibition->location}}</a>
                            </h5>
                            <h5>
                                Kategori Kegiatan :
                                <?php 
                                    switch($exhibition->category_id){
                                        case 1: echo "Konferensi"; break;
                                        case 2: echo "Kontes"; break;
                                        case 3: echo "Olimpiade"; break;
                                        case 4: echo "Pameran"; break;
                                        case 5: echo "Peresmian"; break;
                                        case 6: echo "Peringatan"; break;
                                        case 7: echo "Workshop"; break;
                                        case 8: echo "Lainnya"; break;
                                        default: echo "Kategori Kegiatan"; break;
                                    }
                                ?>
                            </h5>
                            <h5>
                                Jenis Kegiatan :
                                <?php 
                                    switch($exhibition->type_id){
                                        case 1: echo "Online"; break;
                                        case 2: echo "Offline"; break;
                                        default: echo "Jenis Kegiatan"; break;
                                    }
                                ?>
                            </h5>
                            <h5>
                                Deskripsi Kegiatan
                            </h5>
                            <div class="col">
                                <?php echo $exhibition->description; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a href="{{url('uploads/archives')}}/{{$exhibition->archive1}}" download>Download Dokumen Pendukung 1</a>
                                </div>
                                <div class="col">
                                    <a href="{{url('uploads/archives')}}/{{$exhibition->archive2}}" download>Download Dokumen Pendukung 2</a>
                                </div>
                                <div class="col">
                                    <a href="{{url('uploads/archives')}}/{{$exhibition->archive3}}" download>Download Dokumen Pendukung 3</a>
                                </div>
                            </div>
                        </div>
                        <div class="py-2"></div>
                        <div class="card-body">
                            <h5>FaQ</h5>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                Pertanyaan 1: <?php echo $exhibition->question1 ?>
                                            </button>
                                        </h2>
                                    </div>
                              
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo $exhibition->answer1 ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Pertanyaan 2: <?php echo $exhibition->question2 ?>
                                            </button>
                                        </h2>
                                    </div>
                              
                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo $exhibition->answer2 ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Pertanyaan 3: <?php echo $exhibition->question3 ?>
                                            </button>
                                        </h2>
                                    </div>
                              
                                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo $exhibition->answer3 ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Pertanyaan 4: <?php echo $exhibition->question4 ?>
                                            </button>
                                        </h2>
                                    </div>
                              
                                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo $exhibition->answer4 ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFive">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                Pertanyaan 5: <?php echo $exhibition->question5 ?>
                                            </button>
                                        </h2>
                                    </div>
                              
                                    <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo $exhibition->answer5 ?>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="py-2"></div>
                        <div class="card-body">
                            <h5>Contact Persons</h5>
                            <div class="row">
                                <div class="col">
                                    {{$exhibition->ct_person1}} : <a href="http://{{$exhibition->ct_number1}}" target="_blank">{{$exhibition->ct_number1}}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{$exhibition->ct_person2}} : <a href="http://{{$exhibition->ct_number2}}" target="_blank">{{$exhibition->ct_number2}}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{$exhibition->ct_person3}} : <a href="http://{{$exhibition->ct_number3}}" target="_blank">{{$exhibition->ct_number3}}</a> 
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col text-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                        </svg>
                                        Tanggal mulai kegiatan : <?php $date=date_create($exhibition->start_date); echo date_format($date,"l, d-F-Y"); ?>
                                    </div>
                                    <div class="col text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-x-fill" viewBox="0 0 16 16">
                                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM6.854 8.146 8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z"/>
                                        </svg>
                                        Tanggal selesai kegiatan : <?php $date=date_create($exhibition->end_date); echo date_format($date,"l, d-F-Y"); ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-left text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
                                        <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                        <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z"/>
                                    </svg>
                                    Tags: {{$exhibition->tags}}
                                </div>
                                <div class="col text-right text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                    </svg>
                                    Posted - {{$exhibition->created_at->diffForHumans()}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3"></div>            
                    <div class="card">
                        <div class="card-header text-center">Message</div>
                        <div class="card-body">
                            @foreach(App\Chat::get() as $msg)
                                <div class="row">
                                    @if($msg->user_id==Auth::user()->id)
                                        <div class="col align-self-start"></div>
                                        <div class="col align-self-end">
                                            <div class="card">
                                                <div class="card-header">
                                                    <?php echo Auth::user()->email; ?>
                                                </div>
                                                <div class="card-body">
                                                    <?php echo $msg->message_text ?>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col align-self-start">
                                            <div class="card">
                                                <div class="card-header">User - <?php echo $msg->user_id; ?></div>
                                                <div class="card-body">
                                                    <?php echo $msg->message_text ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col align-self-end"></div>
                                    @endif
                                </div>
                                <div class="py-2"></div>
                            @endforeach
                            <div class="py-5"></div>
                            <div class="col-ms-auto">
                                <form action="{{route('exhibitions.message')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="exhibition_id" value="{{$exhibition->id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input name="message_text" id="exhbdesc" cols="30" rows="4" class="form-control" type="hidden" value="{{Auth::user()->message_text}}">
                                    <trix-editor input="exhbdesc" ></trix-editor>
                                    <input type="hidden" name="created_at" value="{{$timestamp = now()}}">
                                    <input type="hidden" name="updated_at" value="{{$timestamp = now()}}">
                                    <button type="submit" class="btn btn-outline-success">Kirim</button>
                                </form>
                            </div>
                            <div class="py-2"></div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    @endsection
@endsection
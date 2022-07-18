@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-5"></div>    
    <div class="card border-light">
        <div class="py-1">
            <form action="{{route('allexhibitions')}}" method="GET">
                <div class="card-body justify">
                    <div class="row">
                        <div class="col-6"><input type="text" name="name" id="" placeholder="Nama Kegiatan" class="text-center form-control"></div>
                        <div class="col-6">
                            <select name="category" id="inlineFormCustomSelect" class="text-center custom-select">
                                <option value="">Kategori Kegiatan</option>
                                <option value="1">Konferensi</option>
                                <option value="2">Kontes</option>
                                <option value="3">Olimpiade</option>
                                <option value="4">Pameran</option>
                                <option value="5">Peresmian</option>
                                <option value="6">Peringatan</option>
                                <option value="7">Workshop</option>
                                <option value="8">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="py-2"></div>
                    <div class="row">
                        <div class="col-3">
                            <select name="type" id="inlineFormCustomSelect" class="text-center custom-select">
                                <option value="">Jenis Kegiatan</option>
                                <option value="1">Daring</option>
                                <option value="2">Luring</option>
                            </select>
                        </div>
                        <div class="col-3"><input type="text" name="tags" id="" placeholder="Kata Kunci" class="text-center form-control"></div>
                        <div class="col-6"><input type="text" name="location" id="" placeholder="Lokasi Kegiatan" class="text-center form-control"></div>
                    </div>
                    <div class="py-2"></div>
                    <div class="row">
                        <div class="col-3"><input type="text" name="start_date" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" placeholder="Tanggal Mulai" class="text-center form-control" /></div>
                        <div class="col-3"><input type="text" name="end_date" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" placeholder="Tanggal Selesai" class="text-center form-control" /></div>
                        
                        <div class="col-6"><button class="btn btn-outline-dark text-center form-control">Cari</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="py-3"></div>
    <div class="container">
        <div class="row py-1">
            <div class="col">
                <div class="py-2"></div>
                @foreach($exhibitions as $exhibition)  
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
                                <a href="{{route('exhibitions.show', [$exhibition->id, $exhibition->slug])}}">
                                    {{$exhibition->name}}
                                </a>
                            </h5>
                            <a href="{{$exhibition->location}}">{{$exhibition->location}}</a>
                            <p class="card-text"><?php echo $exhibition->description; ?></p>
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
                @endforeach
            </div>
        </div>
        
        
    </div>
    <div class="py-2"></div>
</div>


@endsection


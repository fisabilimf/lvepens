@extends('layouts.app')

@section('content')
<div class="py-5"></div>
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-danger">
            {{Session::get('message')}}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="container">
                        <div class="rounded">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" name="srchexb" id="" class="form-control" placeholder="Kata Kunci">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-2"></div>
                        @foreach($exhibitions as $exhibition)    
                            <div class="border p-3 bg-white rounded">
                                <div class="row">
                                    <div class="col-2 text-center align-self-center">
                                        <a href="{{route('exhibitions.show', [$exhibition->id, $exhibition->slug])}}">
                                            <img class="" src="{{asset('avatar')}}/{{$exhibition->exhibitor->logo}}" alt="" style="max-width:100px; position:relative;">
                                        </a>
                                    </div>
                                    <div class="col-7">
                                        <div class="py-2"></div>
                                        <a href="{{route('exhibitions.show', [$exhibition->id, $exhibition->slug])}}" class="font-weight-bold h4">{{$exhibition->name}}</a>
                                        <div class="py-1"></div>
                                        <?php $date=date_create($exhibition->start_date); echo date_format($date,"l, d-F-Y"); ?> - <?php $date=date_create($exhibition->end_date); echo date_format($date,"l, d-F-Y"); ?>
                                        <div class="py-1"></div>
                                        <i class="fa fa-calendar-check"></i> {{$exhibition->created_at->diffForHumans()}}  
                                    </div>
                                    <div class="col-1 form-inline">
                                        <a class="" href="{{route('exhibitions.show', [$exhibition->id, $exhibition->slug])}}"> <!--Mengarahkan untuk menampilkan detail dari exhibition  -->
                                            <button type="submit" class="btn btn-outline-success">Detail</button>
                                        </a>                                        
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
                                </div>
                            </div>
                              <div class="py-1"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5"></div>
</div>
@endsection

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
                                    @if(Auth::user()->privilege=='exhibitor')
                                        <a href="{{route('exhibitions.create')}}">
                                            <button class="btn btn-success">Post Exhibition</button>
                                        </a>
                                    @endif
                                </div>
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
                                        <a class="" href="/exhibitions/{{$exhibition->id}}/{{$exhibition->slug}}/edit"> <!--Mengarahkan untuk menampilkan detail dari exhibition  -->
                                            <button type="submit" class="btn btn-outline-warning">Edit</button>
                                        </a> 
                                        
                                        <form action="{{$exhibition->id}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
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

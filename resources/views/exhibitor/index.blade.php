@extends('layouts.app')

@section('content')
<div class="py-5"></div>
<div class="container">
    <div class="card-exhibitor">
        <div class="exhibitor-profile">
            <img style=" width: 100%; " src="{{asset('cover')}}/{{$exhibitor->coverphoto}}" alt="" >
        </div>
        <div class="atas">
            <div class="exhibitor-desc"> 
                <div class="row">
                    <div class="col">
                        <img class="img-exhibitor rounded-lg" style=" " src="{{asset('avatar')}}/{{$exhibitor->logo}}" alt="" width="200px">
                    </div>
                    <div class="col">
                        <span class="align-text-bottom text-center rounded ">
                            <h1 class="bg-light ">{{$exhibitor->ename}}</h1>
                        </span>
                    </div>
                </div>
                <div class="py-2"></div>
                <div class="exhibitor-desc-write">
                    
                    <div class="py-2"></div>
                    <p class="text-justify"> <?php echo $exhibitor->description ?></p>
                    <table>
                        <tr>
                            <td>Website URL</td>
                            <td>:</td>
                            <td class="text-break"><a href="http://{{$exhibitor->website_url}}" target="_blank">{{$exhibitor->website_url}}</a></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td class="text-break">{{$exhibitor->address}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
        
        

    </div>
    <div class="py-2"></div>
    <div class="card-exhibitor">
        <table class="table ">
            <thead class="thead-exhibitor">
               <th colspan="5"> Daftar Kegiatan</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="container">
                            @foreach($exhibitor->exhibitions as $exhibition)    
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
                                            <a class="" href="{{route('exhibitions.show', [$exhibition->id, $exhibition->slug])}}">
                                                <button type="submit" class="btn btn-outline-success">Detail</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                              <div class="py-1"></div>
                            @endforeach                            
                        </div>
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('app')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($packages as $pack)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-success text-lg">
                        Hot Pack
                        </div>
                    </div>
                <img src="{{'//localhost:3002/storage/'.$pack->path.'/'.$pack->file_nm}}" class="img-fluid" alt="package-place">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div  class="col-sm-5">
                            <p class="removebott">{{$pack->pack_nm}}</p>
                            <p class="text-xs removebott"><i class="fas fa-map-marker-alt"></i> {{$pack->city}}</p>
                            <p class="text-muted removebott" style="font-size: 10px">(360 pack Terjual)</p>
                        </div>
                        <div  class="col-sm-7" align="right">
                            <p class="removebott"><small class="text-muted pricesmall">IDR</small> <strong>{{number_format($pack->price)}}</strong></p>
                            <p class="text-muted pricesmall removebott">per pack</p>
                            <p class="text-muted pricesmall removebott">Termasuk 8 Fasilitas</p>
                        </div>
                    </div>
                    <hr>
                    <p class="text-xs text-justify">{{substr($pack->pack_desc,0,150)}}...</p>
                    </div>
                    <div class="card-footer">
                    <a href="{{'/tourpackage/'.$pack->id}}" class="btn btn-sm btn-primary float-right">Lihat Detail</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection

@extends('app')
@section('content')
<br>
<div class="container">
        <div class="card card-success">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card mb-2 bg-gradient-dark">
                                    <img class="card-img-top" src="{{env('SERVICE_URL')+'storage/'.$cover->path.'/'.$cover->file_nm}}"  alt="Dist Photo 1">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title text-primary text-white">{{$cover->note}}</h5>
                                    </div>
                                </div>
                            </div>
                          <div class="row">
                            @foreach ($images as $image)
                                <div class="col-sm-4">
                                    <div class="card mb-2 bg-gradient-dark">
                                        <img class="card-img-top" src="{{env('SERVICE_URL')+'storage/'.$image->path.'/'.$image->file_nm}}"  alt="Dist Photo 1">
                                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                                            <h5 class="card-title text-primary text-white">{{$image->note}}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                          </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h1>{{$packages->pack_nm}}</h1>
                        <hr>
                        <div class="" align="right">
                            <h1 class="removebott"><small>IDR</small><strong> {{number_format($packages->price)}}</strong></h1>

                            <p class="removebott">PER PACK</p>
                            <div class="attachment-block clearfix text-left">
                                <p><strong>Deskripsi</strong></p>
                                <p class="text-justify">{{$packages->pack_desc}}</p>
                                <p><strong>Fasilitas</strong></p>
                                <div class="row">
                                    @foreach ($facilities as $fac)
                                        <div class="col-sm-6">
                                            <p class="removebott"><i class="{{$fac->use_mk=='1'?'fas fa-check usecolor':'fas fa-times unusecolor'}}"></i>&Tab; {{$fac->fac_nm}}</p>
                                            <small class="text-muted">{{$fac->note}}</small>
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                                <p><strong>Waktu Tour</strong></p>
                                <div class="row">
                                    @foreach ($dates as $date)
                                    <div class="col-sm-6">
                                        <p class="removebott"><i class="fas fa-calendar-alt"></i>&Tab; {{$date->travel_date}}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <br>
                                <a href="{{'/bookpackage/'.$packages->id}}" class="form-control btn btn-primary"><i class="fas fa-shopping-basket"></i> Booking</a>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-12">
                        <iframe class="embed-responsive-item" height="500px" width="100%" src="{{$packages->vid_url?$packages->vid_url:'https://www.youtube.com/embed/LI3uD9Yj-G8'}}" allowfullscreen></iframe>
                    </div>
                </div>
                @include('pages.faq')
                <div class="row">
                    <div class="col-12 mt-3 text-center">
                        <p class="lead">
                            <a href="contact-us.html">Hubungi Kami</a>,
                            Jika belum menemukan jawaban atau memiliki pertanyaan lain?<br />
                        </p>
                    </div>
                </div>
            </div>
          </div>
    </div>
 @endsection

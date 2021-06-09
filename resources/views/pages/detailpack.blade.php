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
                                    <img class="card-img-top" src="{{'//localhost:3002/storage/'.$cover->path.'/'.$cover->file_nm}}"  alt="Dist Photo 1">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title text-primary text-white">{{$cover->note}}</h5>
                                    </div>
                                </div>
                            </div>
                          <div class="row">
                            @foreach ($images as $image)
                                <div class="col-sm-4">
                                    <div class="card mb-2 bg-gradient-dark">
                                        <img class="card-img-top" src="{{'//localhost:3002/storage/'.$image->path.'/'.$image->file_nm}}"  alt="Dist Photo 1">
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
                <div class="row">
                    <div class="col-12">
                        <iframe class="embed-responsive-item" src="{{$packages->vid_url?$packages->vid_url:'https://www.youtube.com/embed/LI3uD9Yj-G8'}}" allowfullscreen></iframe>
                    </div>
                </div>
                <hr>
                <h1>FAQ</h1>
                <div class="row">
                    <div class="col-12" id="accordion">
                        <div class="card card-primary card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        1. Lorem ipsum dolor sit amet
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        2. Aenean massa
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        3. Donec quam felis
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                                </div>
                            </div>
                        </div>
                        <div class="card card-warning card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        4. Donec pede justo
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseFour" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
                                </div>
                            </div>
                        </div>
                        <div class="card card-warning card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        5. In enim justo
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseFive" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.
                                </div>
                            </div>
                        </div>
                        <div class="card card-warning card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        6. Integer tincidunt
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseSix" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
                                </div>
                            </div>
                        </div>
                        <div class="card card-danger card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        7. Aenean leo ligula
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseSeven" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
                                </div>
                            </div>
                        </div>
                        <div class="card card-danger card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseEight">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        8. Aliquam lorem ante
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseEight" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.
                                </div>
                            </div>
                        </div>
                        <div class="card card-danger card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        9.  Quisque rutrum
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseNine" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

@extends('app')
@section('content')
    <img src="{{ asset('assets/dist/img/banner.png')}}" width="100%" class="img-fluid"/>

    <div class="container">

        <div class="row" style="margin-top:-200px">
            <div class="col-md-12 text-center">
                <img src="{{ asset('assets/dist/img/logo.png')}}" width="200px" />
                <p></p><br>
            </div>
            <div class="col"></div>
            <div class="col-md-6">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Profile</a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                            <form name="fstudiotour">
                                <label>Pilih Kota</label>
                                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                   <input class="form-control">
                                </div>
                                <br>
                                <button class="btn btn-sm btn-primary float-right"><i class="fas fa-search"></i> Cari Tour</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                            <form name="fstudiotour">
                                <label>Pilih Kota</label>
                                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                   <input class="form-control">
                                </div>
                                <br>
                                <button class="btn btn-sm btn-primary float-right"><i class="fas fa-search"></i> Cari Tour</button>
                            </form>
                        </div>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
            </div>
            <div class="col"></div>

        </div>
        <br>
        <div class="section">
            <h3>Tour and Travel</h3>
            <div class="row">
            @foreach ($packages as $pack)
                <div class="col-md-3">
                <div class="card ">
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
            <a class="float-right" href="">Lihat Lebih Banyak Lagi  <i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
        <div class="section ownerprof">
        </div>
        <div class="section">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Kenapa Harus Airlangga?</h1>
                </div>
                <div class="col-sm-3 text-center">
                    <img height="150px" width="150px" style="align-self: center;" class="img-img-thumbnail" src="{{asset('assets/dist/img/ic_why-02.png')}}"/>
                    <h5> Testinasi Wisata Menarik yang ramah keluarga</h3>
                </div>
                <div class="col-sm-3 text-center">
                    <img height="150px" width="150px" style="align-self: center;" class="img-img-thumbnail" src="{{asset('assets/dist/img/ic_why-03.png')}}"/>
                    <h5> Testinasi Wisata Menarik yang ramah keluarga</h3>
                </div>
                <div class="col-sm-3 text-center">
                    <img height="150px" width="150px" style="align-self: center;" class="img-img-thumbnail" src="{{asset('assets/dist/img/ic_why-04.png')}}"/>
                    <h5> Testinasi Wisata Menarik yang ramah keluarga</h3>
                </div>
                <div class="col-sm-3 text-center">
                    <img height="150px" width="150px" style="align-self: center;" class="img-img-thumbnail" src="{{asset('assets/dist/img/ic_why-05.png')}}"/>
                    <h5> Testinasi Wisata Menarik yang ramah keluarga</h3>
                </div>

            </div>
        </div>
        <div class="section-testimoni text-center">
            <h1>Our Professional Team</h1>
            <div class="row">
                <div class="col-sm-3">
                    <div class="card card-body">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('assets/dist/img/user8-128x128.jpg')}}"/>
                    </div>
                </div>
                <div class="col-4">
s
                </div>
                <div class="col-4">
s
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
    <div class="section-footer">
        <div class="row">
            <div class="col-sm-4 text-center">
                <img  width="170px" src="{{asset('assets/dist/img/logo.png')}}">
                <br>
                <br>
                <img  height="70px" src="{{asset('assets/dist/img/travel.png')}}">
                <br>
                <br>
                <img  height="70px" src="{{asset('assets/dist/img/studio.png')}}">
                <br>
                <br>
            </div>
            <div class="col-sm-4 text-white aboutus">
                <p><strong> About Airlangga</strong></p>
                <a class="linkfollow">How To Book</a>
                <br>
                <a class="linkfollow">FAQ</a>
                <br>
                <br>
                <p><strong> Follow us on</strong></p>
                <a class="linkfollow"><i class="fab fa-facebook-square"></i> Facebook</a>
                <br>
                <a class="linkfollow"><i class="fab fa-instagram"></i> Instagram</a>
                <br>
                <a class="linkfollow"><i class="fab fa-youtube"></i> Youtube</a>
            </div>
            <div class="col-sm-4 text-white aboutus">
                <p><strong> Contact Us</strong></p>
                <p class="linkfollow" ><i class="fas fa-home"></i> Address :
                <br>Perum Puri Anggrek Blok F5 No 4
                <br>Serang- Banten , Indonesia</p>
                <p class="linkfollow" ><i class="fab fa-whatsapp-square"></i> Phone/WhatsApps :
                <br>0811-121-143
                <p class="linkfollow" ><i class="fas fa-envelope-open-text"></i> Email :
                    <br>Airlangga_travel@gmail.com
            </div>
        </div>
        <hr>
        <div class="text-center">
            <strong><a class="text-white" href="https://rosmantama.com">Rosmantama 2021 </a>.</strong> All rights reserved.
        </div>
    </div>

 @endsection

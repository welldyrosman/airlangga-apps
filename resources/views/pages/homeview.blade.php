@extends('app')
@section('content')
    {{-- <img src="{{ asset('assets/dist/img/banner.png')}}" width="100%" class="img-fluid"/> --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($slides as $s)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{$loop->iteration==1?'active':''}}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($slides as $sl)
            <div class="{{'carousel-item '.($loop->iteration==1?'active':'')}}">
                <img class="d-block w-100" src="{{env('SERVICE_URL').'storage/'.$sl->photo_path.'/'.$sl->photo}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <br><br>

                    <h2>{{$sl->slide_nm}}</h2>
                    <h3>{{$sl->slide_desc}}</h3>
                  </div>
              </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">

        {{-- <div class="row" style="margin-top:100px">
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

        </div> --}}
        <br>
        <div class="section">
            <h1>Tour and Travel</h1>
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
                    <img src="{{env('SERVICE_URL').'storage/'.$pack->path.'/'.$pack->file_nm}}" class="img-fluid" alt="package-place">
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
                        {{-- <p class="text-xs text-justify">{{str_pad(substr($pack->pack_desc,0,150),150,' ')}}...</p> --}}
                        </div>
                        <div class="card-footer">
                        <a href="{{'/tourpackage/'.$pack->id}}" class="btn btn-sm btn-primary float-right">Lihat Detail</a>
                    </div>
                </div>
                </div>
            @endforeach
            </div>
            <a class="float-right" href="/alltravel">Lihat Lebih Banyak Lagi  <i class="fas fa-long-arrow-alt-right"></i></a>
        </div>

        <div class="section videogallery">
            <h3>Gallery Video Kami</h3>
            <hr>
            <div class="row">
                @foreach ($videos as $vid)
                    <div class="col-sm-4">
                        <div class="ratio ratio-4x3">
                            <iframe src="{{$vid->video_url}}" style="width: -webkit-fill-available" title="YouTube video player" frameborder="0"  allowfullscreen></iframe>
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <a class="float-right" href="/allvideos">Lihat Semua Video Kami  <i class="fas fa-long-arrow-alt-right"></i></a>
            <br>
        </div>

        <div class="section">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Kenapa Harus Airlangga?</h1>
                </div>
                <div class="col-sm-3 text-center">
                    <img height="150px" width="150px" style="align-self: center;" class="img-img-thumbnail" src="{{asset('assets/dist/img/ic_why-02.png')}}"/>
                    <h5> Testinasi Wisata Menarik yang ramah keluarga</h5>
                    <small>kamu tak hanya bisa memesan tiket masuk destinasi wisata menarik dan kekinian seperti museum, waterpark, hingga destinasi yang punya spot instagramable. Namun kamu juga bisa menemukan banyak pilihan hiburan di Airlangga. Mulai dari ide aktivitas seru di akhir pekan sampai liburan ke seluruh penjuru dunia.</small>
                </div>
                <div class="col-sm-3 text-center">
                    <img height="150px" width="150px" style="align-self: center;" class="img-img-thumbnail" src="{{asset('assets/dist/img/ic_why-03.png')}}"/>
                    <h5> Pilihan Hiburan Paling Lengkap</h5>
                        <small>Sebelum berangkat liburan, kamu sudah bisa memesan terlebih dahulu atraksi wisata yang kamu ingin datangi di kota atau negara tujuan lewat Website Resmi Airlangga. Kamu bisa cari atraksi hingga kegiatan hiburan lainnya di kota atau negara yang dituju, pilih kegiatan yang kamu inginkan, kemudian pesan dan bayar hanya dengan modal klik di smartphone atau laptop.</small>
                </div>
                <div class="col-sm-3 text-center">
                    <img height="150px" width="150px" style="align-self: center;" class="img-img-thumbnail" src="{{asset('assets/dist/img/ic_why-04.png')}}"/>
                    <h5> Bisa Pesan dan Bayar Kapan dan di Mana Saja</h5>
                    <small>Bukan Traveloka Xperience namanya kalau tidak memudahkanmu untuk mendapatkan pengalaman liburan menyenangkan. Traveloka Xperience juga menghadirkan kemudahan dan keamanan terjamin saat kamu memesan tiket atraksi wisata dan hiburan lainnya.

                        Salah satunya adalah kemudahan bebas memilih metode pembayaran. Kamu bisa memilih salah satu dari sekian banyak pilihan metode pembayaran. Tinggal sesuaikan saja dengan preferensimu. </small>
                </div>
                <div class="col-sm-3 text-center">
                    <img height="150px" width="150px" style="align-self: center;" class="img-img-thumbnail" src="{{asset('assets/dist/img/ic_why-05.png')}}"/>
                    <h5> Kemudahan dan Keamanan Terjamin</h5>
                    <small>Tak hanya itu, kamu juga bisa mendapatkan banyak promo menarik di Traveloka Xperience. Mulai dari promo potongan harga tiket masuk atraksi wisata hingga perawatan rambut dan tubuh di salon. Kamu juga bisa mendapatkan banyak promo dari bank. Untuk mendapatkan promo tersebut, klik menu ‘Promo’ di bagian atas laman traveloka.com, kemudian pilih Xperience.</small>
                </div>

            </div>
        </div>
    </div>
    <div class="profteam text-center">
        <h1>Our Professional Team</h1>
        <div class="scrollmenu">
            @foreach ($teams as $team)
            <div class="conprof">
                <img class="profile-user-img img-fluid img-circle" src="{{env('SERVICE_URL').'storage/'.$team->photo_path.'/'.$team->photo}}"/>
                <h4>{{$team->nickname}}</h4>
                <h6>{{$team->fullname}}</h6>
                <h6 class="text-primary"><i class="fab fa-instagram"></i> {{$team->ig}}</h6>
                <small>{{$team->position}}</small>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <br>
        <div class="section-gallery">
            <h1> Airlanga Travel Gallery</h1>
            <hr>
            <div class="row">
                @foreach ($galleries as $gal)
                <div class="col-sm-4 gallerybox">
                    <a href="{{ asset('assets/dist/img/gallery/gallery-01.png') }}" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ asset('assets/dist/img/gallery/gallery-01.png') }}"  class="img-fluid gallery-img mb-2">
                    </a>
                </div>
                @endforeach
            </div>
            <a class="float-right" href="">Lihat Lebih Banyak Lagi  <i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
        <br>
        <br>
        <div class="section">
            <h1>Photo Studio</h1>
            <hr>
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
                    <img src="{{env('SERVICE_URL').'storage/'.$pack->path.'/'.$pack->file_nm}}" class="img-fluid" alt="package-place">
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
        <br>
        <br>

    </div>

    <div class="section-team testi text-center">
        <h1><i class="fas fa-comment"></i> Testimoni</h1>
        <br>
        {{-- <div class='row'>
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                @foreach ($testimonies as $testi)
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$loop->index}}" class="{{$loop->index==0?'active':''}}" aria-current="true" aria-label="Slide {{$loop->iteration}}"></button>
                @endforeach

                </div>
                <div class="carousel-inner">
                    @foreach ($testimonies as $testi)
                    <div class="carousel-item {{$loop->index==0?'active':''}}" data-bs-interval="10000">
                        <div class="row">
                            <div class="col-3">
                                <div class="cardtesti">
                                    <img class="profile-user-img img-fluid img-circle" style="margin-bottom: 100px;" src="{{asset('assets/dist/img/user8-128x128.jpg')}}"/>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{$testi->people_name}}</h5>
                                        <p>{{$testi->testimoni}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="cardtesti">
                                    <img class="profile-user-img img-fluid img-circle" style="margin-bottom: 100px;" src="{{asset('assets/dist/img/user8-128x128.jpg')}}"/>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{$testi->people_name}}</h5>
                                        <p>{{$testi->testimoni}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="cardtesti">
                                    <img class="profile-user-img img-fluid img-circle" style="margin-bottom: 100px;" src="{{asset('assets/dist/img/user8-128x128.jpg')}}"/>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{$testi->people_name}}</h5>
                                        <p>{{$testi->testimoni}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="cardtesti">
                                    <img class="profile-user-img img-fluid img-circle" style="margin-bottom: 100px;" src="{{asset('assets/dist/img/user8-128x128.jpg')}}"/>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{$testi->people_name}}</h5>
                                        <p>{{$testi->testimoni}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div> --}}
        <div class="row">

           @foreach ($testimonies as $testi)
           <div class="col-sm-3">
                <div class="cardtesti">
                    <img class="profile-user-img img-fluid img-circle" src="{{env('SERVICE_URL').'storage/'.$testi->photo_path.'/'.$testi->photo}}"/>
                    <p><strong>{{$testi->people_name}}</strong></p>
                    <p class="text-justify">{{$testi->testimoni}}"</p>
                </div>
            </div>
           @endforeach

        </div>
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

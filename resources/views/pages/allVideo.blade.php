@extends('app')
@section('content')
<div class="container">
    <br>
    <div class="text-center">
        <img  width="270px" src="{{asset('assets/dist/img/logo.png')}}">
    </div>
    <hr>
    <div class="row">
        @foreach ($packages as $vid)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="ratio ratio-4x3">
                        <iframe src="{{$vid->video_url}}" style="width: -webkit-fill-available" frameborder="0"  title="YouTube video player" allowfullscreen></iframe>
                    </div>
                </div>
                    <div class="card-body">
                        <p><strong>{{$vid->video_nm}}</strong></p>
                        <p >{{$vid->video_desc}}</p>
                    {{-- <p class="text-xs text-justify">{{substr($pack->pack_desc,0,150)}}...</p> --}}
                    </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection

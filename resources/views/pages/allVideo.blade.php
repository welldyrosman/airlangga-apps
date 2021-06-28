@extends('app')
@section('content')
<div class="container">
    <br>
    <div class="text-center">
        <img  width="170px" src="{{asset('assets/dist/img/logo.png')}}">
    </div>
    <hr>
    <div class="row">
        @foreach ($packages as $vid)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                        <iframe src="{{$vid->video_url}}" title="YouTube video player" frameborder="0"  allowfullscreen></iframe>

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

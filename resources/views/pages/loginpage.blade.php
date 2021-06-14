@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <br>
            <br>
            <img width="200px" class="text-center" src="{{asset('assets/dist/img/logo.png')}}"/>
            <br>
            <br>
            <div class="card card-body text-center">

                <h1>Login Member Area</h1>
                <a  href="/google/redirect" class="btn btn-app bg-primary"><i class="fab fa-google"></i>Login With Google</a>
            </div>
        </div>
    </div>
</div>
@endsection

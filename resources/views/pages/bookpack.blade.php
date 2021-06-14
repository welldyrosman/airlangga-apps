@extends('app')
@section('content')
<br>
<div class="container">
    <div class="card card-body">
        <h1>Booking Tour</h1>
        <div class="row">
            <div class="col-md-8">
                <form name="formbook" id="formbook"  enctype="multipart/form-data">
                    @csrf
                    <label>Nama Paket {{$packages->id}}</label>
                    <input type="hidden" id="pack_id" name="pack_id" value="{{$packages->id}}">
                    <input class="form-control" value="{{$packages->pack_nm}}" disabled>
                    <label>Harga Paket</label>
                    <input type="number" class="form-control" name="packprice" id="packprice" value="{{$packages->price}}" disabled>
                    <label>Jumlah Paket</label>
                    <input type="number" name="QTY" id="QTY" class="form-control">
                    <label>Tanggal Paket</label>
                    <select name="PACK_DATE" id="PACK_DATE" class="form-control">
                        @foreach ($datelist as $dt)
                            <option value="{{$dt->travel_date}}">{{$dt->travel_date}}</option>
                        @endforeach

                    </select>
                    <hr>
                    <label>Nama</label>
                    <input type="hidden" id="gid" name="gid" value="{{$user->google_id}}">
                    <input class="form-control" id="uname" name="uname"  value="{{$user->name}}" >
                    <label>Email</label>
                    <input class="form-control" value="{{$user->email}}" disabled >
                    <label>Nomer Telpon</label>
                    <input class="form-control"  id="uphone" name="uphone"  value="{{$user->phone_no}}" >
                    <hr>
                    <button type="button" name="confirmbtn" id="confirmbtn" class="btn btn-primary">Konfirmasi Booking</a>
                </form>
            </div>
            <div class="col-md-4">
                <h4><i class="fas fa-shopping-cart"></i> Detail Payment</h4>
                <div class="attachment-block clearfix text-left">
                    <p>Paket Dufan[#944858]</p>
                    <hr>
                    <p class="float-right">Total</p>
                    <p >Harga</p>
                    <p class="float-right" id="subtotprice"><strong><small> IDR</small></strong></p>
                    <p ><small> IDR</small>{{number_format($packages->price)}} x 5</p>
                    <p class="float-right">10%</p>
                    <p>Diskon</p>

                    <p class="float-right"><small>IDR</small><strong> 270.000</strong></p>
                    <p>Total Harga</p>

                    <p class="float-right"><small>IDR</small><strong> 81.000</strong></p>
                    <p>DP Minimum 30%</p>
                    <hr>
                    <p class="float-right">12 Juni 2021</p>
                    <p>Tanggal Berangkat:</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

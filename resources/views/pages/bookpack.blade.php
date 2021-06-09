@extends('app')
@section('content')
<br>
<div class="container">
    <div class="card card-body">
        <h1>Booking Tour</h1>
        <div class="row">
            <div class="col-md-8">
                <form name="formbook">
                    <label>Nama Paket</label>
                    <input class="form-control" value="{{$packages->pack_nm}}" disabled>
                    <label>Harga Paket</label>
                    <input type="number" class="form-control" name="packprice" id="packprice" value="{{$packages->price}}" disabled>
                    <label>Jumlah Paket</label>
                    <input type="number" name="packqty" id="packqty" class="form-control">
                    <label>Tanggal Paket</label>
                    <select class="form-control">
                        <option>21-01-2019</option>
                    </select>
                    <hr>
                    <a href="{{'/invoicedet/'.$packages->id}}" name="confirmbtn" id="confirmbtn" class="btn btn-primary">Konfirmasi Booking</a>
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

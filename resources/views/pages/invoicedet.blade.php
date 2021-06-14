@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="callout callout-warning">
            <h5><i class="fas fa-info"></i> Note:</h5>
            Lakukan Pembayaran Maksimal H-2 dari tanggal keberangkatan
        </div>


        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
            <div class="col-12">
                <h4>
                <img height="100px" src="{{asset('assets/dist/img/travel.png')}}"/> Airlangga Sejahtera Travel.
                <small class="float-right">Book Date: {{$packages->book_time}}</small>
                </h4>
            </div>
            <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                <strong>Airlangga Sejahtera Group</strong><br>
                Perum Puri Anggrek Blok F5 No 4<br>
                Serang- Banten<br>
                Phone: 0811-121-143<br>
                Email: info@airalnggasejahtera.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                <strong> {{$packages->name}}</strong><br>
                <i class="fas fa-envelope-open-text"></i> Email: {{$packages->email}}<br>
                <i class="fas fa-phone"></i> Phone: {{$packages->phone_no}}<br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Booking No # {{$packages->book_no}}</b><br>
                <b>Package Order:</b> [{{$packages->city}}]- {{$packages->pack_nm}}<br>
                <b>Travel Date:</b> {{$packages->pack_date}}<br>
                <b>Harga:  </b>IDR {{number_format($packages->price)}}<br>
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                <thead>
                <tr>
                    <th>Package</th>
                    <th>Pack Qty</th>
                    <th>Travel Date</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>[{{$packages->city}}]-{{$packages->pack_nm}}</td>
                        <td>{{$packages->pack_qty}} Pack</td>
                        <td>{{$packages->pack_date}}</td>
                        <td><p><small>IDR</small> {{number_format($packages->pack_qty*$packages->price)}}</p></td>
                    </tr>
                </tbody>
                </table>
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
                <p class="lead">Aturan Pembayaran:</p>
                <img src="{{asset('assets/dist/img/credit/bca.png')}}" height="50px" alt="Visa">
                <img src="{{asset('assets/dist/img/credit/allin.jpg')}}"  height="50px" alt="Mastercard">

                <ol class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
               <li>Melakukan pembayaran minimal 30% dari jumlah transaksi ke rekening:</li>

               <li>Melakukan konfirmasi pembayaran dengan cara whatsapp ke 08938383888 dengan format
                    <strong>PAY#[kode_booking]#[nominal]</strong></li>
                <li>Admin akan melakukan perubahan status booking setelah pengecekan dana</li>
                <li>Pelunasan dilakukan di hari H keberangkatan.</li>

                </ol>
            </div>
            <!-- /.col -->
            <div class="col-6">
                <p class="lead">Amount Due {{date('Y-m-d', strtotime('-2 days', strtotime($packages->pack_date)))}}</p>

                <div class="table-responsive">
                <table class="table">
                    <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td><small>IDR</small> {{number_format($packages->pack_qty*$packages->price)}}</td>
                    </tr>
                    <tr>
                    <th>Discount</th>
                    <td><small>IDR</small> {{number_format($packages->disc)}}</td>
                    </tr>
                    <tr>
                    <th>Total</th>
                    <td><h5><small>IDR</small> {{number_format(($packages->pack_qty*$packages->price)-$packages->disc)}}</h5></td>
                    </tr>
                    <tr>
                    <th>Booking DP Min 30%:</th>
                    <td><h5><small>min IDR </small> {{number_format((($packages->pack_qty*$packages->price)-$packages->disc)*0.3)}}</h5></td>
                    </tr>
                </table>
                </div>
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
            <div class="col-12">
                {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                Payment
                </button> --}}
                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
                </button>
            </div>
            </div>
        </div>
        <!-- /.invoice -->
        </div><!-- /.col -->
    </div>
</div>
@endsection

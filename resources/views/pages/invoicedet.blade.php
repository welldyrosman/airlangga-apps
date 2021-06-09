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
                <small class="float-right">Date: 2/10/2014</small>
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
                <strong>Welldy</strong><br>
                <i class="fas fa-envelope-open-text"></i> Email: welldyrosman@gmail.com<br>
                <i class="fas fa-phone"></i> Phone: (555) 539-1037<br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Booking No #007612</b><br>
                <b>Package Order:</b> 4F3S8J- DUFAN<br>
                <b>Travel Date:</b> 2/22/2014<br>
                <b>Payment Due:</b> 2/22/2014<br>
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
                        <td>Call of Duty</td>
                        <td>5 Pack</td>
                        <td>2020/020</td>
                        <td><p><small>IDR</small>50.000</p></td>
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
                <img src="{{asset('assets/dist/img/credit/visa.png')}}" alt="Visa">
                <img src="{{asset('assets/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                <img src="{{asset('assets/dist/img/credit/american-express.png')}}" alt="American Express">
                <img src="{{asset('assets/dist/img/credit/paypal2.png')}}" alt="Paypal">

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
                <p class="lead">Amount Due 2/22/2014</p>

                <div class="table-responsive">
                <table class="table">
                    <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>$250.30</td>
                    </tr>
                    <tr>
                    <th>Discount</th>
                    <td>$10.34</td>
                    </tr>
                    <tr>
                    <th>Total</th>
                    <td><h5><small>IDR</small>340000</h5></td>
                    </tr>
                    <tr>
                    <th>Booking DP Min 30%:</th>
                    <td><h5><small>min IDR</small>340000</h5></td>
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
                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                Payment
                </button>
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

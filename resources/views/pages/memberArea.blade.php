@extends('app')
@section('content')
<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <h1>Hallo, Welldy</h1>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Transaksi Kamu</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($packages as $item)


                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">

                                <p class="text-primary text-xl">
                                    <a href="{{'/invoicedet/'.$item->id}}">
                                    <i class="fas fa-shopping-bag"></i>
                                     {{$item->book_no}}
                                    </a>
                                </p>
                                <p class="text text-md">
                                    <i class="fas fa-info-circle"></i>
                                    {{$item->pay_status}}
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="text-muted">  {{$item->pack_date}}</span>
                                    <span class="font-weight-bold">
                                    <i class="fas fa-money-bill"></i> IDR 1.200.000
                                    </span>
                                    <span class="text-muted">[JAKARTA]-DUFAN</span>

                                </p>
                                </div>
                                @endforeach
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

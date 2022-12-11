@extends('admin.layout')
@section('title', 'Home Page')
@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">

        <div class="card">
            <div class="card-header" style="background-color: mintcream">
                <h2 align="center" style="font-weight: bold">Selamat Datang {{ auth()->user()->nama }}</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total uang yang masuk hari ini:</h5>
                                <p class="card-text"><b>Rp.{{ number_format($total_price, 2, ',', '.') }}</b>
                                </p>
                                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total pembeli hari ini:</h5>
                                <p class="card-text text-bold"><b>{{ $total_transaksi }} Pembeli</b>
                                </p>
                                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!---Container Fluid-->
    </div>
@stop

@section('javascript')

@stop

@extends('layouts.app')

@section('title')
Resto | PoS
@endsection

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">

                    <h4 class="page-title">Dashboard</h4>
                    <ol class="breadcrumb">
                        <li class="active">
                            <a href="#">Resto | PoS</a>
                        </li>
                    </ol>
                </div>
            </div>

            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box widget-inline">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-inline-box text-center">
                                    <h3><i class="text-primary md ion-android-contacts"></i> <b data-plugin="counterup">{{ $jumlah_produk }}</b></h3>
                                    <h4 class="text-muted">Barang</h4>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-inline-box text-center">
                                    <h3><i class="text-custom md md-attach-money"></i> <b data-plugin="counterup">{{ $jumlah_kat }}</b></h3>
                                    <h4 class="text-muted">Kategori Produk</h4>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-inline-box text-center">
                                    {{--  <h3><i class="text-pink md md-account-child"></i> <b data-plugin="counterup">{{ $jumlah_perusahaan }}</b></h3>  --}}
                                    <h4 class="text-muted">Total users</h4>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-inline-box text-center b-0">
                                    <h3><i class="text-purple md md-visibility"></i> <b data-plugin="counterup">325</b></h3>
                                    <h4 class="text-muted">Total visits</h4>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Halaman Admin</b></h4
                        
                    </div>
                </div>
            </div>

            {{--  @else
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Halaman User</b></h4
                        <p>Anda login sebagai {{ Auth::user()->name }} <p>
                    </div>
                </div>
            </div>
            @endif  --}}


        </div> <!-- container -->
                    
    </div> <!-- content -->
@endsection

@section('script')
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>
@endsection
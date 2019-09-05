@extends('layout')
@section('content')
<div class="flash-data" data-flashdata="{{ Session::get('success') }}"></div>
<div class="panel-header bg-primary">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white pb-2 fw-bold">Pembayaran</h1>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Daftar Pembayaran</div>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                    <div class="tab-pane fade show active" id="pills-home-nobd" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table basic-datatables">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Siswa</th>
                                            <th>Tanggal Transfer</th>
                                            <th>Pembayaran Bulan</th>
                                            <th>Bukti</th>
                                            <th>Jumlah Transfer</th>
                                            <th>Bank Transfer</th>
                                            <th>Status</th>
                                            <th>Cetak</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pembayaran as $sw)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sw->nama }}</td>
                                            <td>{{ $sw->tgl_transfer }}</td>
                                            <td>{{ $sw->bulan }}</td>
                                            <td>{{ $sw->bukti }}</td>
                                            <td>{{ $sw->jumlah }}</td>
                                            <td>{{ $sw->atm }}</td>
                                            @php
                                            if($sw->status == 0 )
                                            $pesan = '<span class="badge badge-danger">Menunggu Konfirmasi</span>';
                                            
                                            elseif($sw->status == 3)
                                            
                                            $pesan = '<span class="badge badge-danger">Pembayaran Di Tolak</span>';
                                           
                                            else
                                            
                                            $pesan = '<span class="badge badge-success">Sudah Di Konfirmasi</span>';
                                            @endphp
                                            <td>{!! $pesan !!}</td>
                                            <td>
                                                <a class="btn btn-link btn-success" target="_blank" href="/cetakpembayaran/{{ Crypt::encrypt($sw->id_p) }}"  data-toggle="tooltip" data-original-title="Cetak"><i class="fa fa-print"></i></a>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    
                                                        <button type="button" class="btn btn-link btn-danger kon" data-url="/accpembayaran/{{ Crypt::encrypt($sw->id_p) }}/3"  data-toggle="tooltip" value="tolak" data-original-title="Tolak"><i class="fa fa-times"></i></button>
                                                        <button type="button" class="btn btn-link btn-primary kon" data-url="/accpembayaran/{{ Crypt::encrypt($sw->id_p) }}/1" data-toggle="tooltip" value="konfirmasi" data-original-title="Konfirmasi"><i class="fa fa-check"></i></button>
                                   
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
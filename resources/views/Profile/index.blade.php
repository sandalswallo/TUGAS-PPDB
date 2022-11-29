@extends('template.layout')

@section('title')
    Dashboard
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profile | {{ Auth()->user()->name }}</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="row">
                
                <div class="col-lg-4">
                    <div class="">
                        <div class="card-body text-center">
                            <img src=""
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">UCUP</h5>
                            <p class="text-muted mb-1">ADMINISTRATOR</p>
                            <p class="text-muted">DARJO</p>

                            <button type="button" onclick="#" class="btn btn-tool btn-primary shadow-sm rounded-pill" style="width: 120px;">
                                Edit Profil
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    
                    <div class="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">UCUP</p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jurusan</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">RPL</p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jenis Kelamin</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Laki-laki</p>
                                </div>
                            </div>

                            <hr>

                            

                           
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Asal Sekolah</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">SMP</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
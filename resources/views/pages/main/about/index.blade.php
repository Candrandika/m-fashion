@extends('layouts.main.index')

@section('subtitle', 'CSR')

@section('content')
    <div
        style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('dist/images/backgrounds/auth-page-bg.png') }}'); background-position: center; background-size: cover; width: 100%; height: 300px; display: grid; place-content: center;">
        <h1 class="text-white">Tentang MFashion</h1>
    </div>
    <div class="container">
        <div class="card-body">
            
            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-fill mt-4" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#navpill-111" role="tab">
                        <span>Tab 1</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#navpill-222" role="tab">
                        <span>Tab 2</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#navpill-333" role="tab">
                        <span>Tab 3</span>
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content border mt-2">
                <div class="tab-pane active p-3" id="navpill-111" role="tabpanel">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../../dist/images/big/img2.jpg" alt="" class="img-fluid" />
                        </div>
                        <div class="col-md-8">
                            <p>
                                Raw denim you probably haven't heard of them jean
                                shorts Austin. Nesciunt tofu stumptown aliqua,
                                retro synth master cleanse. Mustache cliche
                                tempor, williamsburg carles vegan helvetica.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane p-3" id="navpill-222" role="tabpanel">
                    <div class="row">
                        <div class="col-md-8">
                            <p>
                                Raw denim you probably haven't heard of them jean
                                shorts Austin. Nesciunt tofu stumptown aliqua,
                                retro synth master cleanse. Mustache cliche
                                tempor, williamsburg carles vegan helvetica.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img src="../../dist/images/big/img1.jpg" alt="" class="img-fluid" />
                        </div>
                    </div>
                </div>
                <div class="tab-pane p-3" id="navpill-333" role="tabpanel">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../../dist/images/big/img3.jpg" alt="" class="img-fluid" />
                        </div>
                        <div class="col-md-8">
                            <p>
                                Raw denim you probably haven't heard of them jean
                                shorts Austin. Nesciunt tofu stumptown aliqua,
                                retro synth master cleanse. Mustache cliche
                                tempor, williamsburg carles vegan helvetica.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

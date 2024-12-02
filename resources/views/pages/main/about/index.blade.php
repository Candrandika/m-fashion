@extends('layouts.main.index')

@section('subtitle', 'Tentang MFashion')

@section('content')
    <div
        style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('dist/images/backgrounds/auth-page-bg.png') }}'); background-position: center; background-size: cover; width: 100%; height: 300px; display: grid; place-content: center;">
        <h1 class="text-white">Tentang MFashion</h1>
    </div>
    <div class="container">
        <div class="card-body">
            
            <!-- Nav tabs -->
            <ul class="nav nav-pills mt-4 mb-2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#pane-about" role="tab">
                        <span>Tentang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#pane-vision-mission" role="tab">
                        <span>Visi & Misi</span>
                    </a>
                </li>
            </ul>

            <hr>

            <!-- Tab panes -->
            <div class="tab-content mt-2">
                <div class="tab-pane active p-3" id="pane-about" role="tabpanel">
                    <h2>Tentang MFashion</h2> <br>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, eligendi cumque aliquam officia assumenda quam neque pariatur animi nostrum amet fugit voluptatibus sed repellat nihil commodi magni molestias, possimus dicta quisquam doloribus, ad fugiat laborum odio distinctio! Reprehenderit, quidem nemo. Dicta libero quibusdam quas esse, voluptatibus nihil animi unde explicabo eligendi, veniam harum et incidunt iste nesciunt numquam eum corrupti nobis totam. Nihil, mollitia. Quibusdam sit, voluptatibus, dignissimos tempora eos recusandae harum at nihil repudiandae aliquid aut? Possimus neque minima accusantium deleniti ab, inventore laborum? Facere rem ad molestiae vitae quasi reprehenderit, sit nihil consequuntur temporibus error, ipsa illum quisquam tenetur consectetur, perferendis blanditiis repudiandae ullam sapiente. Officia saepe repudiandae mollitia quos eum, quasi nulla, quo consectetur veniam perspiciatis delectus eligendi ea inventore distinctio est dolor. Quae aperiam ex hic!</p>
                </div>
                <div class="tab-pane p-3" id="pane-vision-mission" role="tabpanel">
                    <h2>Visi & Misi</h2> <br>
                    
                    <h4>Visi</h4>
                    <ul style="list-style: disc inside;">
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsam veniam iusto?</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsam veniam iusto?</li>
                    </ul>

                    <h4>Misi</h4>
                    <ul style="list-style: disc inside;">
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus aspernatur odio corporis, ea beatae qui.</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus aspernatur odio corporis, ea beatae qui.</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus aspernatur odio corporis, ea beatae qui.</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus aspernatur odio corporis, ea beatae qui.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .nav-link.active {
            background-color: var(--bs-dark)!important;
            color: var(--bs-light)!important
        }
    </style>
@endpush
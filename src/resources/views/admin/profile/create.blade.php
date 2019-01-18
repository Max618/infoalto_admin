@extends('layout.dashboard')

@section("title", "Criar Perfil")

@section("css")
<style>
    .editar li {
        padding-bottom: 10px;
    }
    .profile-header .profile-main {
        background-image: url("{{ asset('admin/img/profile-bg.png') }}");
        background-size: 1050px 265px;
    }
    .rounded {
        display: inline-block;
        width: 150px;
        height: 150px;
        border-radius: 50%;

        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
    }
    .image {
        background-image: url('{{ asset("admin/img/default-user-image.png") }}');
    }
</style>
@endsection
@section('content')
<div class="panel panel-profile">
    <div class="clearfix">
        <!-- LEFT COLUMN -->
        {!! Form::open(["route" => "profile.store", "method" => "post", "class" => "profile", "enctype" => "multipart/form-data"]) !!}
            <!-- PROFILE HEADER -->
            <div class="profile-header">
                <div class="overlay"></div>
                <div class="profile-main">
                    <div class="rounded image"></div>
                    <h3 class="name">{{ auth()->user()->name }}</h3>
                    <div class="text-center">
                    {!! Form::file("profile_image",["class" => "form-control"]) !!}
                    </div>
                </div>
                <div class="profile-stat">
                    <div class="row">
                        <div class="col-md-4 stat-item">
                            45 <span>Projects</span>
                        </div>
                        <div class="col-md-4 stat-item">
                            15 <span>Awards</span>
                        </div>
                        <div class="col-md-4 stat-item">
                            2174 <span>Points</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE HEADER -->
            <!-- PROFILE DETAIL -->
            <div class="profile-detail">
                <div class="profile-info">
                    <h4 class="heading">Informações básicas</h4>
                    <ul class="list-unstyled list-justify editar">
                        <li>Data de nascimento <span>{!! Form::date("birthday",null,["class" => "form-control"]) !!}</span></li>
                        <li>E-mail <span>{{ auth()->user()->email }}</span></li>
                        <li>Celular <span>{!! Form::text("phone",null,["class" => "form-control"]) !!}</span></li>
                    </ul>
                </div>
                <div class="profile-info">
                    <h4 class="heading">Social</h4>
                    <ul class="list-inline social-icons">
                        <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
                <div class="profile-info">
                    <h4 class="heading">Bio</h4>
                    {!! Form::textarea("about",null,["class" => "form-control", "placeholder" => "Sua banda preferida, lugares que já viajou..."]) !!}
                </div>
                <div class="text-center">
                    {!! Form::submit("Salvar", ["class" => "btn btn-primary"]) !!}
                </div>
            </div>                
            <!-- END PROFILE DETAIL -->
        {!! Form::close() !!}
    </div>
</div>
@endsection
@extends('layout.dashboard')

@section("css")
<style>
    .profile-header .profile-main {
        background-image: url("{{ asset('admin/img/profile-bg.png') }}");
    }
</style>
@endsection
@section('content')
<div class="panel panel-profile">
    <div class="clearfix">
        <!-- LEFT COLUMN -->
        <div class="profile">
            <!-- PROFILE HEADER -->
            <div class="profile-header">
                <div class="overlay"></div>
                <div class="profile-main">
                    <img src="{{ asset('admin/img/user-medium.png') }}" class="img-circle" alt="Avatar">
                    <h3 class="name">{{ auth()->user()->name }}</h3>
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
                    <ul class="list-unstyled list-justify">
                        <li>Data de nascimento <span>{{ $profile->birthday }}</span></li>
                        <li>Celular <span>{{ $profile->phone }}</span></li>
                        <li>E-mail <span>{{ auth()->user()->email }}</span></li>
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
                    <p>{{ $profile->about }}</p>
                </div>
                <div class="text-center"><a href="#" class="btn btn-primary">Edit Profile</a></div>
            </div>
            <!-- END PROFILE DETAIL -->
        </div>
    </div>
</div>
@endsection
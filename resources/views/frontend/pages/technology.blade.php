@extends('app')
@section('title','Indianapolis Career In Real Estate - Technology')
@section('description','')
@section('main-content')

    <div class="header-breadcrumb page-header technology mbottom50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section-title fleft">Technology</h1>
                    <ul class="reset-list">
                        <li>
                            <p><a href="{{url('/')}}" style="color:#ffcc00">Home</a></p>
                        </li>
                        <li>/</li>
                        <li class="active">
                            <p>Technology</p>
                        </li>
                    </ul>
                    <span id="current-date">{{date('n D, Y')}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Technology Designed For You</h2>

                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('frontend/images/tech_icons.jpg')}}" alt="" class="img-responsive">
                </div>
                <div class="col-md-6" style="margin-top: 30px;">
                    <h6>
                        It’s All About You! You’ll have everything you need to make a name for yourself! Promote
                        yourself from listing to close, to buyers and sellers, online or in print. Keep your fast –paced
                        career well organized with one-of-a-kind tools!. Here are just a few of the tools and resources
                        provided to CENTURY 21 Scheetz agents </h6>

                    <p class="center">
                        <a href="{{url('contact_us')}}" class="btn btn-lg btn-primary">Want more info? Contact Us</a>
                    </p>
                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row">
                <div class="col-md-6">
                    <h6 style="margin-top:130px">
                        In a world where technology changes daily, it’s imperative to align yourself with a brokerage
                        that stays ahead of the technology curve. CENTURY 21 Scheetz agents are provided with the most
                        advanced tools in the industry. As a Brokerage we make sure YOU get the exposure and tools you
                        need to have a successful online presence and facilitate seamless transactions.
                    </h6>

                    <p class="center">
                        <a href="{{url('contact_us')}}" class="btn btn-lg btn-primary">Want more info? Contact Us</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('frontend/images/ipad.png')}}" alt="" class="img-responsive">
                </div>

            </div>
        </div>
    </div>

@endsection
@extends('app')
@section('title','Indianapolis Career In Real Estate - Getting Licensed')
@section('description','')
@section('main-content')

    <div class="header-breadcrumb page-header default mbottom50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section-title fleft">Licensing</h1>
                    <ul class="reset-list">
                        <li>
                            <p><a href="{{url('/')}}" style="color:#ffcc00">Home</a></p>
                        </li>
                        <li>/</li>
                        <li class="active">
                            <p>Licensing</p>
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
                    <h2 >How Do I Become a Real Estate Agent?</h2>
                    <h5>Are you ready to find out how you can pursue your passion and be on your way to a successful career in real estate? With our online educational gateway you can get licensed in just 2 weeks! Check out these 4 easy steps to becoming a real estate professional.</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 center">
                    <img src="{{asset('frontend/images/plan2.jpg')}}" alt="" class="img-responsive">
                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row">
                <div class="col-md-6">
                    <h4>Educational Gateway</h4>
                    <h6>
                        Our online educational gateway provides courses to students in the most convenient format. With busy schedules, this platform allows new students and seasoned agents to complete required coursework out of the comfort of their own home, office, or coffee shop! We offer a variety of courses that fulfill the state requirements for Pre-Licensing, Continuing Education, and Post Licensing Education. Click on your course below to learn more and get registered.
                    </h6>
                </div>
                <div class="col-md-6">
                    <a href="http://www.recp.org/RECP/MemberServices/MyAccount/Core/Events/RECP_CSHPortal.aspx?pp=CSH" target="_blank">
                        <img src="{{asset('frontend/images/educational_gateway.png')}}" alt="" class="img-responsive">
                    </a>

                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row">

                <div class="col-md-6">
                    <img src="{{asset('frontend/images/indiana.jpg')}}" alt="" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <h4>90-Hour Online Pre-Licensing Course</h4>
                    <h6>
                        This course prepares you for the State Licensing Exam which allows you to sell real estate in the state of Indiana. The class will cover a variety of topics such as; Real Estate Law, Taxes and Liens, Contracts, Title, Appraisals, Contracts, Leases, and Real Estate Financing.
                    </h6>
                    <p class="center">
                        <a href="http://www.recp.org/RECP/MemberServices/MyAccount/Core/Events/RECP_CSHPortal.aspx?pp=CSH" target="_blank" class="btn btn-lg btn-primary">Get Started</a>
                       <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#school_list">Want a live class?</button>

                    </p>

                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row mbottom70">


                <div class="col-md-6">
                    <h4>12 Hour Continuing Education</h4>
                    <h6>
                        CENTURY 21 Scheetz provides resources for ongoing continuing education required to keep your license active. Advance your real estate knowledge with these relevant and important topics. Indiana License Law, Anatomy of an Appraisal, The Economy of Real Estate, and the Realtor Code of Ethics.
                    </h6>
                    <p class="center"><a href="http://www.recp.org/RECP/MemberServices/MyAccount/Core/Events/RECP_CSHPortal.aspx?pp=CSH" target="_blank" class="btn btn-lg btn-primary">Get Started</a></p>

                </div>
                <div class="col-md-6 center">
                    <img src="{{asset('frontend/images/clock.png')}}" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
    @include('frontend.partials.school_list_model')
@endsection
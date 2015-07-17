@extends('app')
@section('title','Indianapolis Career In Real Estate - Agent Support')
@section('description','')
@section('main-content')

    <div class="header-breadcrumb page-header support default mbottom50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section-title fleft">Agent Support</h1>
                    <ul class="reset-list">
                        <li>
                            <p><a href="{{url('/')}}" style="color:#ffcc00">Home</a></p>
                        </li>
                        <li>/</li>
                        <li class="active">
                            <p>Agent Support</p>
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
                    <h2 >The Support You Deserve</h2>
                    <h6>Whether you’re just starting to build your real estate empire or you’re well on your way to the top, you’ll want a strong support team behind you. CENTURY 21 Scheetz provides the resources you’ll need to establish your own built-in real estate entourage. With CENTURY 21 Scheetz, you’ll never feel alone in any season of your career. Your dedicated team of support is accessible and committed to helping you provide star treatment to your clients and helping boost your success.</h6>
                </div>
            </div>

            <div class="row mbottom70">
                <div class="col-md-8 col-md-offset-2 center">
                    <img src="{{asset('frontend/images/support_and_you.png')}}" alt="" class="img-responsive">
                </div>
                <!-- <div class="col-md-6 col-md-offset-3 center">
					<img src="{{asset('frontend/images/support_and_you.png')}}" alt="" class="img-responsive">
				</div> -->
            </div>
        </div>
    </div>
@endsection
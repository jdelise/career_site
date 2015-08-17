@extends('app')
@section('title','Indianapolis Career In Real Estate - Business Plan')
    @stop
@section('description','The benefit to becoming a Real Estate agent is the opportunity for uncapped earning potential. By completing our interactive business plan you will find out what it will take to achieve your financial goals.')
    @stop
@section('header_content')
    <link rel="stylesheet" type="text/css" href="/frontend/css/sliders.css" media="screen" />
@stop
@section('main-content')
    <div class="header-breadcrumb page-header default mbottom50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section-title fleft">Business Plan</h1>
                    <ul class="reset-list">
                        <li>
                            <p><a href="{{url('/')}}" style="color:#ffcc00">Home</a></p>
                        </li>
                        <li>/</li>
                        <li class="active">
                            <p>Business Plan</p>
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
                <div class="col-md-7" style="background: url({{asset('frontend/images/goals.png')}}) no-repeat center; position:relative; height:450px">
                    <h1 class="short word-rotator-title" style="position:absolute; top:100px">
                        Here’s What it Takes To...<br>
                        <strong class="inverted">
									<span class="word-rotate" data-plugin-options='{"delay": 2000, "animDelay": 300}'>
										<span class="word-rotate-items">
											<span>Make more money</span>
											<span>Be a top producer</span>
											<span>Establish balance</span>
											<span>Achieve your dreams</span>
											<span>Be your own boss</span>
										</span>
									</span>
                        </strong>

                    </h1>
                </div>
                <div class="col-md-5">

                    <p class="black" style="font-size: 24px;line-height: 31px;">
                        <span class="firstcharacter2" style="font-size: 55px;line-height: 55px;">T</span>he one question we always hear is <b>“How much money can I make in Real Estate?”</b>.  The benefit to becoming a Real Estate agent is the opportunity for uncapped earning potential. By completing our interactive business plan you will find out what it will take to achieve your financial goals.  You can make as much money as you want to make. So what will it take to gain that financial independence? Passion. Motivation. Drive. Hunger. Click on the link below to find out how much money YOU can make in Real Estate.
                    </p>
                    <p class="center"><a href="#business_plan" data-toggle="modal" class="btn btn-lg btn-primary">Launch Your Plan!</a></p>
                </div>

            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row">

                <div class="col-md-5">
                    <p class="black" style="font-size: 24px;line-height: 31px;">
                        <span class="firstcharacter2" style="font-size: 55px;line-height: 55px;">C</span>larifying the purpose and direction of your business allows you to understand what needs to be done for forward growth. Your Business Plan will continue to change with each year you are selling real estate. This interactive tool is helpful for all agents both new to the industry and seasoned agents with many years of successful real estate sales. Plan for your career. Plan for your future. Fill out our interactive business plan and find out what it will take to achieve your goals.
                    </p>
                    <p class="center"><a href="#business_plan" data-toggle="modal" class="btn btn-lg btn-primary">Launch Your Plan!</a></p>
                </div>
                <div class="col-md-7">
                    <img src="{{asset('frontend/images/business_plan.jpg')}}" alt="" class="img-responsive">

                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row mbottom70">
                <div class="col-md-7">
                    <img src="{{asset('frontend/images/pop_quiz.jpg')}}" alt="" class="img-responsive">

                </div>
                <div class="col-md-5">

                    <ol style="font-size: 24px;line-height: 31px;">
                        <li style="margin-bottom: 20px;">How many closed transactions will it take to make $50,000, $100,000, $150,000+?</li>
                        <li style="margin-bottom: 20px;">How many buyers will you need to work with to reach your financial goals?</li>
                        <li style="margin-bottom: 20px;">How many listings will you need to take in a year?</li>

                    </ol>
                    <p class="center"><a href="#business_plan" data-toggle="modal" class="btn btn-lg btn-primary">Get the answers here!</a></p>
                </div>

            </div>
        </div>
    </div>
    @include('frontend.partials.business_plan_model')
@endsection
@section('footer-scripts')
    <script src="/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script src="/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
    <script src="/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
    <script src="/global/plugins/select2/select2.min.js"></script>
    <script src="/backend/pages/scripts/form-wizard.js"></script>
    @stop
@section('init')
    FormWizard.init();
    @stop
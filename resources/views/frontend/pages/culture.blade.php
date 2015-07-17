@extends('app')
@section('title','Indianapolis Career In Real Estate - Our Culture')
@section('description','')
@section('main-content')

    <div class="header-breadcrumb page-header default mbottom50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section-title fleft">Culture of Opportunity</h1>
                    <ul class="reset-list">
                        <li>
                            <p><a href="{{url('/')}}" style="color:#ffcc00">Home</a></p>
                        </li>
                        <li>/</li>
                        <li class="active">
                            <p>Culture of Opportunity</p>
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

                    <h2 >A Culture of Opportunity</h2>
                    <h6>Being part of the winning CENTURY 21 Scheetz team means you get to win for yourself. Around Indianapolis, we promote the brand – which is you – everywhere.</h6>
                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row">
                <div class="col-md-6">

                    <h4>Awards and Recognition</h4>
                    <h6>
                        <span class="firstcharacter2" style="font-size: 55px;line-height: 55px;">C</span>ENTURY 21 Scheetz makes sure you get back what you put into your real estate career. You’ll get the chance to earn recognition within your office, the CENTURY 21 Scheetz company, as well as opportunities to be recognized regionally, nationally and globally.
                    </h6>

                </div>
                <div class="col-md-6 center">
                    <div id="award_images">
                        <div class="item">
                            <img src="{{asset('frontend/images/awards.jpg')}}" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img src="{{asset('frontend/images/jd_powers.jpg')}}" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img src="{{asset('frontend/images/awards.jpg')}}" alt="" class="img-responsive">
                        </div>
                    </div>

                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row">
                <div class="col-md-6 center">
                    <img src="{{asset('frontend/images/retreat.jpg')}}" alt="" class="img-responsive">
                </div>
                <div class="col-md-6">

                    <h4>Top Agent Retreat</h4>
                    <h6>
                        <span class="firstcharacter2" style="font-size: 55px;line-height: 55px;">T</span>he view from the top isn’t so bad. Each year, CENTURY 21 Scheetz rolls out the gold carpet for the top tier of agents with its annual Top Agent Retreat. These agents gallivant to spectacular locations – such as Hawaii, the Bahamas, San Diego and Las Vegas – and get treated like kings and queens.
                    </h6>

                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row">
                <div class="col-md-6">

                    <h4>CENTURY 21 Scheetz Charitable Foundation</h4>
                    <h6>
                        <span class="firstcharacter2" style="font-size: 55px;line-height: 55px;">O</span>ur CENTURY 21 Scheetz Charitable Foundation is a non-profit organization committed to helping people in Indianapolis communities. While assisting others, CENTURY 21 Scheetz agents get to benefit from serving a stronger community and a better place for clients to call home.
                    </h6>
                    <p class="center"><a href="http://www.century21scheetz.com/About_Us/Charitable_Foundation" target="_blank" class="btn btn-lg btn-primary">Learn How You Can Help</a></p>
                </div>
                <div class="col-md-6 center">
                    <img src="{{asset('frontend/images/foundation_2.jpg')}}" alt="" class="img-responsive">
                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row mbottom70">
                <div class="col-md-6">

                    <h4>Sustaining Careers</h4>
                    <h6>
                        <span class="firstcharacter2" style="font-size: 55px;line-height: 55px;">C</span>ENTURY 21 Scheetz is able to boast one of the highest per agent productivity rates in the market, and also uses its strategically-placed offices to provide market-driven expertise in every area of the city.
                    </h6>

                </div>
                <div class="col-md-6">

                    <h4>Investing in Agent Success</h4>
                    <h6>
                        <span class="firstcharacter2" style="font-size: 55px;line-height: 55px;">O</span>ur local and global marketing strategies add clout to your presence in the marketplace. But, our significant investments in agent education, market research and a goldmine of other resources and tools equip agents to be in the driver’s seat of their careers.
                    </h6>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer-scripts')
    <script type="text/javascript"> /* Owl Carousel */
        $(document).ready(function() {
            $("#award_images").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds

                items : 1,
                autoPlay : true,
                navigation : true,
                pagination : false,
                navigationText: [
                    "<i class='icon-angle-left animation'></i>",
                    "<i class='icon-angle-right animation'></i>"
                ],
            });
        });
    </script>
@endsection
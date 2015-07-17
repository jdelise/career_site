@extends('app')
@section('title','Indianapolis Career In Real Estate')
@section('description','')
@section('main-content')
    <div id="slideshow" class="mbottom90">
        <div class="tp-banner-container">
            <div class="tp-banner" id="revslider1">
                <ul>
                    <!-- SLIDE 1 -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('frontend/images/slideshow/slide1.jpg')}}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption sfb firstslide"
                             data-x="0"
                             data-y="80"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="1000"
                             data-start="1000"
                             data-easing="Power3.easeInOut"
                             data-endspeed="300"
                             style="z-index: 2"><img src="{{asset('frontend/images/c21logo.png')}}" alt="">
                        </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption lfr firstslide"
                             data-x="right"
                             data-y="150"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="1000"
                             data-start="1000"
                             data-easing="Power3.easeInOut"
                             data-endspeed="300"
                             style="z-index: 2">
                            <h2 style="text-align:center"> A Culture of <span class="second-span">Opportunity</span></h2>
                        </div>

                    </li>
                    <!-- SLIDE 2 -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="{{ asset('frontend/images/slideshow/slide2.jpg') }}"  alt="slidebg2"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat"/>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption sfl secondslide"
                             data-x="left"
                             data-y="150"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="1000"
                             data-start="1000"
                             data-easing="Power3.easeInOut"
                             data-endspeed="300"
                             style="z-index: 2">
                            <h2> <span class="second-span">Inspiring</span> Success</h2>
                        </div>
                        <div class="tp-caption sfb firstslide"
                             data-x="right"
                             data-y="80"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="1000"
                             data-start="1000"
                             data-easing="Power3.easeInOut"
                             data-endspeed="300"
                             style="z-index: 2"><img src="{{asset('frontend/images/c21logo.png')}}" alt="">
                        </div>
                        <!-- LAYER NR. 2 -->

                    </li>
                    <!-- SLIDE 3 -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('frontend/images/ipad-2.jpg')}}"  alt="slidebg2"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat"/>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption sft thirdslide"
                             data-x="center"
                             data-y="100"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="1000"
                             data-start="1000"
                             data-easing="Power3.easeInOut"
                             data-endspeed="300"
                             style="z-index: 2">
                            <h2><span class="second-span">Technology</span> Leaders</h2>
                        </div>


                    </li>

                </ul>
            </div>
        </div>
    </div><!-- end slideshow-->
    <div id="content">
        <div class="container mbottom100">
            <div class="row">
                <div class="col-sm-4">
                    <div class="services-box">

                        <h3>Interactive Business Plan</h3>
                        <p>How can you accomplish your goals without a business plan? Find out how much money you can make in real estate by completing our interactive business plan.</p>
                        <div class="left"><a href="{{ url('business_plan') }}" class="btn btn-primary">Get Started</a></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="services-box">

                        <h3>Career Assessment</h3>
                        <p>Are you the right fit for Real Estate? Do you think you have what it takes? Complete our personality assessment and find out immediately if you’re a match!</p>
                        <div class="left"><a href="{{url('personality_assessment')}}" class="btn btn-primary">Get Started</a></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="services-box">

                        <h3>Online Real Estate Course</h3>

                        <p>You can become a licensed Real Estate agent in just two weeks! Learn more about our online classes that are starting NOW!</p>
                        <div class="left"><a href="{{url('licensing')}}" class="btn btn-primary">Learn More</a></div>
                    </div>
                </div>
            </div>
        </div><!-- end services -->

        <div class="separator mbottom20"></div>
        <div class="container mbottom60">
            <div class="row">
                <h3 class="center">Five Reasons To Pursue A Career In Real Estate</h3>
                <div class="col-md-8 col-md-offset-2">
                    <div class="video-container" style="background:#000;">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/Y3xE0frE0HY?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div id="featured-projects" class="ptop50 pbottom70">

            <div class="portfolio-wrapper">
                <div class="portfolio-item">
                    <div class="item-image overlay overlay-effect">
                        <figure>
                            <a href="{{url('licensing')}}">
                                <img src="{{asset('frontend/images/projects/personal_development.jpg')}}" alt="">
                            </a>
                            <figcaption>
                                <h3>Licensing</h3>
                                <h5>How To Become An Agent</h5>

                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="portfolio-item">
                    <div class="item-image overlay overlay-effect">
                        <figure>
                            <a href="{{ url('personality_assessment') }}">
                                <img src="{{asset('frontend/images/projects/personality.jpg')}}" alt="">
                            </a>
                            <figcaption>
                                <h3>Career Assessment</h3>
                                <h5>Is Real Estate for you?</h5>

                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="portfolio-item">
                    <div class="item-image overlay overlay-effect">
                        <figure>
                            <a href="{{url('business_plan')}}">
                                <img src="{{asset('frontend/images/projects/img1.jpg')}}" alt="">
                            </a>
                            <figcaption>
                                <h3>Business Plan</h3>
                                <h5>Plan Your Career</h5>

                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="portfolio-item">
                    <div class="item-image overlay overlay-effect">
                        <figure>
                            <a href="{{url('training')}}">
                                <img src="{{asset('frontend/images/projects/training.jpg')}}" alt="">
                            </a>
                            <figcaption>
                                <h3>Training</h3>
                                <h5>One-on-one, Company-wide, Online, & Small Group Training</h5>

                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="portfolio-item">
                    <div class="item-image overlay overlay-effect">
                        <figure>
                            <a href="{{url('technology')}}">
                                <img src="{{ asset('frontend/images/projects/tech.jpg') }}" alt="">
                            </a>
                            <figcaption>
                                <h3>Technology</h3>
                                <h5>Technology Designed For You</h5>

                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="portfolio-item">
                    <div class="item-image overlay overlay-effect">
                        <figure>
                            <a href="{{url('culture')}}">
                                <img src="{{asset('frontend/images/projects/culture.jpg')}}" alt="">
                            </a>
                            <figcaption>
                                <h3>Culture of Opportunity</h3>
                                <h5>Your Culture Is Your Brand</h5>

                            </figcaption>
                        </figure>
                    </div>
                </div>



                <div class="portfolio-item">
                    <div class="item-image overlay overlay-effect">
                        <figure>
                            <a href="{{url('about_us/sales_support')}}">
                                <img src="{{ asset('frontend/images/projects/fun.jpg') }}" alt="">
                            </a>
                            <figcaption>
                                <h3>Agent Support</h3>
                                <h5>The Support You Deserve</h5>

                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="portfolio-item">
                    <div class="item-image overlay overlay-effect">
                        <figure>
                            <a href="{{url('uploads/Recruit_Americas_Heroes.pdf')}}" target="_blank">
                                <img src="{{asset('frontend/images/millitary.jpg')}}" alt="">
                            </a>
                            <figcaption>
                                <h3>America's Heros</h3>
                                <h5>Let Us Honor Your Sacrifice</h5>

                            </figcaption>
                        </figure>
                    </div>
                </div>

            </div>
        </div><!-- end #featured-projects -->
        <div class="container ptop50 pbottom70">
            <h2 class="section-title mbottom50">What's New From Inman News?</h2>
            <div class="row">
                <?php $i = 0; ?>
                @foreach($feed->channel->item as $item)
                <?php
                $month = date('m',strtotime($item->pubDate));
                $day = date('d',strtotime($item->pubDate));

                ?>
                @if($i > 3)


                <?php break; ?>
                @endif
                <div class="col-sm-3">
                    <div class="news-boxes mbottom35">
                        <div class="news-header">
                            <div class="fleft">
                                <span>{{$month}}</span>
                                <span>{{$day}}</span>
                            </div>
                            <div class="mleft65">
                                <h3>{{$item->title}}</h3>
                            </div>
                        </div>
                        <p class="mbottom30">{{$item->description}}</p>
                        <a href="{{$item->link}}" target="_blank">More info</a>
                    </div>
                </div>
                <?php $i++; //dd($item); ?>
                    @endforeach

            </div>
        </div><!-- end news -->
        <div id="team" class="ptop50 pbottom80">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 relative">
                        <h2 class="section-title">Meet Our Team of Business Builders</h2>
                        <div id="our-team">
                            @include('frontend.partials.team')

                        </div><!-- end our-team -->
                    </div>
                </div>
            </div>
        </div><!-- end team carousel -->
        <div class="buy">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <h2>Start with a <span>Rock Solid</span> Foundation!</h2>
                        <h5>Get started with a free interactive business plan</h5>
                    </div>
                    <div class="col-sm-3 center">
                        <a href="{{url('business_plan')}}" class="btn btn-default btn-default2">Start Now</a>
                    </div>
                </div>
            </div>
        </div><!-- end buy section-->
    </div><!-- end content -->
@endsection
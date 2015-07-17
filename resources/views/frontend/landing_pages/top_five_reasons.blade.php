@extends('app')
@section('title','Indianapolis Career In Real Estate - Top 5 Reasons')
@section('description','')
@section('main-content')

    <div class="content" style="margin-top: 156px">
        <div class="container">
            <div class="row mbottom70">
                <div class="col-md-12">
                    <h2>Top 5 Reasons to Pursue a Career in Real Estate</h2>
                    @include('flash::message')
                </div>
                <div class="col-md-8">

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <span style=" border: 1px solid #fff; padding: 1px 10px; margin-right: 18px; ">1</span>
                                        It’s Easy to Get Started
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    Becoming a licensed real estate broker is one of the few professional careers that
                                    you can get up and running very quickly and with very little financial investment.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        <span style=" border: 1px solid #fff; padding: 1px 10px; margin-right: 18px; ">2</span>
                                        Uncapped Earning Potential
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    With real estate, the sky’s the limit. You’re in control of how much money you make
                                    and how you structure your business. Unlike other careers, in real estate, you
                                    benefit directly from the amount of work you put in.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        <span style=" border: 1px solid #fff; padding: 1px 10px; margin-right: 18px; ">3</span>
                                        Ability to be Your Own Boss
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Instead of working long hours in a job that you aren’t excited about to make money
                                    for someone else, you could be working for yourself and reaping the benefits.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                        <span style=" border: 1px solid #fff; padding: 1px 10px; margin-right: 18px; ">4</span>
                                        Flexibility with Your Schedule
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">
                                    You do have the flexibility to determine what you work on and when. And this is a
                                    huge advantage if you can organize your work and personal schedule accordingly.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                        <span style=" border: 1px solid #fff; padding: 1px 10px; margin-right: 18px; ">5</span>
                                        Fulfilling Work
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Ultimately, the greatest advantage to working in the real estate industry is that
                                    you’re making a difference in people’s lives, right here in our community. You’re
                                    helping people’s dreams come true by helping a first-time home buyer find that
                                    perfect home, or help a family sell their home to pursue a new dream.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{url('licensing')}}"><img src="http://c21careernight.com/images/chalkboard.jpg"
                                                                alt="" class="img-responsive"></a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('career_assessment')}}"> <img
                                        src="http://c21careernight.com/images/personality.jpg" alt=""
                                        class="img-responsive"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style=" padding: 0 20px 20px; background: #f2f2f2; border: 1px solid #999; ">
                        <h3 style="color: maroon;">Download our free career PDF and get your new career started
                            now.</h3>

                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <img src="http://c21careernight.com/images/book.png" alt="" class="img-responsive">
                            </div>
                        </div>

                        <form action="{{url('top_5_reasons')}}" method="post">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <label for="name"><span style="color:red">*</span>Your Name:</label>


                                <input type="text" class="form-control" name="full_name"
                                       placeholder="Please enter your name" value="">
                                @if ($errors->has('full_name'))
                                    <div class="alert alert-danger" style="padding: 0px 5px;">
                                        Please enter your name
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email" class="margin-10"><span style="color:red">*</span>Email
                                    Address:</label>

                                <input type="text" name="email" class="form-control"
                                       placeholder="Enter a valid email address" value="">
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger" style="padding: 0px 5px;">
                                        Please enter a valid email address
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="phone"><span style="color:red">*</span>Best Phone:</label>

                                <input type="text" name="phone" class="form-control" placeholder="e.g. 317-555-5555"
                                       value="">
                                @if ($errors->has('full_name'))
                                    <div class="alert alert-danger" style="padding: 0px 5px;">
                                        Please enter your phone number
                                    </div>
                                @endif
                            </div>
                            <div class="center" style=" width: 80%; margin: 20px auto 0; ">
                                <input type="submit" class="btn btn-primary btn-large btn-block" value="Submit"
                                       style=" font-size: 1.6em; ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
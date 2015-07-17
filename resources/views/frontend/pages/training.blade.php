@extends('app')
@section('title','Indianapolis Career In Real Estate - Training')
@section('description','')
@section('main-content')

    <div class="header-breadcrumb page-header blended_learning mbottom50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section-title fleft">Training</h1>
                    <ul class="reset-list">
                        <li>
                            <p><a href="{{url('/')}}" style="color:#ffcc00">Home</a></p>
                        </li>
                        <li>/</li>
                        <li class="active">
                            <p>Training</p>
                        </li>
                    </ul>
                    <span id="current-date">{{ date('n D, Y')}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>CENTURY 21 Scheetz Training </h2>
                    <h6>Here at CENTURY 21 Scheetz we have various platforms of learning which is why we call our
                        training program a blended learning program. From one-on-one coaching, company-wide learning,
                        online webinars, mentoring and small group learning sessions, CENTURY 21 Scheetz agents are
                        provided with continuous career development opportunities </h6>
                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row">
                <div class="col-md-6">

                    <p class="gray" style="font-size: 25px;line-height: 38px;">
                        <span class="firstcharacter2" style="font-size: 55px;line-height: 55px;">W</span>e jumpstart
                        your career with our in-depth two-week Scheetz Advantage Workshop. You will learn how to work
                        with buyers and sellers, how to find and grow your business, and how your value coupled with the
                        CENTURY 21 Scheetz brand provides opportunities and open doors.
                    </p>

                </div>
                <div class="col-md-6 center">
                    <img src="{{asset('frontend/images/class_room.jpg')}}" alt="" class="img-responsive img-thumbnail">
                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('frontend/images/small_group.png')}}" alt="" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <p class="gray" style="font-size: 25px;line-height: 38px;">
                        <span class="firstcharacter2" style="font-size: 55px;line-height: 55px;">I</span>n addition to
                        the initial Scheetz Advantage training for ALL new agents to the office and our online library
                        of training courses, we have weekly small group training at each branch office. Whether you are
                        new to real estate or a seasoned professional our training will provide a profound benefit to
                        your business.
                    </p>
                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row mbottom70">
                <div class="col-md-6">
                    <p class="gray" style="font-size: 25px;line-height: 38px;">
                        <span class="firstcharacter2" style="font-size: 55px;line-height: 55px;">O</span>ur online
                        training library provides 100+ courses to help satisfy your specific training needs. The
                        convenience of online learning allows you to sharpen your skills any day, any time, anywhere.
                        Click below for guest access to our online training portal.
                    </p>

                    <p class="center"><a href="#guest_access" class="btn btn-lg btn-primary" data-toggle="modal">Request Guest
                            Access Now</a></p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('frontend/images/elearning.jpg')}}" alt="" class="img-responsive img-thumbnail">
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="guest_access" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Request Guest Access</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box blue" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">

                                    </div>
                                </div>
                                <div class="portlet-body form">
                                   <div class="row">
                                       <div class="col-md-12">
                                           <form action="{{url('front_ajax/guest_access_submit')}}" class=""
                                                 id="submit_form" method="POST">
                                               <div class="form-group">
                                                   <label for="full_name">Full Name:</label>
                                                   <input type="text" placeholder="Please enter your full name" name="full_name"
                                                          class="form-control">
                                               </div>
                                               <div class="form-group">
                                                   <label for="email">Email Address:</label>
                                                   <input type="text" name="email" placeholder="Your email address"
                                                          class="form-control">
                                               </div>
                                               <div class="form-group">
                                                   <label for="phone_number">Best Phone:</label>
                                                   <input type="text" name="phone_number" class="form-control"
                                                          placeholder="e.g. 555-555-5555">
                                               </div>
                                               <div class="form-group">
                                                   <input type="submit" value="Submit" class="btn btn-primary pull-right"/>
                                               </div>
                                           </form>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@if(isset($_GET['landing']) && $_GET['landing'] != '')
@else
    <div id="main-menu">
        <ul>
            <li class="{{setActive('/')}}">
                <a href="{{url('/')}}">Home</a>
            </li>
            <li class="{{setActive('licensing')}}">
                <a href="{{url('licensing')}}">Licensing</a>
            </li>
            <li class="{{setActive('career_assessment')}}">
                <a href="{{url('career_assessment')}}">Career Assessment</a>
            </li>
            <li class="{{setActive('business_plan')}}">
                <a href="{{url('business_plan')}}">Business Plan</a>
            </li>
            <li class="{{setActive('training')}}">
                <a href="{{url('training')}}">Training</a>
            </li>
            <li class="{{setActive('technology')}}">
                <a href="{{url('technology')}}">Technology</a>
            </li>
            <!-- Mega menu -->
            <li class="has-sub mega {{setActive('about_us')}}">
                <a href="#">About Us</a>
                <ul class="mega-menu container clearfix">
                    <li class="col-sm-3">
                        <a href="{{url('about_us/culture')}}" class="mega-title">Culture</a>

                        <a href="{{url('about_us/culture')}}"><img src="{{asset('frontend/images/nav_foundation.jpg')}}"
                                                                   class="img-responsive" alt=""></a>

                    </li>
                    <li class="col-sm-3">
                        <a href="{{url('about_us/agent_support')}}" title="Agent Support" class="mega-title">Agent
                            Support</a>


                        <a href="{{url('about_us/agent_support')}}" title="Agent Support"><img
                                    src="{{asset('frontend/images/nav_you.jpg')}}" class="img-responsive" alt=""></a>


                    </li>
                    <li class="col-sm-3">
                        <a href="#" class="mega-title">Testimonials</a>
                        <ul class="sub-menu clearfix">
                            <li>
                                <a href="#">"CENTURY 21 Scheetz provides terrific support and
                                    constant..."</a>
                            </li>
                            <li>
                                <a href="#">"Scheetz has helped me significantly grow my real
                                    estate career..."</a>
                            </li>
                            <li>
                                <a href="#">"Why would I work any place else?"</a>
                            </li>

                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <a href="{{url('contact_us')}}" class="mega-title">Contact Us</a>
                        <ul class="sub-menu clearfix">
                            <li>
                                <form action="{{url('contact_us')}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="hidden" name="subject" value="Navigation Contact Us Form"/>
                                    <input type="text" class="form-control mbottom10" name="name" placeholder="Your Name (required)">
                                    <input type="text" class="form-control mbottom10" name="phone" placeholder="Your Phone (required)">
                                    <input type="text" class="form-control mbottom10" name="email" placeholder="Your Email (required)">
							   							<textarea name="comments" id="" cols="10" rows="5"
                                                                  class="form-control mbottom10" placeholder="How can we help your career out?">

							   							</textarea>
                                    <input type="submit" class="btn btn-primary pull-right">
                                </form>
                                <!-- <a href="timeline-page.html">Timeline Page</a> -->
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>
            <!-- End Mega Menu -->
        </ul>
    </div><!-- end main menu -->
@endif

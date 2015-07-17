@extends('app')
@section('title','Indianapolis Career In Real Estate - Are You A Good Fit?')
@section('description','')
@section('main-content')

    <div class="header-breadcrumb page-header default mbottom50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section-title fleft">Career Assessment</h1>
                    <ul class="reset-list">
                        <li>
                            <p><a href="{{url('/')}}" style="color:#ffcc00">Home</a></p>
                        </li>
                        <li>/</li>
                        <li class="active">
                            <p>Career Assessment</p>
                        </li>
                    </ul>
                    <span id="current-date"><?php echo date('n D, Y'); ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 >Are You A Match?</h2>
                    <h5>We are often asked what type of personality makes the most successful Real Estate Agent. Well, we have an easy way for you to find out, take our Career Assessment to see if you have what it takes to be a Real Estate Professional. Here are some additional questions to ask yourself.</h5>
                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row">
                <div class="col-md-7">



                    <h6><i class="fa fa-check-circle-o" style="color: #ffcc00;font-weight: normal;font-size: 1.6em;margin-left: 25px;"></i> Are you determined to succeed?</h6>
                    <h6><i class="fa fa-check-circle-o" style="color: #ffcc00;font-weight: normal;font-size: 1.6em;margin-left: 25px;"></i> Do you have an entrepreneurial spirit?</h6>
                    <h6><i class="fa fa-check-circle-o" style="color: #ffcc00;font-weight: normal;font-size: 1.6em;margin-left: 25px;"></i> Do you want to be in control of your financial achievements? </h6>
                    <h6><i class="fa fa-check-circle-o" style="color: #ffcc00;font-weight: normal;font-size: 1.6em;margin-left: 25px;"></i> Are you self-motivated?</h6>
                    <p class="center"><a href="http://c21scheetz.agenttype.com/" data-toggle="" target="_blank" class="btn btn-lg btn-primary">Test Your Personality</a></p>

                </div>
                <div class="col-md-5">
                    <img src="{{asset('frontend/images/personality_2.jpg')}}" alt="" class="img-responsive img-thumbnail">
                </div>
            </div>
            <div class="separator mtop30 mbottom30"></div>
            <div class="row mbottom70">
                <div class="col-md-12 center">
                    <h6>If you answered yes to these questions we would love to talk with you! CENTURY 21 Scheetz is looking for top talent and you might have what we are looking for. <a href="{{url('contact_us')}}">Contact us today</a> and learn more about the opportunities available.</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-modal-lg" id="personality_model" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Career Assessment</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box blue" id="">

                                <div class="portlet-body form">
                                    <div class="video-container" style="">
                                        <iframe src="http://c21scheetz.agenttype.com/" frameborder="0"></iframe>
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
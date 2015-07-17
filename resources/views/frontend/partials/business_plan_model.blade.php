<div class="modal fade bs-modal-lg" id="business_plan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Interactive Business Plan</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box blue" id="form_wizard_1">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Business Plan - <span class="step-title">
									Step 1 of 4 </span>
                                </div>
                                <div class="tools hidden-xs">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config">
                                    </a>
                                    <a href="javascript:;" class="reload">
                                    </a>
                                    <a href="javascript:;" class="remove">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form action="{{url('front_ajax/business_plan_submit')}}" class="form-horizontal" id="submit_form" method="POST">
                                    <input type="hidden" name="_token" id="token" value="{{csrf_token()}}"/>
                                    <div class="form-wizard">
                                        <div class="form-body">
                                            <ul class="nav nav-pills nav-justified steps">
                                                <li>
                                                    <a href="#tab1" data-toggle="tab" class="step">
													<span class="number">
													1 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Personal Info </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab2" data-toggle="tab" class="step">
													<span class="number">
													2 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Additional Info </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab3" data-toggle="tab" class="step">
													<span class="number">
													3 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Income Goals </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab4" data-toggle="tab" class="step">
													<span class="number">
													4 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Results </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div id="bar" class="progress progress-striped" role="progressbar">
                                                <div class="progress-bar progress-bar-success">
                                                </div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="alert alert-danger" style="display: none;">
                                                    <button class="close" data-dismiss="alert"></button>
                                                    You have some form errors. Please check below.
                                                </div>
                                                <div class="alert alert-success" style="display: none">
                                                    <button class="close" data-dismiss="alert"></button>
                                                    Your form validation is successful!
                                                </div>
                                                <div class="tab-pane active" id="tab1">
                                                    <h3 class="block">Please provide your personal info</h3>
                                                    <div class="form-group">

                                                        <label class="control-label col-md-3">First Name: <span class="required">
														* </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="first_name" id="first_name"/>
															<span class="help-block">
															Provide your first name </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Last Name: <span class="required">
														* </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="last_name" id="last_name"/>
															<span class="help-block">
															Provide your last name. </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email <span class="required">
														* </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="email" id="email"/>
															<span class="help-block">
															Provide your email address </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <h3 class="block">Please provide your personal info</h3>
                                                    <div class="form-group">

                                                        <label class="control-label col-md-3">Phone Number: <span class="required">
														* </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="phone" id="phone"/>
															<span class="help-block">
															Provide your phone number </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Your Current License Status: <span class="required">
														* </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select type="text" class="form-control" name="license_status" id="license_status">
                                                                <option value="">Please Select</option>
                                                                @foreach($license_status as $level)
                                                                    <option value="{{$level}}">{{$level}}</option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                    </div>
                                                    {{--Only show if in school--}}
                                                    <div class="form-group" id="school_div" style="display: none">
                                                        <label class="control-label col-md-3">What School Are You In?:
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select type="text" class="form-control" name="school" id="school">
                                                                <option value="">Please Select</option>
                                                                @foreach($real_estate_schools as $school)
                                                                    <option value="{{$school}}">{{$school}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{--only show if experianced--}}
                                                    <div class="form-group" id="current_agent" style="display: none">
                                                        <label class="control-label col-md-3">What Brokerage Are You With?:
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" name="brokerage" class="form-control"/>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab3">
                                                    <h3 class="block">Provide your income goals</h3>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Desired Income <span class="required">
														* </span>
                                                        </label>
                                                        <div class="col-md-4">

                                                            <select name="goal_amount" class="form-control" id="goal_amount">
                                                                <option value="">Please Select...</option>
                                                                <option value="50000">$50,000</option>
                                                                <option value="75000">$75,000</option>
                                                                <option value="100000" selected>$100,000</option>
                                                                <option value="125000">$125,000</option>
                                                                <option value="150000">$150,000</option>
                                                                <option value="175000">$175,000</option>
                                                                <option value="200000">$200,000</option>
                                                                <option value="250000">$250,000</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Average Sales Price <span class="required">
														* </span>
                                                        </label>
                                                        <div class="col-md-4">

                                                            <select name="sales_price" class="form-control" id="sales_price">
                                                                <option value="">Please Select...</option>
                                                                <option value="50000">$50,000</option>
                                                                <option value="75000">$75,000</option>
                                                                <option value="100000">$100,000</option>
                                                                <option value="125000">$125,000</option>
                                                                <option value="150000" selected>$150,000</option>
                                                                <option value="175000">$175,000</option>
                                                                <option value="200000">$200,000</option>
                                                                <option value="250000">$250,000</option>
                                                                <option value="300000">$300,000</option>
                                                                <option value="350000">$350,000</option>
                                                                <option value="400000">$400,000</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab4">
                                                    <h3 class="block"><span id="customer_name"></span></h3>
                                                    <div id="your_results" style="display:none">


                                                    </div>
                                                    <div class="separator"></div>
                                                    <h4 class="mtop20 mbottom10">Here's a quick break down</h4>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            Buyers Taken
                                                            <h6 id="buyers_taken"></h6>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            Buyers Closed
                                                            <h6 id="buyers_closed"></h6>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            Listings Taken
                                                            <h6 id="listings_taken"></h6>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            Listings Closed
                                                            <h6 id="listings_closed"></h6>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9 loading" style="display:none">
                                                    <img src="{{asset('backend/img/ajax-loading.gif')}}" alt="">
                                                </div>
                                                <div class="col-md-offset-3 col-md-9" id="not_loading">
                                                    <a href="javascript:;" class="btn btn-info button-previous">
                                                        <i class="m-icon-swapleft"></i> Back </a>
                                                    <a href="javascript:;" class="btn btn-primary button-next">
                                                        Continue <i class="m-icon-swapright m-icon-white"></i>
                                                    </a>
                                                    <a href="javascript:;" class="btn btn-success button-submit">
                                                        Submit <i class="m-icon-swapright m-icon-white"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
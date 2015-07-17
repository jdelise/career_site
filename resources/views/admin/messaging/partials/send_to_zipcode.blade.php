<div class="row clearfix">
    <div class="col-sm-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Draft New Message</h3>
            </div>
            <div class="box-body form">
                <!-- BEGIN FORM-->

                <form class="form-horizontal form-bordered form-row-stripped" data-remote
                      action="{{action('TextMessagingController@sendToZipcode')}}">
                    <input type="hidden" id="token" value="{{csrf_token()}}" name="_token"/>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Lead Id:</label>

                            <div class="col-md-9">
                                <input type="text" name="lead_id" id="lead_id" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Zipcode:</label>

                            <div class="col-md-9">
                                <input type="text" name="zipcode" id="zipcode" data-required="1" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">City:</label>

                            <div class="col-md-9">
                                <input type="text" name="city" id="city" data-required="1" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Price:</label>

                            <div class="col-md-9">
                                <input class="form-control" name="price" id="mask_currency" size="16"
                                       type="text" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Date:</label>

                            <div class="col-md-9">
                                <input class="form-control date-picker" name="appointment_date" id="appointment_date"
                                       size="16" type="text" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Time:</label>

                            <div class="col-md-9">
                                <div class="input-icon">
                                    <i class="fa fa-clock-o"></i>
                                    <input type="text" id="appointment_time"
                                           class="form-control timepicker timepicker-default"
                                           name="appointment_time">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Short Message:</label>

                            <div class="col-md-9">
                                    <textarea name="message" id="message" class="form-control">
                                        </textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green"><i class="fa fa-check"></i> Send Message
                                </button>
                                <a href="{{url('admin/create_text_message')}}" class="btn default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
    <div class="col-sm-6">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Activity Display
                </h3>
            </div>
            <div class="box-body">
                <div id="activityList" style="display: none;">

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@extends('admin')
@section('page_title','Thank you ' . $survey->user->first_name . ' for taking the survey!')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Survey for {{$survey->recruit->first_name}} {{$survey->recruit->last_name}}</h3>
                </div>
                <div class="box-body">
                    <form action="{{url('admin/survey/save')}}" method="post">
                        <input type="hidden" name="completed" value="1"/>
                        <input type="hidden" name="id" value="{{$survey->id}}"/>
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <h5>Did {{$survey->recruit->first_name}} show up to the interview? </h5>
                            <label class="radio-inline">
                                <input type="radio" id="recruit_show1" name="recruit_show" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="recruit_show2" name="recruit_show" value="0"> No
                            </label>

                        </div>
                        <div class="form-group">
                            <h5>Is {{$survey->recruit->first_name}} currently employed? </h5>
                            <label class="radio-inline">
                                <input type="radio" id="is_employed1" name="is_employed" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="is_employed2" name="is_employed" value="0"> No
                            </label>

                        </div>
                        <div class="form-group">
                            <h5>Would {{$survey->recruit->first_name}} need to transition into real estate from part time to full time?</h5>
                            <label class="radio-inline">
                                <input type="radio" id="should_transition_pt_full1" name="should_transition_pt_full" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="should_transition_pt_full2" name="should_transition_pt_full" value="0"> No
                            </label>
                        </div>
                        <div class="form-group">
                            <h5>What is the recommended follow up for {{$survey->recruit->first_name}}?</h5>
                            <select name="recommended_action" id="recommended_action" class="form-control">
                                <option value="">Please select...</option>
                                <option value="Phone call from Manager">Phone call from manager</option>
                                <option value="Phone call from recruiter">Phone call from recruiter. <small>Answer in the comment section</small></option>
                                <option value="No follow up - candidate did not meet company expectations">No follow up - candidate did not meet company expectations</option>
                                <option value="No follow up - candidate has been hired">No follow up - candidate has been hired</option>
                                <option value="No follow up - candidate is an experienced agent and will continue follow up through the manager">No follow up - candidate is an experienced agent and will continue follow up through the manager</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5>Next follow up date ( you or recruiter )</h5>
                            <input type="text" name="next_followup_date" class="form-control date-picker"/>
                        </div>
                        <div class="form-group">
                            <h5>Is {{$survey->recruit->first_name}} interviewing with other brokerages?</h5>
                            <label class="radio-inline">
                                <input type="radio" id="interviewing_brokerage1" name="interviewing_brokerages" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="interviewing_brokerage2" name="interviewing_brokerages" value="0"> No
                            </label>
                        </div>
                        <div class="form-group">
                            <h5>Brokerage Name:</h5>
                            <input type="text" name="brokerage_name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <h5>How would you rate {{$survey->recruit->first_name}} on a scale from 1 - 10 ( 10 being the best )</h5>
                            <label class="radio-inline">
                                <input type="radio"  name="rating" value="1"> 1
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" value="2"> 2
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" value="3"> 3
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" value="4"> 4
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" value="5"> 5
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" value="6"> 6
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" value="7"> 7
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" value="8"> 8
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" value="9"> 9
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" value="10"> 10
                            </label>
                        </div>
                        <div class="form-group">
                            <h5>Comments Section</h5>
                            <textarea name="comments" id="comments" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit Survey" class="btn btn-primary pull-right"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
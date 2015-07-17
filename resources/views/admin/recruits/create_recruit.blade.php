@extends('admin')
@section('page_title','New Recruit')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Add a new recruit</h3>
                </div>
                <div class="box-body">
                    <form action="{{url('admin/recruiting/add_recruit')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name">Last Name:</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name">Phone Number:</label>
                                    <input type="text" name="phone_1" class="form-control" placeholder="e.g. (317)555-5555"/>
                                </div>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div class="separator"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email Address"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Assigned To:</label>
                                    <select name="user_id" class="form-control">
                                        <option value="">Please Choose...</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" {{setSelected($user->id,Auth::user()->id)}}>{{$user->first_name}} {{$user->last_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="experience_level">Experience Level</label>
                                <select name="experience_level" id="" class="form-control">
                                    <option value="">Please select</option>
                                    @foreach($levels as $level)
                                        <option value="{{$level->level}}">{{$level->level}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="brokerage">Brokerage</label>
                                <input type="text" class="form-control" name="brokerage_name" placeholder="e.g. F.C. Tucker"/>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="real_estate_school">Real Estate School</label>
                                    <select name="real_estate_school" id="" class="form-control">
                                        <option value="">Please select</option>
                                        @foreach($schools as $school)
                                            <option value="{{$school->school_name}}">{{$school->school_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address">Street Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Street address"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                               <div class="form-group">
                                   <label for="city">City</label>
                                   <input type="text" name="city" class="form-control" placeholder="City"/>
                               </div>
                            </div>
                            <div class="col-md-2">
                               <div class="form-group">
                                   <label for="state">State:</label>
                                   <input type="text" name="state" value="IN" class="form-control"/>
                               </div>
                            </div>
                            <div class="col-md-3">
                               <div class="form-group">
                                   <label for="zip_code">Zip Code:</label>
                                   <input type="text" name="zip_code" class="form-control" placeholder="Zip Code"/>
                               </div>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{url('admin/recruiting/my_dashboard')}}">Cancel</a>
                                    <input type="submit" value="Add Recruit" class="btn btn-primary pull-right"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
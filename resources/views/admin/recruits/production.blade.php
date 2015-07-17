<div class="box">
    <div class="box-header">
        <h3 class="box-title">Agent Production</h3>
        <div class="actions pull-right">
            @if($recruit->synced == 0)
                <a href="{{url('admin/mibor_sync/sync-agent-production')}}/{{$recruit->id}}/{{$recruit->mls_id}}" class="btn btn-circle btn-default" data-toggle="modal">
                    <i class="fa fa-plus"></i> Sync Production </a>
            @else
                <form class="form-inline pull-right" action="{{url('admin/recruiting')}}/{{$recruit->id}}" method="get">
                    <input type="hidden" name="start_date" id="start_date"/>
                    <input type="hidden" name="end_date" id="end_date"/>
                    <div class="form-group">
                        <small id="reportrange"><span></span></small>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default pull-right" id="daterange-btn">
                            <i class="fa fa-calendar"></i> Date range
                            <i class="fa fa-caret-down"></i>
                        </button>
                    </div>
                    {{--<div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="minimal" name="past"> Compare?
                            </label>
                        </div>
                    </div>--}}
                    <div class="form-group">
                        <input type="submit" value="Go" class="btn btn-primary"/>
                    </div>
                </form>
            @endif

        </div>
    </div>
    <div class="box-body">
        @if($numbers)
            <div class="row">
                <div class="col-md-4">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$numbers['buyer_sides']->count()}}</h3>

                            <p>Closed Buyers</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>

                        <div class="hide">
                            <ul>
                                @foreach($numbers['buyer_sides'] as $buyers)

                                    <li>{{$buyers->StreetNumber}} {{$buyers->StreetName}}
                                        , {{$buyers['City']}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-money"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-number">Buyers Closed</span>
                            <span class="info-box-number">${{number_format($numbers['buyer_sides']->sum('ClosePrice'),2)}}</span>

                        </div>
                        <!-- /.info-box-content -->
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$numbers['listings_sold']->count()}}</h3>

                            <p>Listings Sold</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>

                        <div class="hide">
                            <ul>
                                @foreach($numbers['listings_sold'] as $listing)

                                    <li>{{$listing->StreetNumber}} {{$listing->StreetName}}
                                        , {{$listing->City}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-money"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-number">Listings Closed</span>
                            <span class="info-box-number">${{number_format($numbers['listings_sold']->sum('ClosePrice'),2)}}</span>

                        </div>
                        <!-- /.info-box-content -->
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$numbers['listings_taken']->count()}}</h3>

                            <p>Listings Taken</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>

                        <div class="hide">
                            <ul>
                                @foreach($numbers['listings_taken'] as $listing)

                                    <li>{{$listing->StreetNumber}} {{$listing->StreetName}}
                                        , {{$listing->City}} - {{$listing->Status}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-money"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-number">Total Closed</span>
                            <span class="info-box-number">${{number_format($numbers['listings_sold']->sum('ClosePrice') + $numbers['buyer_sides']->sum('ClosePrice'),2)}}</span>


                        </div>
                        <!-- /.info-box-content -->
                    </div>


                </div>
            </div>
            <hr/>
            <canvas id="myChart" style="width: 300px;height: 100px"></canvas>

        @endif

    </div>
</div>

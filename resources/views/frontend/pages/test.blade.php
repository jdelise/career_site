@extends('app')
@section('title','Indianapolis Career In Real Estate - Business Plan')
@section('description','')
@section('header_content')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/sliders.css') }}" media="screen"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/sample.css') }}" media="screen"/>
@stop
@section('main-content')
    <div class="header-breadcrumb page-header default mbottom50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section-title fleft">Your Business Plan</h1>
                    <ul class="reset-list">
                        <li>
                            <p><a href="{{url('/')}}" style="color:#ffcc00">Home</a></p>
                        </li>
                        <li>/</li>
                        <li class="active">
                            <p>Your Business Plan</p>
                        </li>
                    </ul>
                    <span id="current-date">{{date('n D, Y')}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-5">
                    <form action="" id="business_plan_form" class="form-horizontal">
                        <div class="form-group">
                            <label for="income_goal">Income Goal:</label>

                            <select name="income-goal" id="income-goal" class="form-control" value="100000">
                                <option value="50000">$50,000</option>
                                <option value="50000">$75,000</option>
                                <option value="50000" selected>$100,000</option>
                                <option value="50000">$125,000</option>
                                <option value="50000">$150,000</option>
                                <option value="50000">$175,000</option>
                                <option value="50000">$200,000</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-sm-5 col-sm-offset-2">
                    <h3>Results</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer-scripts')
    <script src="{{asset('frontend/js/sliders.min.js')}}"></script>
    <script>
        var priceValue;
        var commissionSlider = $('#commission').bootstrapSlider({
            formatter: function (value) {
                return value + '%';
            },

        });
        var priceSlider = $("#price").bootstrapSlider({
            formatter: function (value) {
                return '$ ' + value;
            },

            step: 25000,
            min: 0,
            max: 300000,
            tooltip: 'always',
            value: 75000
        });
        priceSlider.on("slide", function (slideEvt) {
            priceValue = priceSlider.bootstrapSlider('getValue');
            $("#units").text('$' + priceValue);
        });
        function calculate() {

        }
    </script>
@stop
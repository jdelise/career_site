@extends('admin')
@section('page_title','Messaging Control')
@stop
@section('content')
    <div class="tabbable-custom nav-justified">
        <ul class="nav nav-tabs nav-justified">
            <li class="active">
                <a href="#tab_1_1_1" data-toggle="tab" aria-expanded="false">
                    Send Text To Zip Code </a>
            </li>
            {{--<li class="">
                <a href="#tab_1_1_2" data-toggle="tab" aria-expanded="true">
                    Send Text To Group </a>
            </li>
            <li>
                <a href="#tab_1_1_3" data-toggle="tab">
                    Send Text To Person </a>
            </li>--}}
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1_1_1">

                <div class="clearfix">
                    @include('admin.messaging.partials.send_to_zipcode')
                </div>
            </div>
           {{-- <div class="tab-pane" id="tab_1_1_2">
                <p>
                    Howdy, I'm in Section 2.
                </p>
                <p>
                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.
                </p>
                <p>
                    <a class="btn green" href="ui_tabs_accordions_navs.html#tab_1_1_2" target="_blank">
                        Activate this tab via URL </a>
                </p>
            </div>
            <div class="tab-pane" id="tab_1_1_3">
                <p>
                    Howdy, I'm in Section 3.
                </p>
                <p>
                    Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat
                </p>
                <p>
                    <a class="btn yellow" href="ui_tabs_accordions_navs.html#tab_1_1_3" target="_blank">
                        Activate this tab via URL </a>
                </p>
            </div>--}}
        </div>
    </div>

    @include('admin.partials.forms.errors')
@stop
@section('footer-content')
    <script href="{{asset('backend/scripts/messaging_helper.js')}}"></script>
@stop


<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i>Additional Information
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse" data-original-title="" title="">
            </a>
            <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
            </a>
            <a href="javascript:;" class="reload" data-original-title="" title="">
            </a>
            <a href="javascript:;" class="remove" data-original-title="" title="">
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="panel-group accordion" id="accordion3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1" aria-expanded="true">
                            Quick Info </a>
                    </h4>
                </div>
                <div id="collapse_3_1" class="panel-collapse collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                @include('admin.recruits.task_widget')
                            </div>
                            <div class="col-md-4">
                                <div class="portlet light">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span class="caption-subject bold font-purple-plum">
                                                Assigned To
                                            </span>
                                        </div>
                                    </div>
                                    <div class="portlet-body center">
                                        <h3></h3>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2" aria-expanded="false">
                            Notes </a>
                    </h4>
                </div>
                <div id="collapse_3_2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body" style="height:200px; overflow-y:auto;">
                        {{--@foreach($recruit->note as $note)
                            {{$note}}
                            @endforeach--}}
                    </div>
                </div>
            </div>
            {{--<div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3" aria-expanded="false">
                            Collapsible Group Item #3 </a>
                    </h4>
                </div>
                <div id="collapse_3_3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <p>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                        </p>
                        <p>
                            Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                        </p>
                        <p>
                            <a class="btn green" href="ui_tabs_accordions_navs.html#collapse_3_3" target="_blank">
                                Activate this section via URL </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_4" aria-expanded="false">
                            Collapsible Group Item #4 </a>
                    </h4>
                </div>
                <div id="collapse_3_4" class="panel-collapse collapse" aria-expanded="false">
                    <div class="panel-body">
                        <p>
                            Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                        </p>
                        <p>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                        </p>
                        <p>
                            Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
                        </p>
                        <p>
                            <a class="btn red" href="ui_tabs_accordions_navs.html#collapse_3_4" target="_blank">
                                Activate this section via URL </a>
                        </p>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
</div>
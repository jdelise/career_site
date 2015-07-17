<div class="box">
    <div class="box-header">
        <h3 class="box-title">Additional Information</h3>
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
    <div class="box-body">
        <div class="panel-group accordion" id="accordion3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1" aria-expanded="true">
                             Tasks </a>
                    </h4>
                </div>
                <div id="collapse_3_1" class="panel-collapse collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('admin.recruits.task_widget')
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
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">
                                    Notes for {{$recruit->first_name}} {{$recruit->last_name}}
                                </h3>
                                <div class="actions pull-right">
                                    <a href="#add_note" class="btn btn-circle btn-default" data-toggle="modal">
                                        <i class="fa fa-plus"></i> Add </a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="notes">
                                @foreach($recruit->notes as $note)
                                    <div class="note">
                                        {{$note->created_at->format('M d Y')}} -
                                        {{$note->body}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--<div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3" aria-expanded="false">
                            Activity Feed </a>
                    </h4>
                </div>
                <div id="collapse_3_3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">

                    </div>
                </div>
            </div>--}}
        </div>
    </div>
</div>
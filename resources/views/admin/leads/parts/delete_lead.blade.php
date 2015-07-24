<div class="modal fade" id="deleteLead" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Are you sure you want to delete this lead?</h4>
            </div>
            <form action="{{url('admin/leads')}}/{{$lead->id}}" class="" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="_method" value="DELETE"/>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="recruit_id">Please type DELETE to confirm.</label>
                            <input type="text" class="form-control" value="" name="confirm_delete">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <input type="submit" value="Save" class="btn blue">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
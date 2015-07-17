<div class="modal fade" id="add_image" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add a new note</h4>
            </div>
            <form action="{{url('admin/recruiting/update_profile_img')}}" class="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="recruit_id" id="recruit_id" value="{{$recruit->id}}"/>
                            <input type="file" name="file"/>
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
<div class="modal fade" id="add_note" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add a new note</h4>
            </div>
            <form action="{{url('admin/create_note')}}" class="" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="recruit_id">Recruit:</label>
                                <input type="hidden" name="recruit_id" id="recruit_id" value="{{$recruit->id}}"/>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                                <input type="text" class="form-control" value="{{$recruit->first_name}} {{$recruit->last_name}}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-12">
                            <label for="note">Add note:</label>
                            <textarea name="note" id="note" cols="30" rows="10" class="form-control"></textarea>
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
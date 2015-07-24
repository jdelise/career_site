<div class="modal fade" id="reassignLead" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Reassign {{$lead->first_name}} {{$lead->last_name}}?</h4>
            </div>
            <form action="{{url('admin/leads/reassign_lead')}}/{{$lead->id}}" class="" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="recruit_id">Lead:</label>
                            <input type="text" class="form-control" value="{{$lead->first_name}} {{$lead->last_name}}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-12">
                            <label for="note">Recruiter to assign this lead to:</label>
                            <select name="user_id" id="" class="form-control">
                                <option value="">Please Select</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                @endforeach
                            </select>
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
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Actions</h3>
    </div>
    <div class="box-body">
        <a href="/admin/leads/{{$lead->id}}/edit" class="btn btn-info btn-block">Edit Lead</a>
        <a href="/admin/leads/add_lead_to_crm/{{$lead->id}}" class="btn btn-primary btn-block">Add To Crm</a>
        <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#reassignLead">Reassign Lead</a>
        <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#deleteLead">Delete Lead</a>
    </div>
</div>
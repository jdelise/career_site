<div class="profile-sidebar" style="width:250px;">
    <!-- PORTLET MAIN -->
    <div class="box profile-sidebar-portlet">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic" style="text-align: center;">
            @if ($recruit->profile_img == '')
                <img alt="" class="img-circle"
                     src="http://www.gravatar.com/avatar/{{md5($recruit->email)}}" class="img-responsive"/>
            @else
                <img src="{{$recruit->profile_img}}?w=750&h=750&fit=crop" class="img-circle" alt="">
            @endif

        </div>
        <div class="center" style="text-align: center;margin-top: 15px;">
            <a href="#" data-toggle="modal" data-target="#add_image" class="btn btn-success">Upload
                Image</a>
            <br/>
            <a href="{{url('admin/mibor_sync/sync-agent-photo')}}/{{$recruit->id}}">Sync image with
                Mibor</a>
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                {{$recruit->first_name}} {{$recruit->last_name}}
            </div>
            <div class="margin-top-20 profile-desc-link">
                <i class="fa fa-globe"></i>
                <a href="mailto:<?php echo $recruit->email; ?>"><?php echo $recruit->email; ?></a>
            </div>
            <div class="margin-top-20 visible-xs-block">
                <a href="tel:<?php echo $recruit->phone_1; ?>" class="btn btn-primary log-call"
                   data-call="<?php echo $recruit->id; ?>"><?php echo $recruit->phone_1; ?></a>
            </div>
            <div class="margin-top-20 profile-desc-link hidden-xs">
                <i class="fa fa-phone"></i>
                <a href="tel:<?php echo $recruit->phone_1; ?>"><?php echo $recruit->phone_1; ?></a>
            </div>
            <div class="margin-top-20"></div>
            <div class="margin-top-20"></div>
            <h4>Created At:<br>{{$recruit->created_at->diffForHumans()}}</h4>
            <h4 style="margin-bottom:20px">Last Updated:<br>{{$recruit->updated_at->diffForHumans()}}</h4>

        </div>
        <div class="clearfix"></div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->

        <!-- END MENU -->
    </div>
    <!-- END PORTLET MAIN -->
    <!-- PORTLET MAIN -->

    <!-- END PORTLET MAIN -->
</div>
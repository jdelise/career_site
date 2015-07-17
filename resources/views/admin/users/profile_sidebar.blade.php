<div class="profile-sidebar" style="width:250px;">
    <!-- PORTLET MAIN -->
    <div class="box profile-sidebar-portlet">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic" style="text-align: center;">
            @if ($user->profile_img == '')
                <img alt="" class="img-circle"
                     src="http://www.gravatar.com/avatar/{{md5($user->email)}}" class="img-responsive"/>
            @else
                <img src="{{$user->profile_img}}?w=750&h=750&fit=crop" class="img-circle" alt="">
            @endif

        </div>
        <div class="center" style="text-align: center;margin-top: 15px;">
            <a href="#" data-toggle="modal" data-target="#add_image" class="btn btn-success">Upload
                Image</a>
            <br/>
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                {{$user->first_name}} {{$user->last_name}}
            </div>
            <div class="margin-top-20 profile-desc-link">
                <i class="fa fa-globe"></i>
                <a href="mailto:<?php echo $user->email; ?>"><?php echo $user->email; ?></a>
            </div>
            <div class="margin-top-20"></div>
            <div class="margin-top-20"></div>
            <h4>Created At:<br>{{$user->created_at->diffForHumans()}}</h4>
            <h4 style="margin-bottom:20px">Last Updated:<br>{{$user->updated_at->diffForHumans()}}</h4>

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
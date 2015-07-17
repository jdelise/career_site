@extends('admin')
@section('page_title','Manage Users')
@section('content')
   <div class="clearfix"></div>
   <div class="row">
       <div class="col-md-12">
           {!!$users->render()!!}
           <div class="box">
               <div class="box-header">
                   <h3 class="box-title">Manage users</h3>
                   <div class="tools pull-right">
                       <a href="{{url('admin/users/create')}}" class="" data-original-title="" title="Create New User">
                           <i class="fa fa-users"></i></a>

                   </div>

               </div>
               <div class="box-body">
                   <div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover">
                           <thead>
                           <tr>
                               <th>
                                   Last Name
                               </th>
                               <th>
                                   First Name
                               </th>
                               <th>
                                   Role
                               </th>
                               <th>
                                   Date Created
                               </th>
                               <th>

                               </th>
                           </tr>
                           </thead>
                           <tbody>

                           @foreach($users as $user)
                               <tr>
                                   <td>{{$user->last_name}}</td>
                                   <td>{{$user->first_name}}</td>
                                   <td>
                                       @foreach($user->roles as $role)
                                           {{$role->display_name}}
                                       @endforeach
                                   </td>
                                   <td>{{$user->created_at}}</td>
                                   <td>
                                       <a href="/admin/users/{{$user->id}}/edit" title="Edit User"><i class="fa fa-edit"></i></a>
                                   </td>
                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>
   </div>
    <div class="clearfix"></div>

@endsection
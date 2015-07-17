<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            My Recruits
        </h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <thead>
            <th>Last Name</th>
            <th>First Name</th>
            <th></th>
            </thead>
            <tbody>
            @foreach($recruits as $recruit)
                <tr>
                    <td>{{$recruit->last_name}}</td>
                    <td>{{$recruit->first_name}}</td>
                    <td>
                        <a href="{{url("admin/recruiting/$recruit->id/edit")}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{url("admin/recruiting/$recruit->id")}}">
                            <i class="fa fa-user"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    <?php echo $recruits->render(); ?>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
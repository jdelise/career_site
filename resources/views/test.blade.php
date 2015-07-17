@extends('app')
@section('main-content')

    <div class="header-breadcrumb page-header support default mbottom50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section-title fleft">Agent Support</h1>
                    <ul class="reset-list">
                        <li>
                            <p><a href="{{url('/')}}" style="color:#ffcc00">Home</a></p>
                        </li>
                        <li>/</li>
                        <li class="active">
                            <p>Agent Support</p>
                        </li>
                    </ul>
                    <span id="current-date">{{date('n D, Y')}}</span>
                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <tr>
            <td>
                <img src="http://myc21scheetz.com/uploads/GeesamanTeam.jpg" alt="" style="width:148px;height:212px;"/>
            </td>
            <td>
                <h5>The Geesaman Team</h5>
                <h5>CENTURY 21 Scheetz</h5>

                Cameron Geesaman - 317-523-7052<br>
                Email: <a href="mailto:SoldWithCameron@gmail.com">SoldWithCameron@gmail.com</a><br>

                Tia Vote - 317-966-2122<br>
                Email: SoldWithTia@gmail.com<br>

                Neil Bolding - 317-506-7161<br>
                Email: <a href="mailto:SoldWithNeil@gmail.com">SoldWithNeil@gmail.com</a><br>
                <a href="http://HomeIsIndiana.com">HomeIsIndiana.com</a>
            </td>
        </tr>
    </table>
@endsection
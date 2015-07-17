@extends('admin')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Search Mibor for agent by name</h3>
        </div>
        <div class="box-body">
            <div class="row center">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" id="agent_name" class="form-control" placeholder="Please enter at least 3 letters">
                            <span class="input-group-btn">
                            <button class="btn btn-default" id="mibor_agent_search" type="button">Go!</button>
                             </span>
                    </div><!-- /input-group -->
                </div>
            </div>
            <div id="reveal" class="hide row">
                <div class="col-md-12">
                    <hr/>
                    <table class="table table-striped">
                        <thead>
                            <th>Agent Name</th>
                            <th>Agent's Cell Phone</th>
                            <th>Office ID</th>
                            <th></th>
                        </thead>
                        <tbody class="show_agent_results">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @stop
@section('footer-content')
    <script>
        $(function(){
            $('#mibor_agent_search').on('click',function(){
                $.ajax({
                    url: "{{url('admin/mibor_sync/agent-search-results')}}",
                    type: 'POST',
                    data: {
                        agent_name: $('#agent_name').val(),
                        _token: '{{csrf_token()}}'
                    }
                })
                        .done(function(data) {
                            //var data = $.parseJSON(data);
                            var url = "{{url('admin/mibor_sync/show-mibor-agent')}}";
                            var html ='';
                            for(var i = 0; i < data.length; i++){
                                html += '<tr>' + '<td>' + data[i].FullName + '</td>' + '<td>' + data[i].CellPhone + '</td>' + '<td>' + data[i].OfficeMLSID + '</td>' + '<td><a href="' + url + '/' + data[i].MLSID + ' ">View This Agent</a></td>' + '</tr>';
                            }
                            var container = $('.show_agent_results');
                            $('#reveal').removeClass('hide');
                            container.html(html);
                            console.log(data);
                            //spin.hide();

                        })
            });
        });
    </script>
    @stop
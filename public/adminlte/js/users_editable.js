var FormEditable;
FormEditable = function () {

    var initEditables = function () {
        var my_result;
        var my_status;
        var uid = $('.uid').val();
        var token = $('#_token').val();
        //set editable mode based on URL parameter


        //global settings
        $.fn.editable.defaults.inputclass = 'form-control';
        $.fn.editable.defaults.url = '/admin/users/edit-profile';
        $.fn.editable.defaults.ajaxOptions = {
            type: 'PATCH'
        };

        //editables element samples


        $('#first_name').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            },
            validate: function (value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });
        $('#last_name').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            },
            validate: function (value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });
        $('#email').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            },
            validate: function (value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });
        $('#experienced_agent_goal').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            },
            validate: function (value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });
        $('#new_agent_goal').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            },
            validate: function (value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });
        $('#office_id').editable({
            type: 'text',
            showbuttons: false,
            params: function(params){
                params._token = token;
                return params;
            },
            source: function () {

                $.ajax({
                    url: '../../../admin/admin_ajax/offices',
                    type: 'POST',
                    data: {
                        _token : token
                    },
                    global: false
                }).done(function(data) {
                    my_result = data;
                    console.log(data);


                });
                return my_result;
            }
        });


    }

    return {
        //main function to initiate the module
        init: function () {

            // inii ajax simulation
            // initAjaxMock();

            // init editable elements
            initEditables();

            // init editable toggler
            $('#enable').click(function () {
                $('#user .editable').editable('toggleDisabled');
            });

            // init


            // handle editable elements on hidden event fired
            $('#user .editable').on('hidden', function (e, reason) {
                if (reason === 'save' || reason === 'nochange') {
                    var $next = $(this).closest('tr').next().find('.editable');
                    if ($('#autoopen').is(':checked')) {
                        setTimeout(function () {
                            $next.editable('show');
                        }, 300);
                    } else {
                        $next.focus();
                    }
                }
            });


        }

    };

}();/**
 * Created by Joe on 7/16/2015.
 */

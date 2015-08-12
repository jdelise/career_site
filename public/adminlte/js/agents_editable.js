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
        $.fn.editable.defaults.url = '/admin/agents/edit-agent';
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
        $('#email_address').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            },
            validate: function (value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });
        $('#days_red').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            },
            validate: function (value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });
        $('#office_phone').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            },
            validate: function (value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });
        $('#mobile_phone').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            },
            validate: function (value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });
        $('#agent_order').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            }
        });
        $('#is_test').editable({
            type: 'text',
            inputclass: 'form-control',
            params: function(params){
                params._token = token;
                return params;
            },
            source: [{
                value: 1,
                text: 'Yes'
            }, {
                value: 0,
                text: 'No'
            }
            ]
        });
        $('#is_active').editable({
            type: 'text',
            inputclass: 'form-control',
            params: function(params){
                params._token = token;
                return params;
            },
            source: [{
                value: 1,
                text: 'Yes'
            }, {
                value: 0,
                text: 'No'
            }
            ]
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

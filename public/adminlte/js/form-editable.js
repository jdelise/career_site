var FormEditable;
FormEditable = function () {

    var initEditables = function () {
        var my_result;
        var my_status;
        var my_level;
        var rid = $('.rid').val();
        var token = $('#_token').val();
        //set editable mode based on URL parameter


        //global settings
        $.fn.editable.defaults.inputclass = 'form-control';
        $.fn.editable.defaults.url = '/admin/recruiting';
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
        $('#address').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            }
        });
        $('#city').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            }
        });
        $('#state').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            }
        });
        $('#zip_code').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            }
        });
        $('#phone_1').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            },
            validate: function (value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });
        $('#mls_id').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            }
        });
        $('#is_hired').editable({
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

        $('#source').editable({
            type: 'text',
            showbuttons: false,
            params: function(params){
                params._token = token;
                return params;
            },
            source: function () {

                $.ajax({
                    url: '../../../admin/admin_ajax/sources',
                    type: 'POST',
                    data: {
                        _token : token
                    },
                    global: false
                }).done(function(data) {
                   my_result = data;


                    });
                return my_result;
            }
        });
        $('#status').editable({

            type: 'text',
            showbuttons: false,
            params: function(params){
                params._token = token;
                return params;
            },
            source: function () {

                $.ajax({
                    url: '../../../admin/admin_ajax/status',
                    type: 'POST',
                    data: {
                        _token : token
                    },
                    global: false
                }).done(function(data) {
                    my_status = data;


                });
                return my_status;
            }
        });
        $('#experience_level').editable({

            type: 'text',
            showbuttons: false,
            params: function(params){
                params._token = token;
                return params;
            },
            source: function () {

                $.ajax({
                    url: '../../../admin/admin_ajax/experience-level',
                    type: 'POST',
                    data: {
                        _token : token
                    },
                    global: false
                }).done(function(data) {
                    my_level = data;


                });
                return my_level;
            }
        });

        $('#dob').editable({
            inputclass: 'form-control'
        });



        $('#comments').editable({
            showbuttons: 'bottom'
        });


        $('#pencil').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            $('#note').editable('toggle');
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

}();
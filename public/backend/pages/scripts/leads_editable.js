var FormEditable;
FormEditable = function () {

    var initEditables = function () {
        var my_result;
        var my_types;
        var rid = $('.rid').val();
        var token = $('#_token').val();
        //set editable mode based on URL parameter
        if (Metronic.getURLParameter('mode') == 'inline') {
            $.fn.editable.defaults.mode = 'inline';
            $('#inline').attr("checked", true);
            jQuery.uniform.update('#inline');
        } else {
            $('#inline').attr("checked", false);
            jQuery.uniform.update('#inline');
        }

        //global settings
        $.fn.editable.defaults.inputclass = 'form-control';
        $.fn.editable.defaults.url = '/admin/leadrouter';
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
        $('#zip_code').editable({
            type: 'text',
            params: function(params){
                params._token = token;
                return params;
            }
        });
        $('#phone').editable({
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
                    url: '../../../admin/ajax/get_sources',
                    type: 'POST',
                    dataType: 'json',
                    global: false
                }).done(function(data) {
                    my_result = data;


                });
                return my_result;
            }
        });
        $('#type').editable({

            type: 'text',
            showbuttons: false,
            params: function(params){
                params._token = token;
                return params;
            },
            source: function () {

                $.ajax({
                    url: 'getLeadAcceptanceTypes',
                    type: 'POST',
                    dataType: 'json',
                    data:{
                      _token: token
                    },
                    global: false
                }).done(function(data) {
                    my_types = data;


                });
                return my_types;
            }
        });
        $('#vacation').editable({
            rtl: Metronic.isRTL()
        });

        $('#dob').editable({
            inputclass: 'form-control'
        });

        $('#event').editable({
            placement: (Metronic.isRTL() ? 'left' : 'right'),
            combodate: {
                firstItem: 'name'
            }
        });

        $('#comments').editable({
            showbuttons: 'bottom'
        });

        $('#note').editable({
            showbuttons: (Metronic.isRTL() ? 'left' : 'right')
        });

        $('#pencil').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            $('#note').editable('toggle');
        });

        $('#state').editable({
            source: ["Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Dakota", "North Carolina", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"]
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
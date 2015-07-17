/**
 Custom module for you to write your own javascript functions
 **/
var Custom = function () {

    // private functions & variables
    var submitAjaxRequest = function(e){
        var actionTimer;
        var messageNumber;
        var activityList = $('#activityList');
        var form = $(this);
        var method = form.find('input[name="_method"]').val() || 'POST';
        var token = form.find('input[name="_token"]').val()
        $.ajax({
            type: method,
            url: form.prop('action'),
            data:{
                _token: token,
                lead_id: $('#lead_id').val(),
                zipcode: $('#zipcode').val()
            },
            beforeSend:function(){
                activityList.html('').append('Looking up agents...').show();
            }
        })
            .then(function(data){
                messageNumber = data.pop();
                activityList.hide().html('').append('Found ' + data.length + ' agents! Sending messages...').show();
                activityList.append('<ul></ul>');
                var message = 'New Lead - ' + $('#city').val() + ', ' + $('#zipcode').val() + ' - $' + $('#mask_currency').val() + ' - Appt. Date: ' + $('#appointment_date').val() + '@' + $('#appointment_time').val() +
                    ' - ' + $('#message').val() + ' - Reply ' + messageNumber.messageId + ' to accept';
                var liveFeed = activityList.find('ul');
                var i = 0;
                action = function(){
                    if(i < data.length){
                        //console.log(messageNumber.messageId);

                        $.ajax({
                            type: method,
                            url:'/admin/check_message_then_send',
                            data: {
                                number: data[i].mobile_phone,
                                text: messageNumber.messageId,
                                message: message,
                                _token: token

                            },
                            error: function(xhr, status, error){
                                clearTimeout(actionTimer);
                                liveFeed.append('<li>Stoped!</li>');
                            },
                            success : function(){
                                liveFeed.append('<li>' + data[i].last_name+ ', ' + data[i].first_name + '</li>');
                            }
                        })
                        i++;
                        actionTimer = setTimeout(action, 10000);
                    }
                };
                actionTimer = setTimeout(action, 1000);


            })
        e.preventDefault();
    };

    var messageControl = function(){
        $('form[data-remote]').on('submit',submitAjaxRequest);
    }
    var handleDatePickers = function () {

        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                orientation: "left",
                autoclose: true
            });
            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
        if (jQuery().timepicker) {
            $('.timepicker-default').timepicker({
                autoclose: true,
                showSeconds: true,
                minuteStep: 1
            });

            $('.timepicker-no-seconds').timepicker({
                autoclose: true,
                minuteStep: 5
            });

            $('.timepicker-24').timepicker({
                autoclose: true,
                minuteStep: 5,
                showSeconds: false,
                showMeridian: false
            });

            // handle input group button click
            $('.timepicker').parent('.input-group').on('click', '.input-group-btn', function(e){
                e.preventDefault();
                $(this).parent('.input-group').find('.timepicker').timepicker('showWidget');
            });
        }

        /* Workaround to restrict daterange past date select: http://stackoverflow.com/questions/11933173/how-to-restrict-the-selectable-date-ranges-in-bootstrap-datepicker */
    };

    var handleInputMasks = function () {
        $.extend($.inputmask.defaults, {
            'autounmask': true
        });

        $("#mask_date").inputmask("d/m/y", {
            autoUnmask: true
        }); //direct mask
        $("#mask_date1").inputmask("d/m/y", {
            "placeholder": "*"
        }); //change the placeholder
        $("#mask_date2").inputmask("d/m/y", {
            "placeholder": "dd/mm/yyyy"
        }); //multi-char placeholder
        $("#mask_phone").inputmask("mask", {
            "mask": "(999) 999-9999"
        }); //specifying fn & options
        $("#mask_phone_text").inputmask("mask", {
            "mask": "+13179999999"
        });
        $("#mask_tin").inputmask({
            "mask": "99-9999999",
            placeholder: "" // remove underscores from the input mask
        }); //specifying options only
        $("#mask_number").inputmask({
            "mask": "9",
            "repeat": 10,
            "greedy": false
        }); // ~ mask "9" or mask "99" or ... mask "9999999999"
        $("#mask_decimal").inputmask('decimal', {
            rightAlignNumerics: false
        }); //disables the right alignment of the decimal input
        $("#mask_currency").inputmask('999999', {
            rightAlignNumerics: false,
            numericInput: true
        }); //123456  =>  € ___.__1.234,56
        $("#mask_ssn").inputmask("999-99-9999", {
            placeholder: " ",
            clearMaskOnLostFocus: true
        }); //default
    };

    var handleFormAjax = function(){
        $('#new_text_lead').validate({
            rules: {
                lead_id: {
                    required: true
                },
                city: {
                    required: true
                },
                zip_code: {
                    required: true,
                    digits: true
                },
                price: {
                    required: true,
                    digits: true
                },
                appointment_date: {
                    required: true
                },
                message: {
                    required: true
                }
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function (form) {

                var form1 = $('#new_text_lead');
                var spin = $('.loading_spin');
                spin.show();
                $.ajax({
                    url: form1.attr('action'),
                    type: 'POST',
                    data: form1.serialize()
                })
                    .done(function(data) {
                        var data = $.parseJSON(data);
                        spin.hide();
                        if(data.success == 'Success'){
                            form1.append('<div class="alert alert-success">' +
                            '<strong>Success!</strong> Your data has been submited'+
                            '</div>');
                        }else{
                            form1.append('<div class="alert alert-danger alert-dismissable">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'+
                            '<strong>Warning!</strong> ' + data.error +
                            '</div>');
                        }

                    })
                    .fail(function() {
                        form1.append('<div class="alert alert-danger alert-dismissable">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'+
                        '<strong>Warning!</strong> Something went wrong. Please check.'+
                        '</div>');
                    })
            }
        });
        $('.ajax_form').submit(function(e){
            form = $(this);
            var spin = $('.loading_ajax',this);
            spin.removeClass('hide');
            spin.fadeIn();
            var form_data = form.serialize();
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form_data
            })
                .done(function(data) {
                    var data = $.parseJSON(data);
                    spin.hide();
                    if(data.success == 'Success'){
                        form.append('<div class="alert alert-success">' +
                        '<strong>Success!</strong> Your data has been submited'+
                        '</div>');
                    }else{
                        form.append('<div class="alert alert-danger alert-dismissable">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'+
                        '<strong>Warning!</strong> ' + data.error +
                        '</div>');
                    }

                })
                .fail(function() {
                    form.append('<div class="alert alert-danger alert-dismissable">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'+
                    '<strong>Warning!</strong> Something went wrong. Please check.'+
                    '</div>');
                });

            return false;
        });
    };
    // public functions
    var completeTaskAjax = function(){
        $('.completed').on('click', function(){
            $.ajax({
                url: $(this).attr('data-url') + '/' + $(this).attr('data-id'),
                type: 'POST',
                data: {
                    completed: true,
                    _token: $(this).attr('data-csrf')
                }
            })
                .done(function(data) {
                    var data = $.parseJSON(data);
                    spin.hide();
                    if(data.success == 'Success'){
                        $('body').append('<div class="alert alert-success">' +
                        '<strong>Success!</strong> Your data has been submited'+
                        '</div>');
                    }else{
                        $('body').append('<div class="alert alert-danger alert-dismissable">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'+
                        '<strong>Warning!</strong> ' + data.error +
                        '</div>');
                    }

                })
                .fail(function() {
                    $('body').append('<div class="alert alert-danger alert-dismissable">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'+
                    '<strong>Warning!</strong> Something went wrong. Please check.'+
                    '</div>');
                });
        });
    };
    return {

        //main function
        init: function () {
            handleDatePickers();
           // handleInputMasks();
           // handleFormAjax();
            messageControl();
            //completeTaskAjax();
            //initialize here something.
        }

    };

}();

/***
 Usage
 ***/
//Custom.init();
//Custom.doSomeStuff();
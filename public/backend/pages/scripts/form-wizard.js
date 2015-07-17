var FormWizard = function () {


    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            function scrollTo(el, offeset) {
                var pos = (el && el.size() > 0) ? el.offset().top : 0;

                if (el) {
                    if ($('body').hasClass('page-header-fixed')) {
                        pos = pos - $('.page-header').height();
                    }
                    pos = pos + (offeset ? offeset : -1 * el.height());
                }

                $('html,body').animate({
                    scrollTop: pos
                }, 'slow');
            }

            var form = $('#submit_form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    //account
                    first_name: {

                        required: true
                    },
                    last_name: {

                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required:true
                    },
                    license_status:{
                        required:true
                    },
                    goal_amount: {
                        min: 50000,
                        required: true
                    },
                    sales_price: {
                        min: 50000,
                        required: true
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                    scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                            .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success.show();
                    error.hide();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });


            var handleTitle = function (tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                console.log(current);
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_1').find('.button-previous').hide();
                    $('#form_wizard_1').find('.button-next').show();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }
                if (current == 2) {
                    $('#form_wizard_1').find('.button-next').show();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }
                if (current == 3) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();
                } else {
                    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
                if (current == 4) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').hide();
                    $('#form_wizard_1').find('.button-previous').hide();

                }
                scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'lastSelector': '.button-submit',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    //return false;

                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    handleTitle(tab, navigation, clickedIndex);

                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    if (form.valid() == false) {
                        return false;
                    }
                    handleTitle(tab, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                },
                onLast: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    if (form.valid() == false) {
                        return false;
                    }

                    var firstname = $('#first_name').val();
                    var lastname = $('#last_name').val();
                    var email = $('#email').val();
                    $('.loading').show();
                    $.ajax({
                        url: $('#submit_form').attr('action'),
                        type: 'POST',
                        data: $('#submit_form').serialize()
                    })
                        .done(function (data) {
                            console.log(data);
                            $('.loading').hide();
                            var data = data;
                            $('#your_results').html('');
                            $('#customer_name').html('');
                            $('#buyers_taken').html('');
                            $('#buyers_closed').html('');
                            $('#listings_taken').html('');
                            $('#listings_closed').html('');
                            var html = '<h4>In order to hit your income goal of <span style="color:blue">$' + data.goal_amount + '</span>, you will need to sell <span>' + data.total_tranactions + ' </span> homes with an average sales price of <span style="color:blue">$' + data.average_sales_price + '<span>.</h4>';

                            $('#customer_name').append('Thank You ' + $('#first_name').val().charAt(0).toUpperCase() + $('#first_name').val().substring(1) + '!');

                            $('#your_results').append(html);
                            $('#buyers_taken').append(data.buyers_taken);
                             $('#buyers_closed').append(data.buyers_closed);
                             $('#listings_taken').append(data.listings_taken);
                             $('#listings_closed').append(data.listings_closed);
                            $('#your_results').show();


                        })
                        .fail(function () {
                            console.log("error");
                        })

                    handleTitle(tab, navigation, index);

                }
            });

            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').click(function () {
                //$('#submit_form').submit();
            }).hide();
            $('#license_status').on('change',function(data){
                var status = $(this).val();
                if(status == 'In Pre-Licensing School'){
                    $('#current_agent').hide();
                    $('#brokerage').val('');
                    $('#school_div').show();
                }else if(status == 'Experienced Agent'){
                    $('#school_div').hide();
                    $('#school').val('');
                    $('#current_agent').show();
                }else{
                    $('#school_div').hide();
                    $('#school').val('');
                    $('#current_agent').hide();
                    $('#brokerage').val('');
                }
            });
        }

    };

}();
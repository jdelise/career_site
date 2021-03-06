/**
 * Created by Joe on 4/15/2015.
 */
(function(){
    var submitAjaxRequest = function(e){
        var form = $(this);
        var method = form.find('input[name="_method"').val() || 'POST';
        $.ajax({
            type: method,
            url: form.prop('action'),
            data: form.serialize(),
            success: function(){
                $.publish('form.submitted', form);
            }
        });
        e.preventDefault();
    }

    $('form[data-remote]').on('submit',submitAjaxRequest);
})();
/**
 * Created by Joe on 4/15/2015.
 */
(function($){
    var O = $({});

    $.subscribe = function(){
        O.on.apply(O,arguments);
    };

    $.unsubscribe = function(){
        O.on.apply(O,arguments);
    };

    $.publish = function(){
        O.on.apply(O,arguments);
    };
}(jQuery));
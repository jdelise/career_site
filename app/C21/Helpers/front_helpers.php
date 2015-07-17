<?php
function is_recruit_page(){


}
function setActive($route, $class = 'active')
{
    $request = \Illuminate\Support\Facades\Request::segment(2);
    return ($request == $route) ? $class : '';
}
function setActiveSub($route1,$route2, $class = 'active')
{
    $request_1 = \Illuminate\Support\Facades\Request::segment(2);
    $request_2 = \Illuminate\Support\Facades\Request::segment(3);
    return ($request_1 == $route1&& $request_2 == $route2) ? $class : '';
}
function setSelected($arg1, $arg2){
    if($arg1 == $arg2){
      echo 'selected';
    }
}
function changeBoolean($boolean){
    if($boolean == 0){
        return 'No';
    }
    return 'Yes';
}
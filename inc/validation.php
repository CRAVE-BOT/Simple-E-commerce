<?php
function empty_form($user) {
    return empty($user);
}
function form_len($user,$min){
    if(strlen($user)<=$min)return true;
    else return false;
}

function vaild_Email($email) {
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}
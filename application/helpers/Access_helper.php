<?php

function login_access(){

    $ci =& get_instance();
    if (!$ci->session->userdata('email')){ // check if there is no session of user login
        redirect('auth');
    }
    else{ // if there is a session of user login but try to access forbidden page
        if ($ci->uri->segment(1) !== strtolower($ci->session->userdata('role'))){
            redirect('auth/forbidden');
        }
    }

}
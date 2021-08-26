<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convertToBase64'))
 	{
    function get_user_profile_data($uid)
    {
        $CI =& get_instance();
        $CI->load->model('users_model');
        $profile_row =  $CI->users_model->get_user_profile_data($uid);
        return $profile_row;
    }
}
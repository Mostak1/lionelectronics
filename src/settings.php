<?php
if (!function_exists('settings')) {
    function settings()
    {
       $root = "http://localhost/WDPF/Project/electro_master/"; 
    //    $root = "http://localhost/WDPF53/electro_master/"; 
        return [
            'companyname'=> 'Electro Master',
            'logo'=>$root."admin/assets/img/logo.svg",
            'homepage'=> $root,
            'adminpage'=>$root.'admin/',
            'hostname'=> 'localhost',
            'user'=> 'root',
            'password'=> '',
            'database'=> 'electro_master'
        ];
    }
}
if (!function_exists('testfunc')) {
    function testfunc()
    {
        return "<h3>testing common functions</h3>";
    }
}

<?php
if (!function_exists('settings')) {
    function settings()
    {
       $root = "http://localhost/WDPF/Project/lionelectronics/"; 
        return [
            'companyname'=> 'Electroquantam',
            'logo'=>$root."admin/assets/img/logo.svg",
            'homepage'=> $root,
            'adminpage'=>$root.'admin/',
            'hostname'=> 'localhost',
            'user'=> 'root',
            'password'=> '',
            'database'=> 'lioncommerce'
        ];
    }
}
if (!function_exists('testfunc')) {
    function testfunc()
    {
        return "<h3>testing common functions</h3>";
    }
}

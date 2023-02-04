
<?php
if (!function_exists('settings')) {

    function settings()
    {
        return [
            'companyname' => 'Lion Electronics Corporation',
            'homepage' => 'http://localhost/WDPF/Project/lionelectronics/',
            'hostname' => 'localhost',
            'user' => 'root',
            'password' => '',
            'database' => 'lioncommerce',

        ];
    }
}
if (!function_exists('testfunc')) {

    function testfunc()
    {
        return "<hr> testing common function in settings";
    }
}


?>
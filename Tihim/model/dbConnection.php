<?php
    
    static $con = NULL;
    
    function getConnection(){
        if(!$con){
            $con = mysqli_connect("localhost","root","","hm");
        }
        return $con;
    }

?>
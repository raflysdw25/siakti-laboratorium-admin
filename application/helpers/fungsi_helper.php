<?php 

    function cleanURL($textURL) {
        $URL = strtolower(preg_replace( array('/[^a-z0-9\- ]/i', '/[ \-]+/'), array('', '-'), $textURL));
        return $URL;
    }

?>
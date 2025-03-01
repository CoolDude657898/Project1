<?php
    $global_password = "\$2y\$10\$ccqRtReEc0Aaqc9HV2CtA.xsz4fnRdKy54Ox5x4zX/RYsWQLYnkwy";

    function check_password($hash){
        if (password_verify($_POST["password"], $hash)){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    check_password($global_password);
?>
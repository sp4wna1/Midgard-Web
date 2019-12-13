<?php


class Alert
{
    static function showMessage($message)
    {
        echo sprintf("<script> alert('%s')</script>", $message);
    }

}
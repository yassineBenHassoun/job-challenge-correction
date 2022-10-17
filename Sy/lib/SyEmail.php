<?php

class SyEmail
{
    public static function notPrivateEmail($email) {
        $mySQL = new SySQLStmt("SELECT emaildomain from email where '" . $email . "' like '%' || emaildomain");
        if ($mySQL->GetAttr('emaildomain') != "") {
            return true;
        } else {
            return false;
        }
    }
}

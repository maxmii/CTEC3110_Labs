<?php


class UserModel
{
    private $dbase;
    function __construct($dbase)
    {
        $this->dbase = $dbase;
    }

    function register($username, $pwdMD5)
    {
        try {
            $execResult = $this->dbase->exec("
                INSERT INTO sms_db.t_user (username, pwd_md5) VALUES ('{$username}', '{$pwdMD5}');
            ");
        } catch (\PDOException $e) {
            return [
                'result' => false,
                'msg' => 'Username is already existed!',
            ];
        }
        return [
            'result' => true,
        ];
    }

    function login($username, $pwdMD5)
    {
        $rs = $this->dbase->query("
            SELECT pwd_md5 as pwd FROM sms_db.t_user WHERE username = '{$username}'
        ");

        if($rs === 0) {
            return false;
        }
        $row = $rs->fetch();
        return $pwdMD5 === $row['pwd'];
    }
}
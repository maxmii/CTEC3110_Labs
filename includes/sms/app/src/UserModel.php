<?php


class UserModel
{
    private $db;
    function __construct($db)
    {
        $this->db = $db;
    }

    function register($username, $pwdMD5)
    {
        try {
            $execResult = $this->db->exec("
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
        $rs = $this->db->query("
            SELECT pwd_md5 as pwd FROM sms_db.t_user WHERE username = '{$username}'
        ");

        if($rs === 0) {
            return false;
        }
        $row = $rs->fetch();
        return $pwdMD5 === $row['pwd'];
    }
}
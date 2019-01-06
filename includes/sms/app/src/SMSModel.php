<?php


class SMSModel
{
    private $db;
    function __construct($db)
    {
        $this->db = $db;
    }

    function getCount()
    {
        $result = $this->db->query("SELECT count(*) as cnt FROM sms_db.sms");
        $result = $result->fetch();
        return (int)$result['cnt'];
    }
    function getList($page, $size, $prefix = '')
    {
        $offset = $page * $size;
        $limit = $size;


        $sql = "SELECT * FROM sms_db.sms " . (empty($prefix) ? "" : "WHERE message LIKE '%{$prefix}%'") . " LIMIT {$limit} OFFSET {$offset}";


        $result = $this->db->query($sql);
        $rep = [];
        foreach ($result as $row) {
            $rep[] = $row;
        }
        return $rep;
    }

    function add(SMS $sms)
    {
        $stmt = $this->db->prepare("INSERT INTO sms.sms (src_msisdn, dest_msisdn, recv_time, message) VALUES (:src_msisdn, :dest_msisdn, :recv_time, :message) ;");
        $stmt->bindParam(':src_msisdn', $sms->source_msisdn);
        $stmt->bindParam(':dest_msisdn', $sms->destination_msisdn);
        $stmt->bindParam(':recv_time', $sms->received_time);
        $stmt->bindParam(':message', $sms->message);
        return $stmt->execute();


    }
}

<?php


class SMSModel
{
    private $db;
    function __construct($db)

    {
        //Connects to the database
        $this->db = $db;
    }

    function getCount()
        /**
         * Counts all the entries in the sms database
         */
    {
        $result = $this->db->query("SELECT count(*) as cnt FROM sms_db.sms");
        $result = $result->fetch();
        return (int)$result['cnt'];
    }
    function getList($page, $size, $prefix = '')
    {
        /**
         *Retrieves the messages from the list but will be filtered by the SQL query
         *It is also grouped by the Time received to only allow unique entries to be shown
         */
        $offset = $page * $size;
        $limit = $size;


        $sql = "SELECT * FROM sms_db.sms GROUP BY recv_time" . (empty($prefix) ? "" : "WHERE message LIKE '%{$prefix}%'") . " LIMIT {$limit} OFFSET {$offset}";



        $result = $this->db->query($sql);
        $rep = [];
        foreach ($result as $row) {
            $rep[] = $row;
        }
        return $rep;
    }

    function add(SMS $sms)
    {
        /**
         * This PHP code will add the data that we got from the M2M server, and
         * will insert it into our SMS database where the messages are stored
         */
        return $this->db->exec("INSERT INTO sms_db.sms (src_msisdn, dest_msisdn, recv_time, message)
  VALUES ('{$sms->source_msisdn}', '{$sms->destination_msisdn}', '{$sms->received_time}', '{$sms->message}');");



    }
}

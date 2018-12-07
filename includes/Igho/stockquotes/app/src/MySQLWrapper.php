<?php

/**
 * MySQLWrapper.php
 *
 * Access the sessions database
 *
 * Author: CF Ingrams
 * Email: <clinton@cfing.co.uk>
 * Date: 22/10/2017
 *
 * @author CF Ingrams <clinton@cfing.co.uk>
 * @copyright CFI
 */

class MySQLWrapper
{
    private $obj_db_handle;
    private $obj_sql_queries;
    private $obj_stmt;
    private $arr_errors;

    public function __construct()
    {
        $this->obj_db_handle = null;
        $this->obj_sql_queries = null;
        $this->obj_stmt = null;
        $this->arr_errors = [];
    }

    public function __destruct() { }

    public function setDbHandle($obj_db_handle)
    {
        $this->obj_db_handle = $obj_db_handle;
    }

    public function safeQuery($query_string, $arr_params = null)
    {
        $this->arr_errors['db_error'] = false;
        $arr_query_parameters = $arr_params;

        try
        {
            $temp = array();

            $this->obj_stmt = $this->obj_db_handle->prepare($query_string);

            // bind the parameters
            if ($arr_params !== null)
            {
                if (sizeof($arr_query_parameters) > 0)
                {
                    foreach ($arr_query_parameters as $param_key => $param_value)
                    {
                        $temp[$param_key] = $param_value;
                        $this->obj_stmt->bindParam($param_key, $temp[$param_key], PDO::PARAM_STR);
                    }
                }
            }

            // execute the query
            $execute_result = $this->obj_stmt->execute();
            $this->arr_errors['execute-OK'] = $execute_result;
        }
        catch (PDOException $exception_object)
        {
            $error_message  = 'PDO Exception caught. ';
            $error_message .= 'Error with the database access.' . "\n";
            $error_message .= 'SQL query: ' . $query_string . "\n";
            $error_message .= 'Error: ' . var_dump($this->obj_stmt->errorInfo(), true) . "\n";
            // NB would usually output to file for sysadmin attention
            $this->arr_errors['db_error'] = true;
            $this->arr_errors['sql_error'] = $error_message;
        }
        return $this->arr_errors['db_error'];
    }

    public function countRows()
    {
        $num_rows = $this->obj_stmt->rowCount();
        return $num_rows;
    }

    public function safeFetchRow()
    {
        $record_set = $this->obj_stmt->fetch(PDO::FETCH_NUM);
        return $record_set;
    }

    public function safeFetchArray()
    {
        $arr_row = $this->obj_stmt->fetch(PDO::FETCH_ASSOC);
        return $arr_row;
    }

    public function lastInsertedId()
    {
        $sql_query = 'SELECT LAST_INSERT_ID()';

        $this->safe_query($sql_query);
        $arr_last_inserted_id = $this->safe_fetch_array();
        $last_inserted_id = $arr_last_inserted_id['LAST_INSERT_ID()'];
        return $last_inserted_id;
    }
}

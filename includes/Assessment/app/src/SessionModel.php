<?php
/**
 * Session Model
 */

class SessionModel
{
    private $c_username;
    private $c_server_type;
    private $c_password;
    private $c_arr_storage_result;
    private $c_obj_wrapper_session_file;
    private $c_obj_wrapper_session_db;
    private $c_obj_db_handle;
    private $c_obj_sql_queries;

    public function __construct()
    {
        $this->c_username = null;
        $this->c_server_type = null;
        $this->c_password = null;
        $this->c_arr_storage_result = null;
        $this->c_obj_wrapper_session_file = null;
        $this->c_obj_wrapper_session_db = null;
        $this->c_obj_db_handle = null;
        $this->c_obj_sql_queries = null;
    }

    public function __destruct() { }

    public function set_session_values($p_username, $p_password)
    {
        $this->c_username = $p_username;
        $this->c_password = $p_password;
    }

    public function set_server_type($p_server_type)
    {
        $this->c_server_type = $p_server_type;
    }

    public function set_wrapper_session_file($p_obj_wrapper_session)
    {
        $this->c_obj_wrapper_session_file = $p_obj_wrapper_session;
    }

    public function set_wrapper_session_db($p_obj_wrapper_db)
    {
        $this->c_obj_wrapper_session_db = $p_obj_wrapper_db;
    }

    public function set_db_handle($p_obj_db_handle)
    {
        $this->c_obj_db_handle = $p_obj_db_handle;
    }

    public function set_sql_queries($p_obj_sql_queries)
    {
        $this->c_obj_sql_queries = $p_obj_sql_queries;
    }

    public function store_data()
    {
        switch ($this->c_server_type)	{
            case 'database':
                $this->c_arr_storage_result['database'] = $this->store_data_in_database();
                break;
            case 'file':
            default:
                $this->c_arr_storage_result['file'] = $this->store_data_in_session_file();
        }
    }

    public function get_storage_result()
    {
        return $this->c_arr_storage_result;
    }

    private function store_data_in_session_file()
    {
        $m_store_result = false;
        $m_store_result_username = $this->c_obj_wrapper_session_file->set_session('user_name', $this->c_username);
        $m_store_result_password = $this->c_obj_wrapper_session_file->set_session('password', $this->c_password);

        if ($m_store_result_username !== false && $m_store_result_password !== false)	{
            $m_store_result = true;
        }
        return $m_store_result;
    }

    public function store_data_in_database()
    {
        $m_store_result = false;

        $this->c_obj_wrapper_session_db->set_db_handle( $this->c_obj_db_handle);
        $this->c_obj_wrapper_session_db->set_sql_queries( $this->c_obj_sql_queries);

        $m_store_result = $this->c_obj_wrapper_session_db->store_session_var('user_name', $this->c_username);
        $m_store_result = $this->c_obj_wrapper_session_db->store_session_var('user_password', $this->c_password);

        return $m_store_result;
    }
}

<?php
/**
 * Login Model
 */

class LoginModel
{
    private $c_username;
    private $c_password;
    public function __construct()
    {
        $this->c_username = null;
        $this->c_password = null;
    }

    public function __destruct() { }

    public function set_session_values($p_username, $p_password)
    {
        $this->c_username = $p_username;
        $this->c_password = $p_password;
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

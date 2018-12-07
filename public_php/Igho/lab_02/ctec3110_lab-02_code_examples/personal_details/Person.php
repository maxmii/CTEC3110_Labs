<?php

	// class to demonstrate overloaded getter & setter methods
	class Person
	{
		private $c_attributes = array('name' => null, 'date_of_birth' => null);

		public function __construct() {}
		public function __destruct() {}

		public function __get($p_attribute_id)
		{
			try
			{
				if (!array_key_exists($p_attribute_id, $this->c_attributes))
				{
					throw new Exception('Unknown attribute');
				}
				else
				{
					if (method_exists($this, 'get_' . $p_attribute_id))
					{
						return call_user_func(array($this, 'get_' . $p_attribute_id));
					}
					else
					{
						return $this->c_attributes[$p_attribute_id];
					}
				}
			}
			catch (Exception $err) 
			{
				trigger_error('<p>Caught exception: ' . $err->getMessage() . '</p>');
			}
		}

		public function __set($p_attribute_id, $p_value)
		{
			try
			{
				if (!array_key_exists($p_attribute_id, $this->c_attributes))
				{
					throw new Exception('Unknown attribute');
				}
				else
				{
					if (method_exists($this, 'set_' . $p_attribute_id))
					{
						return call_user_func(array($this, 'set_' . $p_attribute_id), $p_value);
					}
					else
					{
						return $this->c_attributes[$p_attribute_id] = $p_value;
					}
				}
			}
			catch (Exception $err) 
			{
				$m_error_message = '<p>Caught exception: ' .  $err->getMessage() . '</p>';
				trigger_error($m_error_message);
			}
		}

		private function set_date_of_birth($p_dob)
		{
			try
			{
				if (!strtotime($p_dob))
				{
					throw new Exception('<p>Invalid date entered</p>');
					$this->date_of_birth = '';
				}
				else
				{
					$this->c_attributes['date_of_birth'] = $p_dob;
				}
			}
			catch (Exception $err)
			{
				$m_error_message = '<p>Caught exception: ' .  $err->getMessage() . '</p>';
				trigger_error($m_error_message);
			}
		}

		public function say_hello()
		{
			$m_message = '';
			if ($this->date_of_birth != '')
			{
				$m_message = '<p>Hello ' . $this->name . '. You were born on ' . $this->date_of_birth . '</p>';
			}
			return $m_message;
		}
	}
?>
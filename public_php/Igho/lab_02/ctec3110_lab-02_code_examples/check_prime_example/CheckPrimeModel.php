<?php
	class CheckPrimeModel
	{
		private $c_guess;
		private $c_guess_result;

		public function __construct()
		{
			$this->c_guess_result = '';
			$this->c_guess = 0;
		}

		public function __destruct() {}

		public function set_prime_check_value($p_guess_prime)
		{
			$this->c_guess = $p_guess_prime;
		}

		public function do_prime_check()
		{
			$m_guess = $this->c_guess;

			$m_count = 2;
			do
			{
				$m_remainder = $m_guess % $m_count;
				$m_count++;
			} while($m_remainder != 0 AND $m_count < $m_guess);

			if (($m_count < $m_guess) || ($m_guess == 0))
			{
				$this->c_guess_result = false;
			}
			else
			{
				$this->c_guess_result = true;
			}
		}

		public function get_prime_check_result()
		{
			return $this->c_guess_result;
		}
	}
?>

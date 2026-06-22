<?php

class Core
{
	

		
		####################
		#### Data Tools ####
		####################
	
		function error($melding = '')
		{
				$bericht  = '<table width="100%">';
				$bericht .= '<tr><th colspan="2">Er is een fout opgetreden!!</th></tr>';

				if($melding != '')
				{
						$bericht .= '<tr><td colspan="2">'.$melding.'</td></tr>';
				}

				$bericht .= '<tr><td>Query</td><td>'.$this->q.'</td></tr>';
				$bericht .= '<tr><td>Foutmelding</td><td>'.mysqli_error($this->resource).'</td></tr>';
				$bericht .= '<tr><td>Foutcode</td><td># '.mysqli_errno($this->resource).'</td></tr>';
				$bericht .= '</table>';

				//die($bericht);
		}

		function getExecTime()
		{
				return number_format(($this->getMicroTime() - $this->mtStart),5) * 1000 / 1000;
		}

		function getMicroTime()
		{
				list($msec, $sec) = explode(' ', microtime());
				return floor($sec / 1000) + $msec;
		}

		function setmicro()
		{
				$this->microStart=$this->getMicroTime();
		}

		function getmicro()
		{
				return number_format(($this->getMicroTime() - $this->microStart),5) * 1000 / 1000;
		}


		#################
		#### Overige ####
		#################

		function returnto($url,$time)
		{
				echo "<meta http-equiv='refresh' content='$time;URL=$url' />";
		}
		
		function random_hash() 
		{ 
				$code = md5(uniqid(rand(), true)); 
				return substr($code, 0, '15'); 
		}
}


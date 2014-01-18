<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Ajax extends CI_Controller
{
	 public function __construct()
    {
            parent::__construct();
			$this->load->database();
			$this->load->helper('date');
			$this->load->helper('url');
			date_default_timezone_set ( "Asia/Kolkata" );
			//$this->output->enable_profiler(TRUE);
			
	}
	
	
	public function remember($wordid)
	{
		$datestring = '%Y-%m-%d %h:%i:%s'; 
		if($wordid)
		{
			$this->db->query('UPDATE words SET remembered = remembered +1 WHERE wordid='.$wordid);
			if($this->db->affected_rows()>0)
			{
				$this->db->insert('events',array('wordid'=>$wordid,'action'=>1,'datetime'=>mdate($datestring,now())));
				echo '1';
			}
			else
			{
				echo '0';
			}
		
		}
		else
		{
			echo '0';
		}
	}
	
	
	public function forgot($wordid)
	{
		$datestring = '%Y-%m-%d %h:%i:%s'; 
		if($wordid)
		{
			$this->db->query('UPDATE words SET forgotten = forgotten +1 WHERE wordid='.$wordid);
			if($this->db->affected_rows()>0)
			{
				$this->db->insert('events',array('wordid'=>$wordid,'action'=>0,'datetime'=>mdate($datestring,now())));
				echo '1';
			}
			else
			{
				echo '0';
			}
		
		}
		else
		{
			echo '0';
		}
	}
	
	public function addstar($wordid)
	{
		$datestring = '%Y-%m-%d %h:%i:%s'; 
		if($wordid)
		{
			$this->db->where('wordid',$wordid);
			$this->db->update('words',array('starred'=>1));
			if($this->db->affected_rows()>0)
			{
				$this->db->insert('events',array('wordid'=>$wordid,'action'=>2,'datetime'=>mdate($datestring,now())));
				echo '1';
			}
			else
			{
				echo '0';
			}
		}
		else
		{
			echo '0';
		}
	
	}

	public function removestar($wordid)
	{
		$datestring = '%Y-%m-%d %h:%i:%s'; 
		if($wordid)
		{
			$this->db->where('wordid',$wordid);
			$this->db->update('words',array('starred'=>0));
			if($this->db->affected_rows()>0)
			{
				$this->db->insert('events',array('wordid'=>$wordid,'action'=>3,'datetime'=>mdate($datestring,now())));
				echo '1';
			}
			else
			{
				echo '0';
			}
		}
		else
		{
			echo '0';
		}
	
	}
	
		public function test() //to be removed
		{
			$wordid=1;
			$datestring = '%Y-%m-%d %h:%i:%s'; 
			if($wordid)
			{
				$this->db->query('UPDATE words SET remembered = remembered +1 WHERE wordid='.$wordid);
				if($this->db->affected_rows()>0)
				{
					$this->db->insert('events',array('wordid'=>$wordid,'action'=>1,'datetime'=>mdate($datestring,now())));
					echo '1';
				}
				else
				{
					echo '0';
				}
		
			}
			else
			{
				echo '0';
			}
		
		}
		
	public function searchresults($query)
	{
	
		if($query==null)
		{
			echo 'No search query passed';
			return;
		}
		$squery =$query;
		
		$sql = "SELECT * FROM `words` WHERE ( CONVERT( `wordid` USING utf8 ) LIKE '%$query%' OR CONVERT( `word` USING utf8 ) LIKE '%$query%' OR CONVERT( `meaning` USING utf8 ) LIKE '%$query%' OR CONVERT( `simplemeaning` USING utf8 ) LIKE '%$query%' OR CONVERT( `pronounciation`USING utf8 ) LIKE '%$query%' OR CONVERT( `date` USING utf8 ) LIKE '%$query%' OR CONVERT( `usage` USING utf8 ) LIKE '%$query%' OR CONVERT( `notes` USING utf8 ) LIKE '%$query%' OR CONVERT( `source` USING utf8 ) LIKE '%$query%' OR CONVERT( `tags` USING utf8 ) LIKE '%$query%' OR CONVERT( `synonyms` USING utf8 ) LIKE '%$query%' OR CONVERT( `antonyms` USING utf8 ) LIKE '%$query%' OR CONVERT( `relatedwordforms` USING utf8 ) LIKE '%$query%' )";
		
		
		$query = $this->db->query($sql);
		
		echo '<br/>'.$query->num_rows()." result(s) found for <i><u>$squery</i></u>".'<br/>'.'<br/>';
		
		foreach ($query->result() as $row)
		{
			$url = site_url("word/wordview/".$row->wordid);
			echo "<a href='".$url."'><b>".$row->word.'</b><br/></a>';
			if($row->simplemeaning)
				echo trim($row->simplemeaning).'<br/>';
			if($row->meaning)
				echo trim($row->meaning).'<br/>';
			echo '----------------------------------------------------------------'.'<br/>';
		}
	}
	
}
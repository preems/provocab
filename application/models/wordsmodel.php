<?php

class Wordsmodel extends CI_Model {

	public function random($limit=10)
	{
		$this->db->order_by("word", "random");
		$this->db->limit($limit);
		$this->db->where('uid',$this->facebook->getUser());
		$query =$this->db->get('words');
		$result = $query->result();
		return $result;

	}

	public function byDate($date)
	{
		$this->db->where('uid',$this->facebook->getUser());
		$this->db->where('date',$date);
		$query = $this->db->get('words');
		$resultset = $query->result();
		return $resultset;
	}

	public function starred()
	{
		$this->db->where('uid',$this->facebook->getUser());
		$this->db->where('starred',1);
		$query = $this->db->get('words');
		$resultset = $query->result();
		return $resultset;
	}

	public function genius()
	{
		$uid=$this->facebook->getUser();
		$query = $this->db->query("SELECT `remembered`-`forgotten` as 'diff',word,forgotten,`remembered`,`simplemeaning`,`meaning`,`starred`,`wordid`,`usage` from words WHERE uid=$uid ORDER BY diff limit 0,42");
		$resultset = $query->result();
		return $resultset;
	}

	public function insert($data)
	{
		return $this->db->insert('words',$data);
	}

	public function search($query)
	{
		if(($query==null) || ($query==''))
		{
			echo 'No search query passed';
			return false;
		}
		$uid=$this->facebook->getUser();
		$sql = "SELECT * FROM `words` WHERE ( CONVERT( `wordid` USING utf8 ) LIKE '%$query%' OR CONVERT( `word` USING utf8 ) LIKE '%$query%' OR CONVERT( `meaning` USING utf8 ) LIKE '%$query%' OR CONVERT( `simplemeaning` USING utf8 ) LIKE '%$query%' OR CONVERT( `pronounciation`USING utf8 ) LIKE '%$query%' OR CONVERT( `date` USING utf8 ) LIKE '%$query%' OR CONVERT( `usage` USING utf8 ) LIKE '%$query%' OR CONVERT( `notes` USING utf8 ) LIKE '%$query%' OR CONVERT( `source` USING utf8 ) LIKE '%$query%' OR CONVERT( `tags` USING utf8 ) LIKE '%$query%' OR CONVERT( `synonyms` USING utf8 ) LIKE '%$query%' OR CONVERT( `antonyms` USING utf8 ) LIKE '%$query%' OR CONVERT( `relatedwordforms` USING utf8 ) LIKE '%$query%' ) and uid=$uid";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getWordById($id)
	{
		$this->db->where('uid',$this->facebook->getUser());
		$this->db->where('wordid',$id);
		$query = $this->db->get('words');
		$result =$query->row_array();
		return $result;
	}

	public function delete($wordid)
	{
		//Delete Events beloning to that work
		//$this->db->where('uid',$this->facebook->getUser());
		//$this->db->where('wordid',$wordid);
		//$this->db->delete('events');


		$this->db->where('uid',$this->facebook->getUser());
		$this->db->where('wordid',$wordid);
		$this->db->delete('words');
		return $this->db->affected_rows();

	}

	public function recentwords($limit)
	{
		$this->db->order_by("wordid", "desc");
		$this->db->limit($limit);
		$this->db->where('uid',$this->facebook->getUser());
		$query =$this->db->get('words');
		$result = $query->result();
		return $result;

	}

}

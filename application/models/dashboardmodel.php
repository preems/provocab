<?php

class Dashboardmodel extends CI_Model {

	public function wordcount()
	{
		$uid = $this->facebook->getUser();

		$sql = read_file('application/sql/dashboard-wordcount.sql').$uid;
		$query = $this->db->query($sql);
     	return $query->result_array()[0];
	}


	public function weeklycount()
	{
		$uid = $this->facebook->getUser();

		$sql = str_replace('<uid>',$uid,read_file('application/sql/dashboard-weeklycount.sql'));
		$query = $this->db->query($sql);
		$result = $query->result_array();

		$string ='[["Day","Words"],';

		foreach ($result as $day) {
			$string .='["'.$day['day'].'",'.$day['words'].'],';
		}
		$string.="]";
		return $string;
	}

	public function othersrandomwords($limit)
	{
		$this->db->order_by("word", "random");
		$this->db->limit($limit);
		$query =$this->db->get('randomwords');
		$result = $query->result();
		return $result;
	}

}
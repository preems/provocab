<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller
{
	function word_get()
    {
		$this->load->database();
        if($this->get('id'))
        {
			$query = $this->db->get_where('words',array('wordid'=>$this->get('id')));
			$word =$query->row();
			if($query->num_rows>0)
			{
				$this->response($word, 200); // 200 being the HTTP response code
			}
			else
			{
				$this->response(array('error' => 'Word could not be found'), 404);
			}	
        }
		else if($this->get('word'))
        {
			$query = $this->db->get_where('words',array('word'=>$this->get('word')));
			$word =$query->row();
			if($query->num_rows>0)
			{
				$this->response($word, 200); // 200 being the HTTP response code
			}
			else
			{
				$this->response(array('error' => 'Word could not be found'), 404);
			}	
		}
		
		else if($this->get('random'))
		{
			$this->db->order_by("word", "random");
			$this->db->limit($this->get('random'));
			$query =$this->db->get('words');
			$words =$query->result();
			if($query->num_rows>0)
			{
				$this->response($words, 200); // 200 being the HTTP response code
			}
			else
			{
				$this->response(array('error' => 'Word could not be found'), 404);
			}
			
		}
		else if ( $this->get('tag'))
		{
			$this->db->like('tags',$this->get('tag'));
			$query = $this->db->get('words');
			$words =$query->result();
			if($query->num_rows>0)
			{
				$this->response($words, 200); // 200 being the HTTP response code
			}
			else
			{
				$this->response(array('error' => 'No words with matching tag'), 404);
			}
		
		}
		
		else if ( $this->get('source'))
		{
			$this->db->like('source',$this->get('source'));
			$query = $this->db->get('words');
			$words =$query->result();
			if($query->num_rows>0)
			{
				$this->response($words, 200); // 200 being the HTTP response code
			}
			else
			{
				$this->response(array('error' => 'No words with matching source'), 404);
			}
		
		}		
		
		
		else if ( $this->get('starred'))
		{
			$this->db->where('starred',1);
			if($this->get('start'))
				$this->db->limit($this->get('starred'),$this->get('start'));
			else
				$this->db->limit($this->get('starred'));
			$query = $this->db->get('words');
			$words =$query->result();
			if($query->num_rows>0)
			{
				$this->response($words, 200); // 200 being the HTTP response code
			}
			else
			{
				$this->response(array('error' => 'No Starred words'), 404);
			}
		
		}
		
		else if ( $this->get('srandom'))
		{
			$this->db->where('starred',1);
			$this->db->order_by("word", "random");
			$this->db->limit($this->get('srandom'));
			$query = $this->db->get('words');
			$words =$query->result();
			if($query->num_rows>0)
			{
				$this->response($words, 200); // 200 being the HTTP response code
			}
			else
			{
				$this->response(array('error' => 'No Starred words'), 404);
			}
		
		}		
		
		else if($this->get('recent'))
		{
			$this->db->order_by("wordid", "desc");
			if($this->get('start'))
				$this->db->limit($this->get('recent'),$this->get('start'));
			else
				$this->db->limit($this->get('recent'));
			$query =$this->db->get('words');
			$words=$query->result();
			if($query->num_rows>0)
			{
				$this->response($words, 200); // 200 being the HTTP response code
			}
			else
			{
				$this->response(array('error' => 'Words could not be found'), 404);
			}
		
		}
		
		
		else
		{
			$this->response(NULL, 400);
		}
		
	}
	
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
     {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->helper('date');
			$this->load->library('calendar');
			
			$dateformat="%Y-%m-%d";
			$curdate = mdate($dateformat);
			$query = $this->db->get_where('words',array('date'=>$curdate));
			$resultset = $query->result();
			date_default_timezone_set ( "Asia/Kolkata" );
			
			
			
     }


	private function getprogress()
	{
		$dateformat="%Y-%m-%d";
		
		$curdate = mdate($dateformat);
		$query = $this->db->get_where('words',array('date'=>$curdate));
		$resultset = $query->result();
			
		return $query->num_rows*10;
	
	}
	 
	public function index()
	{
	
		$dateformat="%Y-%m-%d";
		$data['progress'] = $this->getprogress();
		$curdate = mdate($dateformat);
		
		//$query = $this->db->get_where('words',array('date'=>$curdate));
		
		$this->db->order_by("word", "random");
		$this->db->limit(10);
		$query =$this->db->get('words');
		
		
		$resultset = $query->result();
		
		if($query->num_rows ==0 )
		{
			
			$data['child_page']="<p>No Words for $curdate</p>";
			$this->load->view('mobilemaster',$data);
		}
		else
		{
			$result['resultset']=$resultset;
			$data['title']='Word Master | Today';
			$data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			$data['child_page']='<p>Do u remember these words ?</p>'.$data['child_page'];
			$this->load->view('mobilemaster',$data);
		}
	
	}
	 
	public function insert()
	{
	
		if($_POST)
		{
		
			$this->db->insert('words',$_POST);
		
		}
		$data['title']='Word Master';
	
		$data['child_page']=$this->load->view('wordform',null,true);
		$data['progress'] = $this->getprogress();
		$this->load->view('mobilemaster',$data);
	}
	
	
	public function wordview($id)
	{
	
		$query = $this->db->get_where('words',array('wordid'=>$id));
		$res =$query->row();
		
		$data['title']='Word Master | View';
		$data['child_page']=$this->load->view('wordview',$res,true);
		$data['progress'] = $this->getprogress();
		$this->load->view('mobilemaster',$data);
	}
	
	public function today()
	{
		$dateformat="%Y-%m-%d";
		
		$curdate = mdate($dateformat);
		
		$query = $this->db->get_where('words',array('date'=>$curdate));
		$resultset = $query->result();
		
		if($query->num_rows ==0 )
		{
			
			$data['child_page']="<p>No Words for $curdate</p>";
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}
		else
		{
			$result['resultset']=$resultset;
			$data['title']='Word Master | Today';
			$data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}
		
	
	}
	
	public function starred()
	{
		
		$query = $this->db->get_where('words',array('starred'=>1));
		$resultset = $query->result();
		
		if($query->num_rows ==0 )
		{
			
			$data['child_page']="<p>No Starred Words</p>";
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}
		else
		{
			$result['resultset']=$resultset;
			$data['title']='Word Master | Starred Words';
			$data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}
		
	
	}
	
		public function wordlist($page=0)
	{
		
		$query = $this->db->get('words',40,($page-1)*40);
		$resultset = $query->result();
		
		if($query->num_rows ==0 )
		{
			
			$data['child_page']="<p>No Words Returned</p>";
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}
		else
		{
			$result['resultset']=$resultset;
			$data['title']='Word Master | List Words';
			$data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}	
	}
	
	
	
	public function yesterday()
	{
	
		$dateformat="%Y-%m-%d";
		$yestTime = time() - (1 * 24 * 60 * 60);
                   // 1 day; 24 hours; 60 mins; 60secs
		$curdate = mdate($dateformat,$yestTime);
		
		$query = $this->db->get_where('words',array('date'=>$curdate));
		$resultset = $query->result();
		
		if($query->num_rows ==0 )
		{
			
			$data['child_page']="<p>No Words for $curdate</p>";
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}
		else
		{
			$result['resultset']=$resultset;
			$data['title']='Word Master | Yesterday';
			$data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}
	
	}
	
	
	public function weekbefore()
	{
	
		$dateformat="%Y-%m-%d";
		$yestTime = time() - (7 * 24 * 60 * 60);
                   // 7 day; 24 hours; 60 mins; 60secs
		$olddate = mdate($dateformat,$yestTime);
		
		$query = $this->db->get_where('words',array('date'=>$olddate));
		$resultset = $query->result();
		if($query->num_rows ==0 )
		{
			
			$data['child_page']="<p>No Words for $olddate</p>";
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}
		else
		{
			$result['resultset']=$resultset;
			$data['title']='Word Master | A week before';
			$data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}
	
	}
	
	public function day($year,$month,$day)
	{
	
		$date="$year-$month-$day";
		$query = $this->db->get_where('words',array('date'=>$date));
		$resultset = $query->result();
		if($query->num_rows ==0 )
		{
			
			$data['child_page']="<p>No Words for $date</p>";
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}
		else
		{
			$result['resultset']=$resultset;
			$data['title']='Word Master | A week before';
			$data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}
	}
	
		public function genius ($page=0)
	{
		$query = $this->db->query("SELECT `remembered`-`forgotten` as 'diff',word,forgotten,`remembered`,`simplemeaning`,`meaning`,`starred`,`wordid`,'usage' from words ORDER BY diff limit 0,42");
		$resultset = $query->result();
		if($query->num_rows ==0 )
		{
			
			$data['child_page']="<p>No words in Genius list</p>";
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}
		else
		{
			$result['resultset']=$resultset;
			$data['title']='Word Master | Genius List';
			$data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			$data['progress'] = $this->getprogress();
			$this->load->view('mobilemaster',$data);
		}
	
	
	}	
	function calender($year,$month)
	{
		$data['month']=$month;
		$data['year']=$year;
		$data['title']='Word Master | Monthly view';
		$data['child_page']=$this->load->view('calender',$data,true);
		$data['progress'] = $this->getprogress();
		$this->load->view('mobilemaster',$data);
	
	}
	
	function rootinsert()
	{
	
		if($_POST)
		{
		
			$this->db->insert('roots',$_POST);
		
		}
		$data['title']='Word Master';
	
		$data['child_page']=$this->load->view('rootform',null,true);
		$data['progress'] = $this->getprogress();
		$this->load->view('mobilemaster',$data);
	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
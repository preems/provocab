<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Word extends CI_Controller {

	var $name,$ppic,$logouturl;

	 public function __construct()
     {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->helper('date');
			$this->load->helper('file');
			$this->load->library('calendar');
			//$this->load->library('session');
			$this->load->library('facebook');
			$this->load->library('auth');
			$this->load->model('Wordsmodel');
			$this->load->model('Dashboardmodel');
			$config = $this->config->item('facebook');
			$this->load->library('Facebook', $config);
			$dateformat="%Y-%m-%d";
			$curdate = mdate($dateformat);

			date_default_timezone_set ( "Asia/Kolkata" );
			
			
     }

     private function isAuth()
     {
     	global $name,$ppic,$logouturl;
     	if(!$this->facebook->getUser())
     	{
     		
     		//redirect(site_url('word/login'));
     		$name="";
     		$ppic="";

     		$data['loginurl'] = $this->facebook->getLoginUrl(array('scope'=>'email'));

			//$this->renderPage(true,'login',$data,'Wordmaster | Login');
			$this->load->view('landing',$data);
			return false;
     	}
     	else
     	{
     		$response = $this->facebook->api('/me');
     		$name = $response['name'];
     		$ppic = 'https://graph.facebook.com/'.$response['username'].'/picture';
     		$logouturl = $this->facebook->getLogoutUrl( array( 'next' => 'http://provocab.com/word/logout'));


     	}

     	if($this->auth->isNewUser())
     	{
     		$this->auth->insertUser();
     	}

     	return true;
     }

     /*public function login()
     {
     	$data['title']='Word Master | Login';
     	$data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email'));
		$data['child_page']=$this->load->view('login',$data,true);
		$this->load->view('master',$data);

     }*/

     private function renderPage($isViewPage,$subPageName,$obj,$title)
     {

     	global $name,$ppic,$logouturl;
     	$data['title']=$title;
     	$data['fullname']=$name;
     	$data['ppic']=$ppic;
     	$data['logouturl']=$logouturl;
     	if($isViewPage)
     	{
     		
     		$data['child_page']=$this->load->view($subPageName,$obj,true);
			$this->load->view('master',$data);
     	}
     	else
     	{
     		$data['child_page']=$subPageName;
			$this->load->view('master',$data);

     	}
     }


	/*private function getprogress()
	{
		$dateformat="%Y-%m-%d";
		
		$curdate = mdate($dateformat);
		$query = $this->db->get_where('words',array('date'=>$curdate));
		$resultset = $query->result();
			
		return $query->num_rows*10;
	
	}*/
	 
	public function index()
	{

		if(!$this->isAuth())
			return;
	
		//$query = $this->db->get_where('words',array('date'=>$curdate));
		
		//$this->db->order_by("word", "random");
		//$this->db->limit(10);
		//$this->db->where('uid',$this->facebook->getUser());
		//$query =$this->db->get('words');
		
		/*
		//$resultset = $query->result();
		$resultset = $this->Wordsmodel->random(10);
		
		if(count($resultset) ==0 )
		{
			//$data['title']='Word Master';
			//$data['child_page']="<p>You have not learnt any words. Start adding new words by Clicking Insert in the sidebar</p>";
			//$this->load->view('master',$data);
			$this->renderPage(false,"<p>You have not learnt any words. Start adding new words by Clicking <a href=".site_url('word/insert').">Insert </a>in the sidebar. Read <a href=".site_url('word/howtouse').">How to use</a></p>",null,'Wordmaster');
		}
		else
		{
			$result['resultset']=$resultset;
			//$data['title']='Word Master';
			//$data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			//$data['child_page']='<p>Do u remember these words ?</p>'.$data['child_page'];
			//$this->load->view('master',$data);

			$this->renderPage(true,'wordlist-tiles',$result,'Word Master');
		}
		*/

		$data = $this->Dashboardmodel->wordcount();
		$data['weeklycountstring']=$this->Dashboardmodel->weeklycount();

		$data['otherswords']=$this->Dashboardmodel->othersrandomwords(20);
		$data['recentwords']=$this->Wordsmodel->recentwords(20);
		$data['showTutorialUserSet']=$this->auth->getUserSetting('showtutorial');

		$this->renderPage(true,'dashboard',$data,'Dashboard | Pro Vocab');
	
	}
	 
	public function insert()
	{
		if(!$this->isAuth())
			return;

		if($_POST)
		{
			$_POST['uid'] = $this->facebook->getUser();

			if ($this->Wordsmodel->insert($_POST))
				echo 'success';
			else
				die('failed to insert word');
			return;
		}
		

		//$data['title']='Insert | Wordmaster';
		//$data['child_page']=$this->load->view('wordform',null,true);
		//$data['progress'] = $this->getprogress();
		//$this->load->view('master',$data);
		$this->renderPage(true,'wordform',null,'Insert | Pro Vocab');
	}
	
	
	public function wordview($id)
	{
		if(!$this->isAuth())
			return;
	
		if($_POST)
		{
			$this->db->where('wordid',$id);
			$query = $this->db->update('words',$_POST);
			if($this->db->affected_rows() != 1 )
				die('Could not update');
		}

		$res = $this->Wordsmodel->getWordById($id);
		//var_dump($res);
		if(count($res) ==0 )
		{
			show_404(current_url(),true);
		}
		
		//$data['title']='Word Master | View';
		//$data['child_page']=$this->load->view('wordview',$res,true);
		//$data['progress'] = $this->getprogress();
		//$this->load->view('master',$data);
		$this->renderPage(true,'wordview',$res,'View | Pro Vocab');
	}
	
	public function today()
	{

		if(!$this->isAuth())
			return;

		$dateformat="%Y-%m-%d";
		$curdate = mdate($dateformat);
		$result = $this->Wordsmodel->byDate($curdate);
		$result['resultset']=$result;
		$this->renderPage(true,'wordlist-tiles',$result,'Today | Pro Vocab');

		/*$query = $this->db->get_where('words',array('date'=>$curdate));
		$resultset = $query->result();
		
		if($query->num_rows ==0 )
		{
			
			// $data['child_page']="<p>No Words for $curdate</p>";
			// $data['progress'] = $this->getprogress();
			// $this->load->view('master',$data);
			$this->renderPage(false,"<p>No Words for $curdate</p>",$result,'Today | Wordmaster');
		}
		else
		{
			$result['resultset']=$resultset;
			// $data['title']='Word Master | Today';
			// $data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			// $data['progress'] = $this->getprogress();
			// $this->load->view('master',$data);
			$this->renderPage(true,'wordlist-tiles',$result,'Today | Wordmaster');
		}
		*/
	
	}
	
	
	public function starred()
	{

		if(!$this->isAuth())
			return;

		$result = $this->Wordsmodel->starred();
		$result['resultset']=$result;
		$this->renderPage(true,'wordlist-tiles',$result,'Starred words | Pro Vocab');

		
		/*$query = $this->db->get_where('words',array('starred'=>1));
		$resultset = $query->result();
		
		if($query->num_rows ==0 )
		{
			
			// $data['child_page']="<p>No Starred Words</p>";
			// $data['progress'] = $this->getprogress();
			// $this->load->view('master',$data);
			$this->renderPage(false,"<p>No Starred Words",$result,'Today | Wordmaster');
		}
		else
		{
			$result['resultset']=$resultset;
			// $data['title']='Word Master | Starred Words';
			// $data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			// $data['progress'] = $this->getprogress();
			// $this->load->view('master',$data);
			$this->renderPage(true,'wordlist-tiles',$result,'Today | Wordmaster');
		}*/
		
	
	}
	
	/*
	public function wordlist($page=0)
	{
		
		$query = $this->db->get('words',40,($page-1)*40);
		$resultset = $query->result();
		
		if($query->num_rows ==0 )
		{
			
			$data['child_page']="<p>No Words Returned</p>";
			$data['progress'] = $this->getprogress();
			$this->load->view('master',$data);
		}
		else
		{
			$result['resultset']=$resultset;
			$data['title']='Word Master | Starred Words';
			$data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			$data['progress'] = $this->getprogress();
			$this->load->view('master',$data);
		}	
	}*/
	
	
	public function yesterday()
	{

		if(!$this->isAuth())
			return;
	
		$dateformat="%Y-%m-%d";
		$yestTime = time() - (1 * 24 * 60 * 60);
                   // 1 day; 24 hours; 60 mins; 60secs
		$date = mdate($dateformat,$yestTime);
		$result = $this->Wordsmodel->byDate($date);
		$result['resultset']=$result;
		$this->renderPage(true,'wordlist-tiles',$result,'Yesterday | Pro Vocab');
		
		/*$query = $this->db->get_where('words',array('date'=>$curdate));
		$resultset = $query->result();
		
		if($query->num_rows ==0 )
		{
			
			// $data['child_page']="<p>No Words for $curdate</p>";
			// $data['progress'] = $this->getprogress();
			// $this->load->view('master',$data);
			$this->renderPage(false,"<p>No Words for $curdate</p>",$result,'Today | Wordmaster');
		}
		else
		{
			$result['resultset']=$resultset;
			// $data['title']='Word Master | Yesterday';
			// $data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			// $data['progress'] = $this->getprogress();
			// $this->load->view('master',$data);
			$this->renderPage(true,'wordlist-tiles',$result,'Yesterday | Wordmaster');
		}*/
	
	}
	
	public function daybefore()
	{
		if(!$this->isAuth())
			return;
	
		$dateformat="%Y-%m-%d";
		$time = time() - (2 * 24 * 60 * 60);
                   // 1 day; 24 hours; 60 mins; 60secs
		$date = mdate($dateformat,$time);

		$result = $this->Wordsmodel->byDate($date);
		$result['resultset']=$result;
		$this->renderPage(true,'wordlist-tiles',$result,'Day before | Pro Vocab');
		
		/*$query = $this->db->get_where('words',array('date'=>$curdate));
		$resultset = $query->result();
		
		if($query->num_rows ==0 )
		{
			
			// $data['child_page']="<p>No Words for $curdate</p>";
			// $data['progress'] = $this->getprogress();
			// $this->load->view('master',$data);
			$this->renderPage(false,"<p>No Words for $curdate</p>",$result,'Today | Wordmaster');
		}
		else
		{
			$result['resultset']=$resultset;
			// $data['title']='Word Master | A Day before';
			// $data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			// $data['progress'] = $this->getprogress();
			// $this->load->view('master',$data);
			$this->renderPage(true,'wordlist-tiles',$result,'Day before | Wordmaster');

		}*/
	
	}
	
	
	public function weekbefore()
	{
		if(!$this->isAuth())
			return;
	
		$dateformat="%Y-%m-%d";
		$time = time() - (7 * 24 * 60 * 60);
                   // 7 day; 24 hours; 60 mins; 60secs
		$date = mdate($dateformat,$time);
		$result = $this->Wordsmodel->byDate($date);
		$result['resultset']=$result;
		$this->renderPage(true,'wordlist-tiles',$result,'Week before | Pro Vocab');
		
		/*$query = $this->db->get_where('words',array('date'=>$olddate));
		$resultset = $query->result();
		if($query->num_rows ==0 )
		{
			
			// $data['child_page']="<p>No Words for $olddate</p>";
			// $data['progress'] = $this->getprogress();
			// $this->load->view('master',$data);
			$this->renderPage(false,"<p>No Words for $curdate</p>",$result,'Today | Wordmaster');
		}
		else
		{
			$result['resultset']=$resultset;
			// $data['title']='Word Master | A week before';
			// $data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			// $data['progress'] = $this->getprogress();
			// $this->load->view('master',$data);
			$this->renderPage(true,'wordlist-tiles',$result,'Week before | Wordmaster');
		}*/
	
	}
	
	public function day($year,$month,$day)
	{
		if(!$this->isAuth())
			return;
	
		$date="$year-$month-$day";
		$result = $this->Wordsmodel->byDate($date);
		$result['resultset']=$result;
		$this->renderPage(true,'wordlist-tiles',$result,'Wordmaster');
		/*$query = $this->db->get_where('words',array('date'=>$date));
		$resultset = $query->result();
		if($query->num_rows ==0 )
		{
			
			// $data['child_page']="<p>No Words for $date</p>";
			// $data['progress'] = $this->getprogress();
			// $this->load->view('master',$data);
			$this->renderPage(false,"<p>No Words for $curdate</p>",$result,'Today | Wordmaster');
		}
		else
		{
			$result['resultset']=$resultset;
			// $data['title']='Word Master | A week before';
			// $data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			// $data['progress'] = $this->getprogress();
			// $this->load->view('master',$data);
			$this->renderPage(true,'wordlist-tiles',$result,'Wordmaster');
		}*/
	
	}
	
	public function genius ($page=0)
	{
		if(!$this->isAuth())
			return;

		$result = $this->Wordsmodel->genius();
		$result['resultset']=$result;
		$this->renderPage(true,'wordlist-tiles',$result,'Genius list | Pro Vocab');
		/*
		$query = $this->db->query("SELECT `remembered`-`forgotten` as 'diff',word,forgotten,`remembered`,`simplemeaning`,`meaning`,`starred`,`wordid`,`usage` from words ORDER BY diff limit 0,42");
		$resultset = $query->result();
		if($query->num_rows ==0 )
		{
			
			$data['child_page']="<p>No words in Genius list</p>";
			$data['progress'] = $this->getprogress();
			$this->load->view('master',$data);
		}
		else
		{
			$result['resultset']=$resultset;
			$data['title']='Word Master | Genius List';
			$data['child_page']=$this->load->view('wordlist-tiles',$result,true);
			$data['progress'] = $this->getprogress();
			$this->load->view('master',$data);
		}*/
	
	}
	
	function calender($year,$month)
	{

		if(!$this->isAuth())
			return;

		$data['month']=$month;
		$data['year']=$year;
		//$data['child_page']=$this->load->view('calender',$data,true);
		//$data['progress'] = $this->getprogress();
		//$this->load->view('master',$data);
		$this->renderPage(true,'calender',$data,'Calender | Pro Vocab');
	
	}
	
	/*
	function rootinsert()
	{
	
		if($_POST)
		{
		
			$this->db->insert('roots',$_POST);
		
		}
		$data['title']='Word Master';
		
		$data['child_page']=$this->load->view('rootform',null,true);
		$data['progress'] = $this->getprogress();
		$this->load->view('master',$data);
	
	}*/
	
	function search()
	{

		if(!$this->isAuth())
			return;
	
		//$data['title']='Search | Wordmaster';
		//$data['child_page']=$this->load->view('search',null,true);
		//$data['progress'] = $this->getprogress();
		//$this->load->view('master',$data);

		$this->renderPage(true,'search',null,'Search words | Pro Vocab');	
	}

	function searchresults($query)
	{
		//This is an internal page. This should not be called directly
		$result['resultset'] = $this->Wordsmodel->search($query);
		
		echo '<div class="span12">';
		echo count($result['resultset'])." result(s) found for <i><u>".$query."</u></i><br/><br/>";
		echo "</div>";
		$this->load->view('wordlist-tiles',$result);
	}
	

	/*	
	function testepub()
	{
	
		$this->db->order_by("word", "random");
		$this->db->limit(200);
		$query =$this->db->get('words');
		
		
		$resultset = $query->result();
		
		if($query->num_rows ==0 )
		{
			
			$data['child_page']="<p>No Words for $curdate</p>";
			$this->load->view('master',$data);
		}
		
		echo '<docTitle><text>Wordmaster Random words</text></docTitle>';
		echo '<h1>Word list</h1>';
		
		foreach($resultset as $word)
		{
			
			echo '<h3>'.$word->word.'</h3>';
			echo '<p><b>'.$word->simplemeaning.'</b></p>';
			echo '<p>'.$word->meaning.'</p>';
			echo '<p>'.$word->synonyms.'</p>';
			
			echo '<hr/>';
		
		}
	
	
	}*/

	function howtouse()
	{
		if(!$this->isAuth())
			return;

		$this->renderPage(true,'howtouse',null,'How to use | Pro Vocab');	

	}
	
	function landing()
	{
		$this->load->view('landing');
	}
	
	function testdashboard()
	{
		/*if(!$this->isAuth())
			return;
		$data = $this->Dashboardmodel->wordcount();
		$data['weeklycountstring']=$this->Dashboardmodel->weeklycount();

		$data['otherswords']=$this->Dashboardmodel->othersrandomwords(20);
		$data['recentwords']=$this->Wordsmodel->recentwords(20);*/

		$data['modalcontent'] = $this->load->view('tutorialmodalcontent',null,true);
		$this->renderPage(true,'modal',$data,'Test | Pro Vocab');

	}


	function tutorialmodalcontent()
	{
		$this->load->view('tutorialmodalcontent');
	}

	function logout()
	{
		//$this->session->sess_destroy();
		unset($_SESSION);
		session_destroy();
		redirect('');
	}

	function settings()
	{
		if(!$this->isAuth())
			return;
		if($_POST)
		{
			if(isset($_POST['showtutorial']))
				$this->auth->updateUserSetting('showtutorial',1);
			else
				$this->auth->updateUserSetting('showtutorial',0);
			if(isset($_POST['sendweeklyreport']))
				$this->auth->updateUserSetting('sendweeklyreport',1);
			else
				$this->auth->updateUserSetting('sendweeklyreport',0);

		}

		$data = $this->auth->getLoggedinUserDetails();
		$this->renderPage(true,'settings',$data,'Settings | Pro Vocab');	

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
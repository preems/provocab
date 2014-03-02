<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct()
    {
    	 parent::__construct();
    	$this->load->library('facebook');
    	$this->load->database();
    	$this->load->model('Wordsmodel');
    	$this->load->helper('file');
    	$this->load->helper('url');
        $this->load->library('parser');
    	$this->load->library('mailer');

    }

    public function index()
    {
    	if( (!$this->facebook->getUser()) || ($this->facebook->getUser() != 1052655231))
     	{
     		die('You are not authorised to access this');
     	}
     	else
     	{
     		echo 'Access Granted';
     	}

    }

    public function sendweeklyreports()
    {
    	if( (!$this->facebook->getUser()) || ($this->facebook->getUser() != 1052655231))
     	{
     		die('You are not authorised to access this');
     	}
     	$uid = $this->facebook->getUser();
     	//$eventsql = "Select count(*) as count,action from events group by action where uid=$uid";

     	$sql = read_file('application/sql/weeklyreport.sql');
     	
     	$query = $this->db->query($sql);
     	$result = $query->result();

     	foreach ($result as $user) {

     		$msgbody = $this->parser->parse('email/weeklyreport',$user,true);
     		$msgtitle = 'ProVocab Weekly Stats Report';

            $sendmail = true; //Set this to false to print msg in screen instead of sending

            if($sendmail)
            {
                $response =$this->mailer->sendweeklyreportmail($user->{'email'},
                                                    $user->{'fullname'},
                                                    $msgtitle,
                                                    $msgbody);

                var_dump($response);
            }
            else
            {
                echo $msgbody;
                echo '<br/><br/><br/><br/><br/>';
            }
     		
     	}
    }

    public function sendgettingstarted()
    {
        if( (!$this->facebook->getUser()) || ($this->facebook->getUser() != 1052655231))
        {
            die('You are not authorised to access this');
        }

        $query = $this->db->get('fb_users');
        $result = $query->result();

        foreach ( $result as $user)
        {
            if($user->email != null)
            {
                $response = $this->mailer->sendGettingStartedmail($user->email,$user->fullname);
            }
        }

    }

    public function updatetemp()
    {
    	if( (!$this->facebook->getUser()) || ($this->facebook->getUser() != 1052655231))
     	{
     		die('You are not authorised to access this');
     	}

     	$query =$this->db->get('events');
     	$results = $query->result();



     	foreach ($results as $event) {



     		$word =$this->Wordsmodel->getWordById($event->wordid);
     		$this->db->where('pk',$event->pk);
     		$this->db->update('events',array('uid'=>$word['uid']));
     		if($this->db->affected_rows() >0)
     		{
     			echo '\npass '.$event->pk;
     		}
     		else
     		{
     			echo '\nfail '.$event->pk;
     		}
     		
     	}

    }

 }

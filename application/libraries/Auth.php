<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{

	public $CI;
	public function __construct()
	{
		global $CI;
		$CI = & get_instance();
		//$CI->load->library('database');
		$CI->load->database();
		$CI->load->library('facebook');
		$CI->load->library('mailer');
	}

	public function isNewUser()
	{
		global $CI;
		$CI->db->where('uid',$CI->facebook->getUser());
		$query = $CI->db->get('fb_users');
		if($query->num_rows > 0)
		{
			return false;
		}
		else
		{
			return true;
		}

	}

	public function insertUser()
	{
		global $CI;
		$response = $CI->facebook->api('/me');

		$CI->db->insert('fb_users',array(
							  'uid'=>$CI->facebook->getUser(),
							  'username'=>$response['username'],
							  'fullname'=>$response['name'],
							  'email'=>$response['email']
		));

		//Send Getting Started Mail to the New User
		if(null != $response['email'])
		{
			$CI->mailer->sendGettingStartedmail($response['email'],$response['name']);
		}
	}

	public function isAuthUser()
	{

	}

	public function updateUserSetting($setting,$value)
	{
		global $CI;
		$uid=$CI->facebook->getUser();
		$CI->db->where('uid',$uid);
		$CI->db->update('fb_users',array (
					$setting=>$value
			));
		return $CI->db->affected_rows();
	}

	public function getUserSetting($setting)
	{
		global $CI;
		$uid=$CI->facebook->getUser();
		$CI->db->where('uid',$uid);
		$CI->db->select($setting);
		$query =$CI->db->get('fb_users');
		if ($query->num_rows() == 1)
		{
			return $query->row_array()[$setting];
		}
		else
		{
			return "Failure";
		}


	}

	public function getLoggedinUserDetails()
	{
		global $CI;
		$uid=$CI->facebook->getUser();
		if(!$uid)
			return false;
		$CI->db->where('uid',$uid);
		$query =$CI->db->get('fb_users');
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}

}
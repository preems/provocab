<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailer
{
     public $CI;
    public function __construct()
    {
        global $CI;
        $CI = & get_instance();
        //$CI->load->library('database');
    }

    public function mandrill_sendmail($to,$toname,$subject,$body,$fromemail,$fromname,$tags)
    {
        $api_key='jL3PoOznxGKKyU589o_LMA';

        $json_template ='{"key": "jL3PoOznxGKKyU589o_LMA","message": {"html": "<p>Example HTML content</p>","text": null,"subject": "example subject","from_email": "help@provocab.com","from_name": "Pro vocab","to": [{"email": "talkwithpreetham@gmail.com","name": "Preetham MS","type": "to"}],"headers": {"Reply-To": "help@provocab.com"},"important": true,"track_opens": true,"track_clicks": true,"auto_text": true,"auto_html": true,"merge": true,"tags": ["weeklyreports","provocab"]}}';

        $json = json_decode($json_template);
        $json->{'key'}=$api_key;
        $json->{'message'}->{'html'} = $body;
        $json->{'message'}->{'subject'} = $subject;
        $json->{'message'}->{'from_email'} = $fromemail;
        $json->{'message'}->{'headers'}->{'Reply-To'} = $fromemail;
        $json->{'message'}->{'from_name'} = $fromname;
        $json->{'message'}->{'to'}[0]->{'email'} = $to;
        $json->{'message'}->{'to'}[0]->{'name'} = $toname;
        $json->{'message'}->{'tags'} = $tags;

        $api_url = 'https://mandrillapp.com/api/1.0/messages/send.json';

        return $this->curlpost($api_url,json_encode($json));
    }

    public function sendweeklyreportmail($to,$toname,$subject,$body)
    {
        $this->mandrill_sendmail($to,$toname,$subject,$body,'help@provocab.com','Pro Vocab',array('weeklyreports','provocab'));
    }

    public function curlpost($url,$body)
    {

        $ch = curl_init($url);
         
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         

        $response = curl_exec($ch);
        curl_close($ch);
        //var_dump($response);
        return $response;
    }

    public function sendGettingStartedmail($to,$toname)
    {
        global $CI;
        $body = $CI->load->view('email/gettingstarted','',true);
        //echo $body;
        $resp = $this->mandrill_sendmail($to,$toname,'Pro Vocab - Getting Started',$body,'help@provocab.com','Pro Vocab',array('gettingstarted','provocab'));
        //var_dump($resp);
    }

}
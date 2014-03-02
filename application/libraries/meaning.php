<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meaning
{

	public function wordnik($word)
	{
		//echo $word;
		$apikey='b41c16e7bcce08e419109050f8f0c9b3179b5c59130505111';
		$url ="http://api.wordnik.com:80/v4/word.json/".$word."/definitions?limit=5&includeRelated=true&useCanonical=false&includeTags=false&api_key=$apikey";
		$response = json_decode(file_get_contents($url));

		//var_dump($response);

		$ret="";
		if(count($response))
		{

			foreach ($response as $meaning) {
				$ret.="<li>".$meaning->{'text'}."</li>";
			}
			return $ret;
		}
		else
		{
			return "Aaahh !! Looks like this is not in our dictionary !!";
		}

	}
}


<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('script_tag'))
{
/**
 * Link External Script File
 *
 * Generates link to a script file, in conjunction with codeigniter default link_tag() helper
 *
 * @access	public
 * @param	string	script file
 * @return	string	external script tag
 */	
	function script_tag($file = '')
	{
		return "<script type=\"text/javascript\" src=\"" . $file . "\"></script>\n";
	}
}

if ( ! function_exists('selected_tab'))
{
/**
 * Use for making a tab selected
 *
 * Generates link to a script file, in conjunction with codeigniter default link_tag() helper
 *
 * @access	public
 * @param	string	script file
 * @return	string	external script tag
 */	
	function selected_tab($selectedtab,$tabname)
	{
		if( strcasecmp($selectedtab,$tabname) == 0 )
			return ' class="selected-tab"';
		else 
			return '';
	}
}

if ( ! function_exists('image_location'))
{
/**
 * Generate a location for images
 *
 * @access	public
 * @param	id		owner_id
 * @param	string	owner_name
 * @param	string	filename
 * @param	string	size
 * @return	string	image location
 */	
	function image_location($owner_id,$owner_name,$filename,$size)
	{
		if( strcasecmp($size,"thumb") == 0 )
		{
			$size = 'thumb';
		}
		else 
		{
			$size = 'reg';
		}
		
		# 'assets/images/userdata/'.$owner_id.'/thumb/'.$filename
		$folder = md5($owner_id.strtolower($owner_name));
		$location = 'assets/images/userdata/'.$folder.'/'.$size.'/'.$filename;
		
		return $location;
	}
}

if ( ! function_exists('debug'))
{
	function debug($data)
	{
		$string = "<pre>";
		$string .= print_r($data,true);
		$string .= "</pre>";
		
		return $string;
	}
}

if ( ! function_exists('nickname'))
{
	function nickname($data)
	{
		$aData = explode(" ",$data);
		return $aData[0];
	}
}

if ( ! function_exists('pronoun'))
{
	function pronoun($gender = null,$type)
	{
		if( $type == 1 )
			$pronoun = isset($gender)?($gender=="male"?"his":($gender=="female"?"her":"his/her")):"his/her";
		else if( $type == 2 )
			$pronoun = isset($gender)?($gender=="male"?"him":($gender=="female"?"her":"him/her")):"him/her";
		else 
			$pronoun = "her";
			
		return $pronoun;
	}
}


/* End of file my_helper.php */
/* Location: ./system/applications/helpers/my_helper.php */
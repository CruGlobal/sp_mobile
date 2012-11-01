<?php
class SummerProject {
	var $search = 'http://sp.campuscrusadeforchrist.com/projects.xml';
	var $post   = 'http://sp.campuscrusadeforchrist.com/projects/{ID}.xml';

	var $keys = array(
		'name',
		'city',
		'country',
		'partner',
		'aoa',
		'start_month',
		'start_day',
		'end_month',
		'end_day',
		'project_type',
		'focus',
		'from_weeks',
		'to_weeks',
		'job'
	);

	var $focuses = array(
	    4  => 'African American community',
	    15 => 'Art community',
	    13 => 'Art, Music, Film, Media',
	    5  => 'Asian American community',
	    9  => 'Athletes',
	    2  => 'Beach/Resort community (including co-workers)',
	    1  => 'College Campus/Launching spiritual movements',
	    23 => 'Elementary/Preschool',
	    22 => 'Ethnic Ministry',
	    27 => 'Fall/Spring Opportunities',
	    10 => 'For Health students',
	    6  => 'For High School Students',
	    7  => 'For International Students',
	    8  => 'Greeks',
	    3  => 'Hispanic/Latino community',
	    11 => 'Inner City community',
	    21 => 'International Orphan Care',
	    17 => 'Military community',
	    26 => 'Ministry to High School Students',
	    24 => 'Ministry to International Students',
	    25 => 'MK2MK',
	    19 => 'Prison Ministry',
	    16 => 'Serving a community in words and deeds',
	    14 => 'Take Biblical Courses',
	    18 => 'Taking the Jesus film to un-reached places',
	    12 => 'Use your Technical / Design / Administrative skills for ministry'
	);

	/**
	* Only allow real API keys to go across to the API
	* 
	* @param mixed $params
	*/
	private function clean($params) {
		$out = array();
		foreach($params as $key => $val) {
			if($key == 's') {
				$out['name'] = $val;	
			}
			if(in_array($key,$this->keys)) {
				$out[$key] = $val;
			}
		}
		return $out;
	}

	public function get_post($id) {

		$url = str_replace('{ID}',$id,$this->post);
		$xml = simplexml_load_file($url);

		return $this->map($xml);
	}

	/**
	* Maps the API keys/data to WP style
	* 
	*/
	function map($data) {
		$out = new stdClass();
		foreach($data as $key => $val) {
			switch($key) {
				case 'id':
					$out->ID = (int) $val;
					break;
				case 'name':
					$out->post_title = (string) $val;
					break;
				case 'description':
					$out->post_content = (string) $val;
					break;
				default:
					$out->{$key} = $val;
			}	
		}
		return $out;
	}

	/**
	* Make the connection to the https://sp.campuscrusadeforchrist.com/projects.xml API
	* 
	* @param mixed $params keys should match the API parameters
	*/
	public function search($params = array()) {
		//  must have some form of params to run a search
		if(count($params) == 0) {
			return array();
		}

		$params = $this->clean($params);

		$url = $this->search . '?' . http_build_query($params);
		$xml = simplexml_load_file($url);

		$posts = array();
		$i = 0;
		foreach($xml->{'sp-project'} as $project) {
			$posts[$i] = $this->map($project);
			$i++;
		}

		return $posts;
	}
}
?>

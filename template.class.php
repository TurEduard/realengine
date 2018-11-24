<?php
class Template {
	var $dir = '';
	var $template = null;
	var $tags = array ();
	var $block_tags = array ();

    function __construct($dir = false){
    	$this->dir = ROOT_DIR . '/templates/';
		if($dir) $this->dir .= $dir . '/';
	}

	function set($name, $var) {
		if( is_array( $var ) ) {
			if( count( $var ) ) {
				foreach ( $var as $key => $key_var ) {
					$this->set( $key, $key_var );
				}
			}
			return;
		}
		$var = str_replace(array("{", "["), array("_&#123;_", "_&#91;_"), $var);
			
		$this->tags[$name] = $var;
	}

	function set_block($name, $var) {
		if( is_array( $var ) ) {
			if( count( $var ) ) {
				foreach ( $var as $key => $key_var ) {
					$this->set_block( $key, $key_var );
				}
			}
			return;
		}
		
		$var = str_replace(array("{", "["),array("_&#123;_", "_&#91;_"), $var);
			
		$this->block_tags[$name] = $var;
	}

	function load($tpl_name) {
		$this->template = file_get_contents( $this->dir . "/" . $tpl_name );

		if(strtolower( end( explode( ".", $tpl_name ) ) ) != "tpl") {
			$this->template = "Not Allowed Template Name: " .str_replace(ROOT_DIR, '', $this->dir)."/".$tpl_name ;
			return "";
		}


		if( $tpl_name == '' || !file_exists( $this->dir . "/" . $tpl_name ) ) {
			$this->template = "Template not found: " .str_replace(ROOT_DIR, '', $this->dir)."/".$tpl_name ;
			return "";
		}

		$this->template = file_get_contents( $this->dir . "/" . $tpl_name );
		
		if (strpos ( $this->template, "{*" ) !== false) {
			$this->template = preg_replace("'\\{\\*(.*?)\\*\\}'si", '', $this->template);
		} 

		if( strpos( $this->template, "{include=" ) !== false ) {	
			$this->template = preg_replace_callback( "#\\{include=['\"](.+?)['\"]\\}#i", array( &$this, 'load'), $this->template );
		}
		return true;
	}
	
	function clear() {
		$this->tags = array ();
		$this->block_tags = array ();
		$this->template = null;
	
	}
	
	function compile() {
		if( count( $this->block_tags ) ) {
			foreach ( $this->block_tags as $key => $replace ) {
				$find_preg[] = $key;
				$replace_preg[] = $replace;
			}
			
			$this->template = preg_replace( $find_preg, $replace_preg, $this->template );
		}

		foreach ( $this->tags as $key => $replace ) {
			$find[] = $key;
			$replace[] = $replace;
		}
		
		$this->template = str_ireplace( $find, $replace, $this->template );

		
		$this->template = str_replace(array("_&#123;_", "_&#91;_"), array("{", "["), $this->template);

		$return = $this->template;
		$this->clear();
		return $return;
	}
}
?>


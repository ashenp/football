<?php
/**
 * @package    
 * @copyright   
 * @author       
 * @version     
 */

/**
 * debug Class
 *
 */
class debug{
	/**
     * Instance of this singleton
     *
     * @var http
     */
	static private $instance__;

	/**
     * Instance of this singleton class
     *
     * @return debug
     */
	static public function &instance (){
		if (!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}
	
	
	
}
?>
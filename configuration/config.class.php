<?php
class Config {
  public $prefix;
  public $sessionName;
  public $page_title;

  public function __construct(){
		$this->prefix = "td3s_";
    $this->sessionName = 'isonfoses_';
    $this->page_title = 'IS Infomation';
	}

  public function getPrefix(){
		return $this->prefix;
	}

  public function getSessionname(){
    return $this->sessionName;
  }

  public function getTitle(){
    return $this->page_title;
  }
}
?>

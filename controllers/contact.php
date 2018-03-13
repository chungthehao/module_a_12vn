<?php
	class ContactController extends Controller{
		public function __construct($param = NULL){
			parent::__construct();
			if( ! empty($param)){
				$actionName = $param[0];
				if(method_exists($this, $actionName)){
					$this->$actionName();
				}else{
					// $this->_view->test = '<h1>Vô, tồn tại tham số, nhưng ko có action đó</h1>';
					$this->index();
				}
			}else{
				// $this->_view->test = '<h1>Vô, KHÔNG tồn tại tham số</h1>';
				$this->index();
			}
		}
		public function index(){
			// echo '<h2>'.__METHOD__.'</h2>';
			$this->_view->class = 'contact';
			$this->_view->title = 'Contact @ Gordon&#39;s Crown';

			$this->_view->render('contact/index');
		}
	}
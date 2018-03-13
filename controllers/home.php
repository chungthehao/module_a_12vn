<?php
	class HomeController extends Controller{
		public function __construct($param = NULL){
			parent::__construct();
			if( ! empty($param)){
				$actionName = $param[0];
				if(method_exists($this, $actionName)){
					$this->$actionName();
				}else{
					$this->index();
				}
			}else{
				// echo '<h1>Vô</h1>';
				$this->index();
			}
		}
		public function index(){
			// echo '<h2>'.__METHOD__.'</h2>';
			$this->_view->class = 'home';
			$this->_view->title = 'Delicated to delicious British Food';

			$this->_view->render('home/index');
		}
	}
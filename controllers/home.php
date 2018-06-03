<?php
/*
 * HomeController: chạy khi
 * - Mới vào trang web
 * - Ko tồn tại controller từ URL ng dùng gõ vào
 */
	class HomeController extends Controller{
		public function __construct($param = NULL){
			parent::__construct();
			/*
			 * Xác định xem chạy action nào
			 * note: cẩn thận thôi, thực ra controller này mới có 1 action
			 */
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
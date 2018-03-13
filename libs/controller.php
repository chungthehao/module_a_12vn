<?php
	/**
	 * class Controller
	 * là 1 class cha để các controller con kế thừa,
	 * để có sẵn 1 số thứ
	 */
	class Controller{
		protected $_view; // sẽ là 1 View Obj

		public function __construct(){
			$this->_view = new View();
		}
	}
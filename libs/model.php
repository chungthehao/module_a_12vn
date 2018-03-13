<?php
	/**
	 * class Model
	 * Là 1 model cha, để các model con thừa kế
	 */
	class Model{
		// CÁC THUỘC TÍNH
		protected $_db;

		// CÁC PHƯƠNG THỨC
		// 
		// hàm dựng
		public function __construct(){
			$this->_db = new Database();
		}


	}
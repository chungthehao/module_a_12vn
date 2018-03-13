<?php
	class CategoryModel extends Model{

		public function __construct(){
			parent::__construct();

		}
		// TRẢ VỀ TẤT CẢ CÁC CATE
		public function getAllCate(){
			$sql = 'SELECT * FROM category';
			$result = $this->_db->executeQuery($sql);
			return $result;
		}
	}
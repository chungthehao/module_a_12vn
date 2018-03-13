<?php
	class MenuModel extends Model{

		public function __construct(){
			parent::__construct();

		}
		
		/**
		 * 	Lấy tất cả menu
		 */
		public function getAllMenu(){
			$sql = "SELECT m.*, c.title AS cate_title
					FROM menu m
					INNER JOIN category c ON m.cate_id = c.id";
			return $this->_db->executeQuery($sql);
		}

		/**
		 * Lấy menu với 1 alias cụ thể
		 */
		public function getMenuByAlias($alias){
			$sql = "SELECT m.*, c.title AS cate_title
					FROM menu m
					INNER JOIN category c ON m.cate_id = c.id
					WHERE m.alias = '$alias'";
			return $this->_db->executeQuery($sql);
		}

		public function getMenuById($id){
			$sql = "SELECT m.*, c.title AS cate_title
					FROM menu m
					INNER JOIN category c ON m.cate_id = c.id
					WHERE m.id = $id";
			return $this->_db->executeQuery($sql);
		}

		public function getMenuByCateId($cateId){
			$sql = "SELECT m.*, c.title AS cate_title
					FROM menu m
					INNER JOIN category c ON m.cate_id = c.id
					WHERE m.cate_id = $cateId
					ORDER BY m.title ASC";
			return $this->_db->executeQuery($sql);
		}

		public function rateMenu($menuId, $score){
			$sql = "UPDATE menu 
					SET rate = rate + 1, score = score + $score
					WHERE id = $menuId";
			$this->_db->executeNonQuery($sql);
		}
	}
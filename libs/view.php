<?php
	/**
	 * class View
	 * 1 class để phục vụ cho việc xuất giao diện,
	 * chẳng hạn như render file nào đó... trong action
	 * Ngoài ra, còn dùng để truyền tham số từ controller qua bên view
	 */
	class View{
		// Hàm dựng
		public function __construct(){

		}

		// render method
		public function render($viewPath, $include = TRUE){
			if($include){
				require 'views/header.php';
				require "views/$viewPath.php";
				require 'views/footer.php';
			}else{
				require "views/$viewPath.php";
			}
		}
	}
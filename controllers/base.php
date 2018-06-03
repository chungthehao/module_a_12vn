<?php
// CHÚ Ý: Khi đối tượng của class này đc khởi tạo thì chắc chắn là đã
// chạy từ file index.php CHÍNH.
// Còn nếu URL mà tồn tại file/folder (trừ 2 cái dưới) thì .htaccess cho chạy 
// file/folder đó chứ ko chạy file index.php CHÍNH (ko có tạo obj của class này)
// (trừ 2 URL này: http://localhost/module_a_12vn/ or http://localhost/module_a_12vn/index.php)

/*
 * class BaseController
 * - Xử lý đường dẫn URL để biết sẽ chạy controller nào, tham số là gì
 */
class BaseController{
	private $_controller;
	private $_param;

	public function __construct($param = NULL){
		$this->parseURL();
		$this->load();
	}

	/*
	 * Method này xác định 2 thuộc tính: $_controller, $_param
	 */
	private function parseURL(){ 			
		// $_GET['url'] = 'menu/plate-of-scottish-smoked-salmon'
		// Xem file .htaccess để hiểu rõ dòng dưới
		$url = isset($_GET['url']) ? $_GET['url'] : '';
		if($url != ''){
			// Tách chuỗi nhận đc thành mảng
			$urlArr = explode('/', $url);

			// Phần tử đầu tiên của mảng đc mình quy ước là controller
			$this->_controller = $urlArr[0];// $this->_controller = 'menu'
			array_shift($urlArr); // xoá bỏ phần tử đầu tiên của mảng

			// Các giá trị còn lại của mảng có thể là:
			// tham số cho showDetail action: http://localhost/module_a_12vn/menu/cobb-salad
			// tham số đc chạy writeRSS action: http://localhost/module_a_12vn/menu/feed
			// rỗng ==> sẽ chạy index action của controller đó
			$this->_param = array();
			if(count($urlArr) > 0){
				foreach($urlArr as $v){
					if(trim($v) != ''){		
						// $this->_param = ['plate-of-scottish-smoked-salmon']
						array_push($this->_param, $v);
					}
				}
			}else{
				array_push($this->_param, 'index');
			}
		}else{ 
			// nếu ko có $_GET['url'] --> chạy lần đầu
			// http://localhost/module_a_12vn/
			// Xem thêm .htaccess
			// Khi URL như trên, thì folder tồn tại, trong folder có
			// file index.php ==> chạy file này, ko có rewrite gì hết
			$this->_controller = 'home';
		}
	}

	/*
	 * Method load(): load controller và chạy action tương ứng
	 * note: nếu tham số bậy bạ, ko tồn tại controller thì chạy HomeController
	 */
	private function load(){
		// menu ---> MenuController
		$className = ucfirst($this->_controller).'Controller';
		$fileName = $this->_controller;
		$filePath = "controllers/$fileName.php";
		if(file_exists($filePath)){
			require $filePath;
			new $className($this->_param);
		}else{
			require 'controllers/home.php';
			new HomeController(); 
		}
	}
}
<?php
	class MenuController extends Controller{

		public function __construct($param = NULL){
			parent::__construct();

			// Chuẩn bị để sau này tương tác với model
			require 'models/menu.php';
			require 'models/category.php';

			/*
			 * Xác định xem chạy action nào (4): index, showDetail, rate, writeRSS
			 * - http://localhost/module_a_12vn/menu(/index)
			 * - http://localhost/module_a_12vn/menu/plate-of-scottish-smoked-salmon
			 * - submit form (post) có input ẩn name:action, value:rate
			 * - http://localhost/module_a_12vn/menu/feed/
			 */
			$action = isset($_POST['action']) ? $_POST['action'] : '';
			if($action == ''){ // Mới chạy lần đầu
				if(empty($param) || $param[0] == 'index'){
					// echo '<pre>';
					// print_r($param);
					// echo '</pre>'; die();
					$this->index();
				}
				if($param[0] == 'feed'){
					$this->writeRSS();
				}
				$this->showDetail($param[0]);
			}elseif ($action == 'rate') { // Khi ngta đánh giá món ăn
				$this->rate();
			}
		}

		public function index(){ // liệt kê tất cả menu ra
			$menuModel = new MenuModel();
			$cateModel = new CategoryModel();

			$cateList = $cateModel->getAllCate();
			foreach($cateList as $k => $cate){
				$menuListByCate = $menuModel->getMenuByCateId($cate['id']);
				$cateList[$k]['menuList'] = $menuListByCate;

				$theNumberOfRatings = 0;// Tổng số LƯỢT đánh giá của cate này (+ từng menu lại)
				$AverageRatings = 0; // ĐIỂM đánh giá tb của cate (tb của từng điểm tb menu)
				$theNumberOfMenu = 0; // Đếm số món ăn trong cate này
				$TotalMenuAverageRatings = 0;
				foreach($menuListByCate as $menu){
					$theNumberOfRatings += $menu['rate']; // số lượt đánh của riêng menu này
					if($menu['rate'] != 0){
						$TotalMenuAverageRatings += $menu['score'] / $menu['rate'];// Điểm tb của menu này
					}
					$theNumberOfMenu++;
				}
				$AverageRatings = round($TotalMenuAverageRatings/$theNumberOfMenu, 1);

				// Cho kết quả vào $cateList, chuẩn bị truyền ra view
				$cateList[$k]['rate'] = $theNumberOfRatings;
				if($theNumberOfRatings > 1){
					$cateList[$k]['more'] = 's';
				}else{
					$cateList[$k]['more'] = '';
				}
				$cateList[$k]['aveRatings'] = $AverageRatings;
			}
			// echo '<pre>';
			// print_r($cateList);
			// echo '</pre>';
			$this->_view->cateList = $cateList;
			$this->_view->class = 'menu';
			$this->_view->title = 'Menu @ Gordon&#39;s Crown';
			$this->_view->js = '<script type="text/javascript" src="'.PATH.'media/js/menu.js"></script>';

			$this->_view->render('menu/index');
		} // hết index method

		/*
		 * Chi tiết món ăn
		 */
		public function showDetail($alias){
			$menuModel = new MenuModel();
			$menu = $menuModel->getMenuByAlias($alias);

			if(count($menu) != 0){
				$menu = $menu[0];
				if($menu['rate'] > 1){
					$menu['avrScore'] = round($menu['score']/$menu['rate'], 1);
					$menu['more'] = 's';
				}else{
					$menu['avrScore'] = $menu['score'];
					$menu['more'] = '';
				}
				$this->_view->title = $menu['title'].' - &pound;'.$menu['price'].' @ Gordon&#39;s Crown';
				$this->_view->menu = $menu;
				$this->_view->class = 'menu';
				$this->_view->js = '<script type="text/javascript" src="'.PATH.'media/js/rating.js"></script>';

				$this->_view->render('menu/showDetail');
			}else{
				header("location: ".PATH."menu");
				exit();
			}
		} /*end showDetail*/

		public function writeRSS(){
			$menuModel = new MenuModel();
			$menuList = $menuModel->getAllMenu();

			foreach($menuList as $k => $menu){
				if($menu['rate'] > 1){
					$menuList[$k]['avrScore'] = round($menu['score']/$menu['rate'], 1);
					$menuList[$k]['more'] = 's';
				}else{
					$menuList[$k]['avrScore'] = $menu['score'];
					$menuList[$k]['more'] = '';
				}
			}
			$this->_view->menuList = $menuList;

			$this->_view->render('menu/rss', FALSE);
		}

		public function rate(){
			$menuModel = new MenuModel();
			$menuId = isset($_POST['menuId']) ? $_POST['menuId'] : -69;
			$score = isset($_POST['rating']) ? $_POST['rating'] : -96;
			$captchaInput = isset($_POST['captcha_input']) ? $_POST['captcha_input'] : '' ;
			$menu = $menuModel->getMenuById($menuId);
			if($captchaInput == $_SESSION['captcha']){
				$menuModel->rateMenu($menuId, $score);
				if( ! isset($_SESSION['voted'])){
					$_SESSION['voted'] = array();
				}
				// Món nào đánh giá rồi thì ko cho đánh giá nữa
				array_push($_SESSION['voted'], $menuId);
				$this->_view->flag = "1"; // rate thành công 
			}else{
				$this->_view->flag = "2"; // rate thất bại
			}
			unset($_SESSION['captcha']);
			$this->showDetail($menu[0]['alias']);
			// Gọi như dưới thì ko truyền đc flag đâu nha, ở giữa có gọi khác r
			// header("location: ".PATH."menu/".$menu[0]['alias']);
			// exit();
		}
	}
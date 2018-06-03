<?php
	/**
	 * class Database
	 * Làm việc với csdl
	 */
	class Database{
		// CÁC THUỘC TÍNH
		private $_sql;
		protected $_conn;

		// CÁC PHƯƠNG THỨC
		// 
		// Hàm dựng
		public function __construct(){

		}

		// Phương thức kết nối với CSDL
		public function connect(){
			// từ khóa global để dùng các biến bên ngoài ở đây đc
			global $server;
			global $hostUser;
			global $hostPass;
			global $dbname;

			$this->_conn = mysqli_connect("$server","$hostUser","$hostPass","$dbname");
			if($this->_conn == FALSE){
				die("Cannot connect to $dbname!");
			}
		}

		// Phương thức ngắt kết nối với CSDL
		public function disconnect(){
			mysqli_close($this->_conn);
		}

		// Set câu truy vấn SELECT
		public function setQuery($sql){
			$this->_sql = $sql;
		}

		// Thực thi INSERT / UPDATE / DELETE (ko có cần trả gì về cả)
		// INSERT INTO bảng nào (cột nào) VALUES (giá trị gì)
		// UPDATE bảng nào SET cột nào = giá trị gì WHERE ...
		// DELETE FROM bảng nào WHERE ...
		public function executeNonQuery($sql){
			$this->connect();

			$this->setQuery($sql);
			mysqli_query($this->_conn, $this->_sql);

			$this->disconnect();
		}

		// Thực thi câu truy vấn SELECT (chỉ mình nó)
		// SELECT gì đó FROM bảng nào WHERE ...
		public function executeQuery($sql){
			// kết nối với CSDL
			$this->connect();

			// set câu truy vấn
			$this->setQuery($sql);

			// Thực thi câu truy vấn, lặp để lấy từng record
			$query = mysqli_query($this->_conn, $this->_sql);
			while($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}

			// Ngắt kết nối với CSDL
			$this->disconnect();

			return $result;
		}
	}
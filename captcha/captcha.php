<?php
	session_start();

	// Tạo hình từ 1 hình rỗng có sẵn loại gif
	// $captcha = imagecreatefromgif('emptycaptcha.gif');
	 
	// Tự tạo 1 ảnh rộng 60, cao 25
	$captcha = imagecreate(60, 25);

	// Tạo màu nền cho ảnh
	// imagecolorallocate(image, red, green, blue)
	imagecolorallocate($captcha, 150, 150, 150);

	// Tạo ra đoạn mã dài 5 ký tự (số và a-z)
	$text = substr(md5(rand(0, 9999)), 0, 5);

	// Lưu đoạn mã vừa tạo trên vào session để so khớp sau này
	$_SESSION['captcha'] = $text;


	$font = 'Pacifico-Regular.ttf';
	// Tạo ra đoạn text
	// imagettftext(image, size, angle, x, y, color, fontfile, text)
	// size: cỡ chữ, angle: độ quay theo góc vòng tròn lượng giác, x: thụt trái, y: thụt xuống
	imagettftext($captcha, 14, 10, 7, 23, imagecolorallocate($captcha, 0, 0, 255), $font, $text);

	// Tạo ra đường gạch ngang làm nhiễu robot
	// imageline(image, x1, y1, x2, y2, color)
	imageline($captcha, 0, 15, 60, 8, imagecolorallocate($captcha, 255, 0, 0));

	// Khi gọi đến file này, file này sẽ trả về 1 hình (cho brower hiểu)
	header("content-type: image/gif");

	// Tạo hình, sau khi đã chỉ ra những cái cần thiết (màu nền, chữ, phông gì, cỡ chữ, vị trí chữ, vtrí đường gạch qua...)
	imagegif($captcha);

	// Huỷ hình sau khi file này đc gọi và trả hình xong
	imagedestroy($captcha); 
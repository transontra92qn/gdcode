<?php

// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
//"files": [
//    "app/function/function.php"
//]

// Chạy cmd : composer  dumpautoload
function changeTitle($str){
	foreach($unicode as $khongdau=>$codau) {
		$arr=explode("|",$codau);
		$str = str_replace($arr,$khongdau,$str);
	}
	return $str;
}

function dateTimeFormat($str)
{
	$arr = explode(" ", $str);
	$date_format = date('d/m/Y',strtotime($arr[0]));
	$time = 'Ngày '.$date_format.' vào lúc '.$arr[1];
	return $time;
}

function getWeekDay()
{
	$weekday = strtolower(date('l'));
	switch ($weekday) {
		case 'monday':
			return 'Thứ Hai';
			break;
		case 'tuesday':
			return 'Thứ Ba';
			break;
		case 'wednesday':
			return 'Thứ Tư';
			break;
		case 'thursday':
			return 'Thứ Năm';
			break;
		case 'friday':
			return 'Thứ Sáu';
			break;

		case 'saturday':
			return 'Thứ Bảy';
			break;

		default:
			return 'Chủ Nhật';
			break;
	}
}

function keywordHighlight($keyword,$str){
	return str_replace($keyword, '<mark style="background:#ff0;">'.$keyword.'</mark>', $str);
}

?>

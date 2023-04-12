<?php

    //có dấu sang không dấu.
    function convert_vi_to_en($str) {
      $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
      $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
      $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
      $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
      $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
      $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
      $str = preg_replace("/(đ)/", "d", $str);
      $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
      $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
      $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
      $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
      $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
      $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
      $str = preg_replace("/(Đ)/", "D", $str);
      //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
      return $str;
}
function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
    $str=trim($str);
    if ($str=="") return "";
    $str =str_replace('"','',$str);
    $str =str_replace("'",'',$str);
    $str =str_replace("#",'',$str);
    $str =str_replace("+",'',$str);
    $str = stripUnicode($str);
    $str = mb_convert_case($str,$case,'utf-8');
    $str = preg_replace('/[\W|_]+/',$strSymbol,$str);
    return $str;
}

function stripUnicode($str){
    if(!$str) return '';
    //$str = str_replace($a, $b, $str);
    $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
        'ae'=>'ǽ',
        'AE'=>'Ǽ',
        'c'=>'ć|ç|ĉ|ċ|č',
        'C'=>'Ć|Ĉ|Ĉ|Ċ|Č',
        'd'=>'đ|ď',
        'D'=>'Đ|Ď',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
        'f'=>'ƒ',
        'F'=>'',
        'g'=>'ĝ|ğ|ġ|ģ',
        'G'=>'Ĝ|Ğ|Ġ|Ģ',
        'h'=>'ĥ|ħ',
        'H'=>'Ĥ|Ħ',
        'i'=>'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
        'ij'=>'ĳ',
        'IJ'=>'Ĳ',
        'j'=>'ĵ',
        'J'=>'Ĵ',
        'k'=>'ķ',
        'K'=>'Ķ',
        'l'=>'ĺ|ļ|ľ|ŀ|ł',
        'L'=>'Ĺ|Ļ|Ľ|Ŀ|Ł',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
        'Oe'=>'œ',
        'OE'=>'Œ',
        'n'=>'ñ|ń|ņ|ň|ŉ',
        'N'=>'Ñ|Ń|Ņ|Ň',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
        's'=>'ŕ|ŗ|ř',
        'R'=>'Ŕ|Ŗ|Ř',
        's'=>'ß|ſ|ś|ŝ|ş|š',
        'S'=>'Ś|Ŝ|Ş|Š',
        't'=>'ţ|ť|ŧ',
        'T'=>'Ţ|Ť|Ŧ',
        'w'=>'ŵ',
        'W'=>'Ŵ',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
        'z'=>'ź|ż|ž',
        'Z'=>'Ź|Ż|Ž'
    );
    foreach($unicode as $khongdau=>$codau) {
        $arr=explode("|",$codau);
        $str = str_replace($arr,$khongdau,$str);
    }
    return $str;
}

<?php
/**

* 随机生成字符串

*/

function make_char( $length = 8 ){  

// 密码字符集，可任意添加你需要的字符  

$chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',  
               'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's',  
               't', 'u', 'v', 'w', 'x', 'y','z',  
               '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');  

// 在 $chars 中随机取 $length 个数组元素键名  
$char_txt = '';  

for($i = 0; $i < $length; $i++){  
   // 将 $length 个数组元素连接成字符串  
   $char_txt .= $chars[array_rand($chars)];  
}
return $char_txt;
}
















<?php
header('Content-type:text/html;charset=utf-8');
//$username = $_POST['username'];
$username = ['username'];
sleep(5);
echo '[
{"title":"标题一，AAAA","ptime":"2015-03-11"},
{"title":"标题二，BBBB","ptime":"2015-12-22"},
{"title":"标题三，CCCC","ptime":"2016-05-18"},
{"title":"标题四，DDDD","ptime":"2017-05-15"}
]'
?>
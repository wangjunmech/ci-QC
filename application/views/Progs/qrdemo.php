<?php
require 'PHPQRCode.class.php';

$config = array( 
'ecc' => 'H',    // L-smallest, M, Q, H-best,码标的质量
'size' => 20,    // 1-50,1代表37*37像素，10代表370*370像素
// 'dest_file' => '55.png',//创建的二维码路径(生成图片名称)
'dest_file' => './Public/images/2dcode/66.png',//创建的二维码路径(生成图片名称)
'quality' => 90, //图片质量,数值越大生成的图片占用空间越小
'logo' => './Public/images/2dcode/logo2.jpg', //logo图片文件
'logo_size' => 160, //logo大小
'logo_outline_size' => 10, //logo外框，只适应方形
'logo_outline_color' => '#FF0000',  //logo外框颜色
'logo_radius' => 0, //控制圆角大小，数值为logo_size的一半时为圆形
'logo_opacity' => 100//透明度
);


// 要转换为二维码的内容
$data = 'http://www.163.com\r\n';
// 创建二维码类
$oPHPQRCode = new PHPQRCode();
// 设定配置
$oPHPQRCode->set_config($config);
// 创建二维码
$qrcode = $oPHPQRCode->generate($data);
// 显示二维码
// echo '<img src="'.$qrcode.'?t='.time().'">';//放到CI中后这个SRC文件位置不对了
echo '<hr>';
echo '<h2>说明</h2>';

echo '<p>qrdemo.php--------PHPQRCode.class.php--------phpqrcode项目目录放在视图下面
</p>';
echo '<p>\application\views\Progs\qrdemo.php  视咊文件，在此文件中调用类文件PHPQRCode.class.php，可在里面设置二维码参数，类文件中调用phpqrcode项目目录下的phpqrcode.php</p>';
echo '<p>\application\views\Progs\qrdemo.php  中设置data参数，即要转换为二维码的内容，网址后面加上\r和\n描码才参打开网址：</p>';
echo '<p>qrdemo.php中需要配置dest_file和logo两个项的路径到同一目录,把logo图片和输出的图片放到一起才能加上logo：</p>';
echo '<p>\application\views\Progs\phpqrcode类文件</p>';
echo '<br>';

echo '<hr>';
echo '<img src="'.base_url('./Public/images/2dcode/66.png').'?t='.time().'">';
// "<?php echo base_url('Public/images/Voip.jpg'); 

?>


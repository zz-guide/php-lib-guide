<?php
/**
 *
 * @author:  leixu
 * @version: 1.0.0
 * @change:
 *    1. 2021/8/19 leixu: 创建；
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //服务器配置
    $mail->CharSet = "UTF-8";                     //设定邮件编码
    $mail->SMTPDebug = 0;                        // 调试模式输出
    $mail->isSMTP();                             // 使用SMTP
    $mail->Host = 'smtp.mxhichina.com';               // SMTP服务器,smtp.mxhichina.com,smtp.aliyun.com
    $mail->SMTPAuth = true;                      // 允许 SMTP 认证
    //$mail->Username = 'xulei13140106@aliyun.com';                // SMTP 用户名  即邮箱的用户名
    //$mail->Password = 'xl123456?';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)

    $mail->Username = 'lxu@zhiniuxue.com';                // SMTP 用户名  即邮箱的用户名
    $mail->Password = 'Xl22@11934';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)

    $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
    $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

//    $mail->Host = 'smtp.qq.com';                // SMTP服务器
//    $mail->Username = '373045134@qq.com';                // SMTP 用户名  即邮箱的用户名
//    $mail->Password = 'asuebdqvyqdcbhbh';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
//    $mail->SMTPSecure = 'tls';                    // 允许 TLS 或者ssl协议
//    $mail->Port = 587;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持
//    $mail->SMTPSecure = 'tls';                    // 允许 TLS 或者ssl协议

    //$mail->setFrom('xulei13140106@aliyun.com', '许磊');  //发件人
    $mail->setFrom('lxu@zhiniuxue.com', '许磊');  //发件人
//    $mail->setFrom('373045134@qq.com', '许磊');  //发件人
    $mail->addAddress('373045134@qq.com', '仔仔');  // 收件人
    $mail->addCC('xulei13140107@126.com'); // 抄送
    $mail->addCC('lxu@zhiniuxue.com'); // 抄送
    //$mail->addReplyTo('lxu@zhiniuxue.com', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致

    //Content
    $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
    $mail->Subject = '光速智学pad发货申请' . date('Y-m-d H:i');
    $mail->Body = <<< EOF
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>发货申请</title>
</head>
<body>
    <div>
        <div>
            <div>hi，秀杰你好：</div>
            <div>麻烦安排一下发货，一共 <span style="color: red;font-size: 16px;font-weight: bold;">30</span>台，发货之后回复一下快递单号, 设备SN等信息，谢谢!</div>
            <div>发货信息如下：</div>
        </div>
        <table style=" font-size:13px;color:#333333;border:solid 1px #666666;border-collapse: collapse;">
            <caption></caption>
            <thead>
            <tr align="left">
                <th style="width: 300px; border:solid 1px #666666;padding: 8px;">收件信息</th>
                <th style="width: 100px; border:solid 1px #666666;padding: 8px;">平板型号</th>
                <th style="width: 100px; border:solid 1px #666666;padding: 8px;">平板数量(台)</th>
                <th style="width: 100px; border:solid 1px #666666;padding: 8px;">壳膜(套)</th>
            </tr>
            </thead>

            <tbody align="left">
            <tr>
                <td style="font-size:15px;border:solid 1px #666666;padding: 0 0 0 5px;background-color: #ffffff;">
                    <div>许磊</div>
                    <div>18810951239</div>
                    <div>凯旋城D座</div>
                </td>
                <td style="font-size:15px;border:solid 1px #666666;padding: 0 0 0 5px;background-color: #ffffff;">TB-8703R</td>
                <td style="font-size:15px;border:solid 1px #666666;padding: 0 0 0 5px;background-color: #ffffff;">6</td>
                <td style="font-size:15px;border:solid 1px #666666;padding: 0 0 0 5px;background-color: #ffffff;">6</td>
            </tr>
            </tfoot>
        </table>
    </div>

</body>
</html>

EOF;

    $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';

    $mail->send();
    echo '邮件发送成功';
} catch (Exception $e) {
    echo '邮件发送失败: ', $mail->ErrorInfo;
}
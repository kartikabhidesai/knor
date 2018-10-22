<?php
$to = "shaileshvanaliya91@gmail.com";
$subject = "Contact-us mail";
$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
    <table>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    </tr>
    <tr>
    <td>John</td>
    <td>Doe</td>
    </tr>
    </table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= "From: testshailesh1@gmail.com" . "\r\n";
$headers .= "Cc: kartidesai123@gmail.com" . "\r\n";

$result = mail($to,$subject,$message,$headers);
echo $result . ' -- HI';exit;
?>
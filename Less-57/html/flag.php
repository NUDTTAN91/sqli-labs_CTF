<?php
    system("bash /flag.sh");
    // 开始mysql服务
    shell_exec('service mysql start');

    // 获取当前的日期和时间
    $current_time = date("H:i:s");
    // 使用md5sum计算时间的MD5值
    $md5_value = shell_exec('echo -n ' . escapeshellarg($current_time) . ' | md5sum');
    // 截取16位大写的MD5值
    $md5_value_16 = substr($md5_value, 0, 16);
    // 转换为大写
    $md5_value_16_upper = strtoupper($md5_value_16);

    $FLAG=getenv('FLAG');
    // 修改 /var/www/html/sql-connections/setup-db.php 文件
    $file_contents = file_get_contents('/var/www/html/sql-connections/setup-db.php');
    $file_contents = str_replace('flagtext', $md5_value_16_upper, $file_contents);
    $file_contents = str_replace('flag{text}', $FLAG, $file_contents);
    file_put_contents('/var/www/html/sql-connections/setup-db.php', $file_contents);

    // 修改 /app/sql-connections/setup-db.php 文件
    $file_contents = file_get_contents('/app/sql-connections/setup-db.php');
    $file_contents = str_replace('flagtext', $md5_value_16_upper, $file_contents);
    $file_contents = str_replace('flag{text}', $FLAG, $file_contents);
    file_put_contents('/app/sql-connections/setup-db.php', $file_contents);

    // 设置环境变量FLAG的值为not_flag
    putenv('FLAG=not_flag');

    // 删除 /flag.sh 文件
    unlink('/flag.sh');

    sleep(2);
    header('Location: ../sql-connections/setup-db.php');
    exit;
?>


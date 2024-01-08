#!/bin/bash

service mysql start

# 获取当前的日期和时间
current_time=$(date +"%T")
# 使用md5sum计算时间的MD5值
md5_value=$(echo -n "$current_time" | md5sum)
# 截取16位大写的MD5值
md5_value_16=${md5_value:0:16}
# 转换为大写
md5_value_16_upper=$(echo "$md5_value_16" | awk '{print toupper($0)}')

sed -i "s/flagtext/$md5_value_16_upper/" /var/www/html/sql-connections/setup-db.php
sed -i "s/flag{text}/$FLAG/" /var/www/html/sql-connections/setup-db.php

sed -i "s/flagtext/$md5_value_16_upper/" /app/sql-connections/setup-db.php
sed -i "s/flag{text}/$FLAG/" /app/sql-connections/setup-db.php

export FLAG=not_flag
FLAG=not_flag

rm -f /flag.sh


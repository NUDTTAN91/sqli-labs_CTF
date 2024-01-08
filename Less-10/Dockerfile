FROM nudttan91/sqli-labs_base_image

LABEL Author="tan91"
LABEL GitHub="https://github.com/NUDTTAN91"
LABEL Blog="zxw-nudt.blog.csdn.net"

COPY html /app
COPY html /var/www/html

RUN chmod -R 755 /var/www/html
RUN chmod 777 /var/www/html/flag.php
RUN chmod -R 755 /app
RUN chmod 777 /app/flag.php
RUN chmod 777 /var/www/html/sql-connections/setup-db.php
RUN chmod 777 /app/sql-connections/setup-db.php

COPY file /
RUN chmod 777 /flag.sh


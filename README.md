# data-bus-example


Example of php 2 generators + 2 listeners.
Redis PUB/SUB as data bus.
All necessary enviroment via Docker. Do not forget run `composer install` to be sure namespace is working.
Also you ll need to import table to db with your favourite tool.


To run all required stuff do next steps:
1. `docker-compose build`
1. `docker-compose up`
1. `docker exec -it fpm /bin/bash`
1. `php /usr/share/nginx/html/fiblist.php`
1. `php /usr/share/nginx/html/primelist.php`
1. `php /usr/share/nginx/html/fibgen.php -c 2000 -d 3`
1. `php /usr/share/nginx/html/primegen.php -c 5000 -d 1`

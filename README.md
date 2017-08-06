madhok
======

A Symfony project created on July 27, 2017, 1:00 pm.

1) Installing the Standard Edition via composer (If not installed)
  If you don't have Composer yet, download it following the instructions on
  http://getcomposer.org/ or just run one of the following command:

    curl -s http://getcomposer.org/installer | php

 
2) Install required dependencies, with following command at Symfony's root folder

    php composer.phar install

3) The "php composer.phar install" command will lead you to fill parameters if "app/config/parameters.yml" file doesnot exists.
   If not exists Copy parameters.yml.dist as parameters.yml and configure accordingly.
   database_host, database_name, database_user, database_password can be changed according to server.

4) Give persmissions to cache, logs and sessions folders in prjoect-root-directory
 
    chmod -R 777 var/cache
    chmod -R 777 var/logs
    chmod -R 777 var/sessions

5) Create database. At Symfony's root folder run following command

    php bin/console doctrine:database:create

5) Update database scheme. At Symfony's root folder run following command.

    php bin/console doctrine:schema:update --force
    
6) Assets link to web folder. At Symfony's root folder run following command.

    php bin/console assets:install web --symlink

7) For Production environment Assets

    php bin/console assetic:dump --env=prod --no-debug
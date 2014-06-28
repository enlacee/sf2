Init with Symfony
========================

SYMFONY TECNIC
- curl -s http://getcomposer.org/installer | php
- php composer.phar install
- php composer.phar create-project symfony/framework-standard-edition /path/to/webroot/Symfony 2.5.*


SYMFONY DESPLIEGUE
- dar permisos a carpetas (R-W) (logs  cache)
- iniciar web/app_dev.php

Create the Bundle (paquete)
$ php app/console generate:bundle --namespace=Acme/HelloBundle --format=yml

Defaullt URL
- app/config/routing.yml

http://localhost/test/symfony/web/app.php/hello/anibal

SANDBOX
============================
# console : app/console

:::::: bundle crear
#01
app/console generate:bundle
php app/console generate:bundle --namespace=Acme/Bundle/BlogBundle

:::::: Doctrine
#01
php app/console doctrine:database:create

#02
php app/console doctrine:database:drop --force
php app/console doctrine:database:create

#03
php app/console doctrine:generate:entity

#04 (create tables model schema)
php app/console doctrine:schema:update --force



<VirtualHost *:80>
    ServerName www.domain.com.localhost
    ServerAlias domain.com.localhost
    ServerAdmin webmaster@localhost

    DocumentRoot /home/user/www/project/web
    <Directory /home/user/www/project/web/>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride None
        Order allow,deny
        allow from all
        <IfModule mod_rewrite.c>
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteRule ^(.*)$ /app.php [QSA,L]
        </IfModule>
    </Directory>
</VirtualHost>

symfony
=======

A Symfony project created on July 13, 2015, 4:13 pm.

Virtual Host

```
<VirtualHost *:80>
        ServerName symfony.local
        ServerAlias *.symfony.local
        DocumentRoot /home/nntuan/tutorials/symfony/web
        SetEnv sfEnv dev
        <Directory /home/nntuan/tutorials/symfony/web>
                #Options Indexes FollowSymLinks
                AllowOverride all
                Require all granted
                <IfModule mod_rewrite.c>
                        RewriteEngine On
                        RewriteCond %{REQUEST_FILENAME} !-f
                        RewriteRule ^(.*)$ app_dev.php [QSA,L]
                        RewriteCond %{HTTP:Authorization} ^(.*)
                        RewriteRule .* - [e=HTTP_AUTHORIZATION:%1]
                </IfModule>
        </Directory>
		
		#For Ubuntu apache config
        ErrorLog ${APACHE_LOG_DIR}/error-symfony.log
        CustomLog ${APACHE_LOG_DIR}/access-symfony.log combined

		#For Xampp windows config
		#ErrorLog "logs/error-symfony.log"
		#CustomLog "logs/access-symfony.log" combined
</VirtualHost>
```

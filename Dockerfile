FROM php:8.2-apache

# さくらインターネット(Apache 2.4)に合わせてモジュール有効化
RUN a2enmod rewrite deflate expires headers

# AllowOverride All を設定（.htaccessが効くように）
RUN sed -i 's|AllowOverride None|AllowOverride All|g' /etc/apache2/apache2.conf

WORKDIR /var/www/html

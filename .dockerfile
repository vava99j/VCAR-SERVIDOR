FROM richarvey/nginx-php-fpm:latest

# Definir pasta onde o nginx vai servir
ENV WEBROOT /var/www/html/public

# Copiar tudo para dentro
COPY . /var/www/html/

# Instalar dependências do PHP
RUN composer install --no-dev --optimize-autoloader

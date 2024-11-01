# Usar uma imagem oficial do PHP 8.1
FROM php:8.1-cli

# Definir o diretório de trabalho dentro do contêiner
WORKDIR /var/www/html

# Instalar dependências do sistema e extensões necessárias do PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar o arquivo composer.json e composer.lock para o contêiner
COPY composer.json composer.lock ./

# Instalar as dependências do Composer
RUN composer install --no-scripts --no-autoloader

# Copiar o restante dos arquivos do projeto para o contêiner
COPY . .

# Instalar dependências do Composer corretamente e otimizar o autoloader
RUN composer dump-autoload --optimize

# Expor a porta 80
EXPOSE 80

# Comando para rodar o servidor embutido do PHP na porta 80
CMD [ "php", "-S", "0.0.0.0:80", "-t", "src" ]
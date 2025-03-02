FROM dunglas/frankenphp:latest

WORKDIR /app

# Install ekstensi yang diperlukan
RUN apt-get update && apt-get install -y \
    libicu-dev zlib1g-dev libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install intl zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . .

# Jalankan Composer install
RUN composer install --no-dev --optimize-autoloader

CMD ["frankenphp", "run", "--port=8000"]

# Gunakan image FrankenPHP resmi
FROM dunglas/frankenphp:latest

# Set working directory
WORKDIR /app

# Copy seluruh project Laravel ke dalam container
COPY . .

# Install dependensi Laravel
RUN composer install --no-dev --optimize-autoloader

# Set permission untuk storage dan bootstrap
RUN chmod -R 777 storage bootstrap/cache

# Expose port 80 agar bisa diakses
EXPOSE 80

# Jalankan aplikasi Laravel dengan FrankenPHP
CMD ["frankenphp", "serve", "--port=80"]

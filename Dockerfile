### Step 1: Node.js for frontend (Vite)
FROM node:18 AS node-builder

WORKDIR /app

# Install build tools for native modules
RUN apt-get update && apt-get install -y python3 g++ make

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


### Step 2: PHP for Laravel backend
FROM php:8.2-fpm

WORKDIR /var/www

# Install PHP extensions and SQLite
RUN apt-get update && apt-get install -y \
    zip unzip curl git libxml2-dev libzip-dev libpng-dev libjpeg-dev libonig-dev \
    sqlite3 libsqlite3-dev libpq-dev

RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip

# Copy Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel code
COPY --chown=www-data:www-data . /var/www

# Create SQLite database folder & file
RUN mkdir -p /var/www/database && \
    touch /var/www/database/database.sqlite && \
    chown -R www-data:www-data /var/www/database

# Copy built frontend assets from Node build
COPY --from=node-builder /app/public/build /var/www/public/build

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Setup Laravel environment
COPY .env.example .env
RUN php artisan key:generate

EXPOSE 8000

CMD php artisan storage:link && php artisan serve --host=0.0.0.0 --port=8000

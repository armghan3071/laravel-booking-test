# Laravel Booking Test Setup

Non sono bravo in italiano. Ma sono molto bravo in inglese. 
La maggior parte della configurazione è stata fatta su Windows, quindi ho usato Xampp, Composer.
Includerò anche i file docker per Linux.

## ✅ Obiettivo
Realizzare una piccola API REST per la gestione di prenotazioni (Booking System).

## 🚀 Funzionalità Richieste
- CRUD per l'entità `Booking`
- Associazione con entità `Customer`
- Validazione degli input con Form Request
- Middleware di autenticazione (Laravel Sanctum o token semplice)
- Logging delle operazioni
- Endpoint per esportazione CSV

## 🧱 Requisiti Tecnici
- Laravel 11+
- PHP 8.3+
- Service Layer / Action Classes
- Repository Pattern
- Design Patterns ove utili (es. Strategy, Factory)
- Code Linting (PHP-CS-Fixer o Laravel Pint)
- Analisi statica con PHPStan (livello 5+ consigliato)
- Testing con PHPUnit

## 🐳 Docker
Il progetto deve funzionare tramite Docker:
- PHP + Laravel
- MySQL o PostgreSQL
- phpMyAdmin (opzionale)

### Esempio `compose.yml`
```yaml
version: '3.8'

services:
  app:
    build:
      context: .
      dockerfile: Dockerfile
    image: laravel-app
    container_name: laravel-app
    restart: unless-stopped
    working_dir: /var/www
    volumes:
      - .:/var/www
    ports:
      - "8000:8000"
    depends_on:
      - db
    networks:
      - laravel

  db:
    image: mysql:8.0
    container_name: laravel-db
    restart: unless-stopped
    environment:
      MYSQL_DATABASE: laravel
      MYSQL_USER: user
      MYSQL_PASSWORD: secret
      MYSQL_ROOT_PASSWORD: secret
    ports:
      - "3306:3306"
    volumes:
      - dbdata:/var/lib/mysql
    networks:
      - laravel

volumes:
  dbdata:

networks:
  laravel:
```

### Esempio `Dockerfile`
```Dockerfile
FROM php:8.3-fpm

# Installazioni base
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
```

## ⌛ Consegna
- Crea un fork o clone del progetto
- Crea una nuova branch con il tuo nome (`feature/nome-cognome`)
- Esegui Commits coerenti e descrittivi
- Invia il link alla tua repository entro 72h

## 📎 Extra Opzionali
- Seeder/Factory
- Swagger o Postman Collection
- CI/CD (GitHub Actions)

---

In bocca al lupo!


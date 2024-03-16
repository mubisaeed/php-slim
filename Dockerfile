# Use the official PHP image with Alpine Linux as base
FROM php:8.0-alpine

# Set the working directory in the container
WORKDIR /var/www

# Install system dependencies
RUN apk add --no-cache \
    curl \
    git

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Expose port 8080
EXPOSE 8080

# Copy the application files to the container
COPY . .

# Create a volume for logs
VOLUME /var/www/logs

# Start the PHP built-in web server
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]

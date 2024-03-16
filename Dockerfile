# Use the official PHP Alpine image as base
FROM php:7-alpine

# Set the working directory in the container
WORKDIR /var/www

# Expose port 8080
EXPOSE 8080

# Copy the application files to the container
COPY . .

# Create a volume for logs
VOLUME /var/www/logs

# Start the PHP built-in web server
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]

FROM php:8.2-apache
RUN apt-get update

# Install PHP extensions
# RUN apt-get install -y libzip
# RUN docker-php-ext-install exif zip gd

# Install Drush
RUN cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/ && \
    cp /etc/apache2/mods-available/headers.load /etc/apache2/mods-enabled/ && \
    echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-ram-limit.ini && \
    echo 'upload_max_filesize = 512M' >> /usr/local/etc/php/conf.d/docker-php-upload-limit.ini && \
    echo 'post_max_size = 512M' >> /usr/local/etc/php/conf.d/docker-php-post-upload-limit.ini && \
    echo 'allow_url_include = On' >> /usr/local/etc/php/conf.d/docker-php-externa-url-include.ini
# CMD echo "Drush logging..." && ls -la && drush watchdog-show --tail --full &
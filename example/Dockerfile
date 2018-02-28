FROM fpfis/php71

ENV COMPOSER_ALLOW_SUPERUSER 1

# Add plugin in image ( base image must include composer )
ADD . /srv/plugin

# Default workdir in plugin directory
WORKDIR /srv/plugin

# Install plugin depedencies ( including SDK )
RUN composer install --no-dev

# Make sure the entrypoint in our main.php file
CMD php /srv/plugin/main.php
ENTRYPOINT [ "php", "/srv/plugin/main.php" ]

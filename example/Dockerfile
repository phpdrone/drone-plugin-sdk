FROM fpfis/php71
ADD . /srv/plugin
WORKDIR /srv/plugin
#RUN composer install --no-dev
CMD php /srv/plugin/main.php
ENTRYPOINT [ "php", "/srv/plugin/main.php" ]

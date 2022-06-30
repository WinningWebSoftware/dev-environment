FROM nginx:1.23-alpine

RUN mkdir -p /var/www/html

RUN touch /var/www/html/test.txt

COPY ./config/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./app /var/www/html
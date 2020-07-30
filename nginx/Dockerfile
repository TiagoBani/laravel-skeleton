FROM nginx:1.19-alpine

RUN rm -rf /var/cache/apk/*

ADD nginx.conf /etc/nginx/nginx.conf
ADD laravel.conf /etc/nginx/conf.d/default.conf

RUN echo "upstream php-upstream { server app:9000; }" > /etc/nginx/conf.d/upstream.conf

# RUN usermod -u 1000 www-data

# CMD ["nginx"]

EXPOSE 80
EXPOSE 443
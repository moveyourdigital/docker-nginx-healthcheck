# Nginx for Docker with Healthcheck support

Nginx Dockerfile from official image with healthcheck, wait-for-it and netcat.

# Usage

```
docker run --name my-nginx-app -v /some/content:/usr/share/nginx/html:ro -p80:80 -d moveyourdigital/nginx
```

## Docker compose

Using `wait-for-it` command to wait for FPM upstream to be ready

```
version: "3.9"

services:
  nginx:
    image: moveyourdigital/nginx
    environment:
      NGINX_HOST: 127.0.0.1
      NGINX_PORT: 80
      FASTCGI_HOST: fpm
      FASTCGI_PORT: 9000
    entrypoint: [
      "wait-for-it", "fpm:9000", "--",
      "/docker-entrypoint.sh",
      "nginx", "-g", "daemon off;"
    ]

fpm:
    image: php:8.1-fpm
```

Have a look at the `docker-compose.yml` for a comprehensive example.

FROM debian:latest

RUN apt-get update -y

RUN apt-get install apt-transport-https lsb-release ca-certificates wget -y
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list

RUN apt-get update -y

RUN apt-get install -y nginx php7.1-fpm php7.1 php7.1-common php7.1-gd php7.1-mysql php7.1-mcrypt php7.1-curl php7.1-intl php7.1-xsl php7.1-mbstring php7.1-zip php7.1-bcmath php7.1-iconv php7.1-opcache php7.1-soap php7.1-json php7.1-xml

RUN apt-get upgrade -y

EXPOSE 80 3306

RUN service php7.1-fpm start
RUN service nginx start

WORKDIR /var/www/html

COPY nginx.conf /etc/nginx/sites-enabled/default

ENTRYPOINT service php7.1-fpm start; service php7.1-fpm restart; service nginx start; service nginx restart; tail -f /dev/null

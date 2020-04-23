
## Kullanımı

- Bu repository klonlayınız.
- `git clone https://github.com/mberktas/spa-vue-project.git`

Ardıdan terminalde klonladıgınız dosyanın kök dizininde komutları çalıştırınız.
- `docker-compose up -d --build` 
- `docker-compose exec php php /var/www/html/artisan migrate` 
- `docker-compose exec php php /var/www/html/artisan db:seed` 


-http://localhost:8080 de proje çalışmaya başlamış olacaktır.
-**Admin Paneli için** http://localhost:8080/admin

- **NOT** -
- `Unhandled exception : Drive has not been shared`
Hatası alırsanız Docker > Settings > Resources > File Sharing > (Docker ' in kurulu olduğu dizini aktif edin.)

- **vue** - `:8080`
- **laravel api** - `:8000`

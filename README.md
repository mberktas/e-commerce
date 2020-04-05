
## Kullanımı

-Bu repository klonlayınız.Ardıdan terminalde klonladıgınız dosyanın kök dizininde komutları çalıştırınız.

- `docker-compose up -d --build` 
- `docker-compose run --rm artisan migrate` 
- `docker-compose run --rm artisan db:seed` 
- `docker run --rm -p 8080:8080 -e "HOST=0.0.0.0" npm run serve`

-http://localhost:8080 de proje çalışmaya başlamış olacaktır.
-**Admin Paneli için** http://localhost:8080/admin

- **vue** - `:8080`
- **laravel api** - `:8000`

Download *Composer Image*

``` bash
docker pull composer/composer
```

Install all dependencies

``` bash
docker run --rm -it -v "$(pwd):/app" composer/composer install
```

Copy .env.exemple file and Generate new keygen
``` bash
cp .env.exemple .env
./vendor/bin/sail artisan key:generate
```

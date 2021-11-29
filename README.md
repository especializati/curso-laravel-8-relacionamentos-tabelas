
# Curso Laravel 8: Relacionamentos de Tabelas
[Assine a Academy, e Seja VIP!](https://academy.especializati.com.br)

### Passo a passo
Clone Repositório
```sh
git clone https://github.com/especializati/curso-laravel-8-relacionamentos-tabelas.git my-project
```
```sh
cd my-project/
```


Remova o versionamento, caso queira
```sh
rm -rf .git/
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME="Curso Laravel Relationshipss"
APP_URL=http://localhost:8180

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=root
DB_PASSWORD=qualquer_senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acessar o container
```sh
docker-compose exec laravel_8 bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```


Acesse o projeto
[http://localhost:8180](http://localhost:8180)

# Guide d'installation du projet Laravel

## Étapes pour lancer le projet localement après avoir cloné le dépôt

---


```bash
git clone https://github.com/tonpseudo/nom-du-repo.git
cd nom-du-repo


cp .env.example .env

php artisan key:generate

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_la_base
DB_USERNAME=utilisateur
DB_PASSWORD=motdepasse

php artisan migrate

php artisan serve



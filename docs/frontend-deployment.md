# Обновление главной и раздела статей

Ошибка `View [articles.index] not found` означает, что Laravel не нашёл файл
`resources/views/articles/index.blade.php` в каталоге шаблонов рабочего приложения.
В ветке `main` этот файл уже существовал до обновления дизайна. Поэтому по одному
сообщению об ошибке нельзя установить, почему сервер его не видит: нужно проверить
фактический каталог приложения, наличие и доступность файла, конфигурацию views.

## После merge PR

Выполнить в **корне рабочего Laravel-приложения** под пользователем сайта.
Команды обновляют код и фронтенд, очищают только кеш шаблонов. БД не изменяется.
Остановиться, если Git сообщает о локальных изменениях или конфликтах.

```bash
set -e
test -f artisan
test "$(git branch --show-current)" = main
test -z "$(git status --porcelain)"
git pull --ff-only
test -r resources/views/articles/index.blade.php
npm ci
npm run build
php artisan view:clear
php artisan view:cache
```

Если Node.js нет на сервере, `public/build` с собранными CSS и manifest уже включён
в PR: после `git pull` пропустить две команды npm.

Проверить `/`, `/services`, `/articles`, страницу опубликованной статьи и, при
наличии более шести публикаций, `/articles?page=2`. Проверить также мобильную ширину.

## Если шаблон всё ещё не найден

Диагностика ниже только читает конфигурацию и файлы; запросов к БД нет.

```bash
php <<'PHP'
<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
echo 'base_path: ', base_path(), PHP_EOL;
foreach (config('view.paths', []) as $path) {
    $file = $path . '/articles/index.blade.php';
    echo $file, ' exists=', is_file($file) ? 'yes' : 'no',
        ' readable=', is_readable($file) ? 'yes' : 'no', PHP_EOL;
}
echo 'View::exists: ', view()->exists('articles.index') ? 'yes' : 'no', PHP_EOL;
PHP
```

Если файл отсутствует, проверить, что выкладка включает весь `resources/views`,
а DocumentRoot обслуживает `public` именно этой копии проекта. Если файл существует,
но недоступен, исправить владельца и права под пользователя PHP процесса.
Если `view.paths` указывает на другую копию, проверить кеш конфигурации и абсолютные
пути выкладки; после исправления конфигурации пересобрать её штатной командой
деплоя. При использовании долгоживущих PHP workers выполнить штатный перезапуск.

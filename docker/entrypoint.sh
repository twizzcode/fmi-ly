#!/bin/sh
set -e

if [ ! -f .env ]; then
  cp .env.example .env
fi

if ! grep -q '^APP_KEY=base64:' .env; then
  php artisan key:generate --force --ansi
fi

touch database/database.sqlite

if [ "${RUN_MIGRATIONS:-true}" = "true" ]; then
  php artisan migrate --force --ansi
fi

if [ "${RUN_ADMIN_SEED:-true}" = "true" ]; then
  php artisan db:seed --class=AdminUserSeeder --force --ansi
fi

exec "$@"

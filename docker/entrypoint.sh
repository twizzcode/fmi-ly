#!/bin/sh
set -e

sync_env_var() {
  key="$1"
  value="$(printenv "$key" || true)"

  if [ -z "$value" ]; then
    return 0
  fi

  escaped_value="$(printf '%s' "$value" | sed 's/[\\/&]/\\&/g')"

  if grep -q "^${key}=" .env; then
    sed -i "s/^${key}=.*/${key}=${escaped_value}/" .env
  else
    echo "${key}=${value}" >> .env
  fi
}

if [ ! -f .env ]; then
  cp .env.example .env
fi

for key in \
  DB_CONNECTION \
  DB_URL \
  DB_HOST \
  DB_PORT \
  DB_DATABASE \
  DB_USERNAME \
  DB_PASSWORD \
  DB_SSLMODE \
  FILESYSTEM_DISK \
  AWS_ACCESS_KEY_ID \
  AWS_SECRET_ACCESS_KEY \
  AWS_DEFAULT_REGION \
  AWS_BUCKET \
  AWS_ENDPOINT \
  AWS_URL \
  AWS_USE_PATH_STYLE_ENDPOINT
do
  sync_env_var "$key"
done

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

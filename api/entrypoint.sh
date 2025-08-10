#!/usr/bin/env bash
set -euo pipefail

# se placer dans /app/api
cd "$(dirname "$0")"

: "${APP_ENV:=prod}"
: "${APP_SECRET:?APP_SECRET missing}"
: "${DATABASE_URL:?DATABASE_URL missing}"

echo "[entrypoint] Waiting for database…"
for i in {1..30}; do
  php -r 'try{ new PDO(getenv("DATABASE_URL")); exit(0);}catch(Throwable $e){ exit(1);}'; \
    && break || { echo "  DB not ready… ($i)"; sleep 2; }
done

php bin/console doctrine:database:create --if-not-exists || true
php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration || true
php bin/console cache:warmup --env=prod || true

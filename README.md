# Хата · Diwave

Long-term rental platform (3+ months) for apartments, hotel rooms, and commercial premises.

Two surfaces:

1. **Admin panel** (`/admin`) — managers inspect objects, take photos, record assessments (overall / real / adequate). Owners and admins manage users.
2. **Client voice bot** *(planned)* — real-time conversational AI for prospective tenants. Web first; messengers later.

## Stack

- Laravel 11 · Filament v3 · PHP 8.2
- SQLite for local dev (swap for Postgres in production)
- Voice bot will use OpenAI Realtime API

## Local development

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

Open <http://127.0.0.1:8000/admin/login>.

Seeded users (dev only — rotate before deploy):

| Role | Email | Password |
|---|---|---|
| Owner | `kravets.lviv@gmail.com` | `hata2026` |
| Manager | `manager@hata.diwave.company` | `hata2026` |

## Languages

UA default · RU input → UA reply · EN input → EN reply.

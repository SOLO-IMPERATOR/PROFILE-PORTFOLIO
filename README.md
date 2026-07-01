# Portfolio CMS — soloimperator.tech

Backend и админка персонального портфолио [Dmitrii Levchenko](https://soloimperator.tech/).

Публичный репозиторий как **демонстрация подхода к разработке**. Основная коммерческая работа — проекты под NDA.

## О проекте

Laravel-приложение с Filament-админкой для управления контентом портфолио-сайта: проекты, навыки, категории, теги. Фронт — Blade + Vite, двуязычный интерфейс (RU / EN).

**Live:** https://soloimperator.tech/

## Стек

| Слой | Технологии |
|------|------------|
| Backend | PHP 8.2+, Laravel 12 |
| Admin | Filament 3 |
| Frontend | Blade, Vite, JavaScript |
| i18n | RU / EN (клиентский i18n + локализованные поля в БД) |
| Интеграции | Telegram (уведомления с формы обратной связи) |
| CI/CD | GitHub Actions (тесты + deploy) |

## Возможности

- **Filament CMS** — CRUD для проектов, навыков, категорий и тегов
- **Двуязычность** — переключение RU/EN на сайте, локализованные названия и описания в моделях
- **Портфолио** — фильтрация проектов, галерея (GLightbox)
- **Форма контакта** — отправка заявок в Telegram через backend API
- **Автодеплой** — push в `main` → тесты → деплой на сервер

## Структура

```
app/Filament/Resources/   # Админ-панель (проекты, навыки, категории)
app/Http/Controllers/     # HomeController, ContactController
app/Models/               # Project, Abillity, Category, Tag
resources/views/          # Blade-шаблоны сайта
resources/js/             # i18n, анимации, UI-логика
```

## Локальный запуск

```bash
git clone https://github.com/SOLO-IMPERATOR/PROFILE-PORTFOLIO.git
cd PROFILE-PORTFOLIO
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run build
php artisan serve
```

Админка Filament: `/admin` (пользователь: `php artisan make:filament-user`).

### Переменные окружения

```env
TELEGRAM_BOT_TOKEN=   # токен бота от @BotFather
TELEGRAM_CHAT_ID=      # ID чата для уведомлений
```

> **Важно:** если токен бота ранее был в публичном JS — отзови его в @BotFather и создай новый.

## Деплой (GitHub Actions)

В secrets репозитория должны быть:

| Secret | Описание |
|--------|----------|
| `SSH_KEY` | Приватный SSH-ключ для сервера |
| `DEPLOY_HOST` | IP или hostname сервера |
| `DEPLOY_USER` | SSH-пользователь |

На сервере в `.env` пропиши `TELEGRAM_BOT_TOKEN` и `TELEGRAM_CHAT_ID`.

## Об авторе

**Dmitrii Levchenko** — Middle+ PHP / Laravel разработчик, 5+ лет опыта.

| | |
|---|---|
| Сайт | https://soloimperator.tech/ |
| Telegram | [@solo_imperator](https://t.me/solo_imperator) |
| LinkedIn | [linkedin.com/in/soloimperator](https://linkedin.com/in/soloimperator) |
| Email | d.levchencko@gmail.com |

## Примечание

Коммерческие проекты закрыты NDA. Этот репозиторий — публичный пример: личный сайт-портфолио.

# Portfolio CMS — soloimperator.tech

Backend и админка персонального портфолио [Dmitrii Levchenko](https://soloimperator.tech/).

Публичный репозиторий — **витрина кода**, не open-source проект. Основная коммерческая работа — проекты под NDA.

## О проекте

Laravel-приложение с Filament-админкой для управления контентом портфолио-сайта: проекты, навыки, категории, теги. Фронт — Blade + Vite, двуязычный интерфейс (RU / EN).

**Live:** https://soloimperator.tech/

## Стек

| Слой | Технологии |
|------|------------|
| Backend | PHP 8.2+, Laravel 12 |
| Admin | Filament 3 |
| Frontend | Blade, Vite, JavaScript |
| i18n | RU / EN |
| Интеграции | Telegram (форма обратной связи) |
| CI/CD | GitHub Actions |

## Возможности

- **Filament CMS** — управление проектами, навыками, категориями и тегами
- **Двуязычность** — RU/EN на сайте и в контенте из БД
- **Портфолио** — фильтрация проектов, галерея (GLightbox)
- **Форма контакта** — уведомления в Telegram

## Структура

```
app/Filament/Resources/   # Админ-панель
app/Http/Controllers/     # HomeController, ContactController
app/Models/               # Project, Abillity, Category, Tag
resources/views/          # Blade-шаблоны
resources/js/             # i18n, UI-логика
```

## Об авторе

**Dmitrii Levchenko** — Middle+ PHP / Laravel разработчик, 5+ лет опыта.

| | |
|---|---|
| Сайт | https://soloimperator.tech/ |
| Telegram | [@solo_imperator](https://t.me/solo_imperator) |
| LinkedIn | [linkedin.com/in/soloimperator](https://linkedin.com/in/soloimperator) |
| Email | d.levchencko@gmail.com |

## Примечание

Коммерческие проекты закрыты NDA. Этот репозиторий — единственный публичный пример: личный сайт-портфолио.

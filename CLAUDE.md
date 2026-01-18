# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a recruitment CRM system built with Laravel 12 (PHP 8.5) following Domain Driven Design (DDD) and Command Query Responsibility Segregation (CQRS) architecture patterns.

## Core Architecture

### Domain-Driven Design Structure

The application is organized into distinct bounded contexts:

- **Domains/** - Core business logic and domain models
  - **IAM/** - Identity and Access Management
  - **Recruitment/** - Recruitment operations (Candidates, Jobs, Companies, Branches, Consultants)
  - **Finance/** - Financial operations
  - **Notification/** - Notification system
  - **Analytics/** - Analytics and logging
  - **Base/** - Shared domain base classes (Entity, Event, EventDispatcher, Factory, Validator, RepositoryInterface)

- **Applications/** - Application layer implementing CQRS
  - **Commands/** - Write operations (Tasks pattern for executing domain operations)
  - **Queries/** - Read operations
  - **Orchestration/** - Event handling and cross-domain coordination
    - **Handlers/** - Domain event handlers
    - **Listeners/** - Event listeners per domain
    - **EventRegistry** - Central event registration

- **Infrastructure/** - Technical implementation details
  - **Persistence/** - Repository implementations (concrete implementations of domain repositories)
  - **Cache/** - Caching layer
  - **ExternalServices/** - Third-party integrations

- **Http/** - HTTP entry points
  - **Web/** - Web controllers (Controllers, Requests, Resources)
  - **Mobile/** - Mobile API endpoints
  - **MCP/** - MCP protocol endpoints
  - **PowerBI/** - PowerBI integrations

- **SharedKernels/** - Cross-cutting concerns
  - **DTOs/** - Data Transfer Objects (using spatie/laravel-data)
  - **Utilities/** - Shared utilities
  - **Exceptions/** - Custom exceptions

### Key Design Patterns

**Aggregate Roots & Entities:**
- All domain entities extend `App\Domains\Base\Entity` (which extends Eloquent Model)
- Entities manage their own validation via `getValidator()` method
- Entities track sub-entities for persistence:
  - `savingEntities` - Collection of entities to save with aggregate root
  - `deletingEntities` - Collection of entities to delete
- Use UUIDs as primary keys (HasUuids trait)

**Repository Pattern:**
- Domain layer defines repository interfaces in `Domains/{Context}/Repositories/`
- Infrastructure layer implements repositories in `Infrastructure/Persistence/{Context}/`
- All repositories extend `App\Infrastructure\Persistence\Repository`
- Repositories bind to interfaces via domain-specific Service Providers

**Event-Driven Architecture:**
- Domain events in `Domains/{Context}/Events/`
- Events dispatched via `App\Domains\Base\EventDispatcher`
- Event handlers in `Applications/Orchestration/Handlers/`
- Event registration centralized in `EventRegistry::register()`

**Service Providers:**
- Each domain has its own Service Provider (e.g., `IAMServiceProvider`, `RecruitmentServiceProvider`)
- Providers handle repository bindings and migration loading
- Migrations organized by domain in `database/migrations/{Context}/`

**CQRS Pattern:**
- Commands (writes) use Task pattern in `Applications/Commands/`
- Queries (reads) separated in `Applications/Queries/`
- Routes organized by CQRS in `routes/web/commands/` and `routes/web/queries/`

## Common Development Commands

### Setup & Dependencies
```bash
composer install                    # Install PHP dependencies
npm install                         # Install frontend dependencies
cp .env.example .env               # Create environment file
php artisan key:generate           # Generate application key
```

### Database
```bash
php artisan migrate                # Run all migrations
php artisan migrate:fresh --seed   # Fresh migration with seeding
php artisan db:seed                # Run database seeders
```

### Development Server
```bash
composer dev                       # Run full dev stack (server, queue, logs, vite)
php artisan serve                  # Run only PHP development server
npm run dev                        # Run only Vite dev server
php artisan queue:listen --tries=1 # Run queue worker
php artisan pail --timeout=0       # View logs in real-time
```

### Testing
```bash
composer test                      # Run full test suite (clears config first)
php artisan test                   # Run all tests (Pest)
php artisan test --filter TestName # Run specific test
php artisan test tests/Feature     # Run feature tests only
php artisan test tests/Unit        # Run unit tests only
```

### Code Quality
```bash
./vendor/bin/pint                  # Format code (Laravel Pint)
php artisan config:clear           # Clear configuration cache
php artisan cache:clear            # Clear application cache
```

## Key Dependencies

- **spatie/laravel-data** - DTOs and data transformation
- **spatie/laravel-query-builder** - API query building
- **php-open-source-saver/jwt-auth** - JWT authentication
- **pestphp/pest** - Testing framework

## Adding New Features

When implementing new features in this codebase:

1. **Define Domain Model** in `Domains/{Context}/Aggregates/` extending Entity
2. **Create Repository Interface** in `Domains/{Context}/Repositories/`
3. **Implement Repository** in `Infrastructure/Persistence/{Context}/`
4. **Bind Repository** in domain Service Provider
5. **Create DTOs** in `SharedKernels/DTOs/` using Spatie Data
6. **Create Domain Events** in `Domains/{Context}/Events/` if needed
7. **Create Command/Task** in `Applications/Commands/{Context}Tasks/`
8. **Create Query** in `Applications/Queries/` for read operations
9. **Add Event Handlers** in `Applications/Orchestration/Handlers/{Context}/`
10. **Register Events** in appropriate Listener class
11. **Create HTTP Layer** (Controller, Request, Resource) in `Http/Web/`
12. **Define Routes** in `routes/web/commands/` or `routes/web/queries/`
13. **Create Migration** in `database/migrations/{Context}/`

## Testing Structure

Tests use Pest and are organized in:
- `tests/Unit/` - Unit tests
- `tests/Feature/` - Feature/integration tests

Test environment uses SQLite in-memory database (configured in phpunit.xml).

## Important Architectural Notes

- Domain layer should never depend on Infrastructure or HTTP layers
- Aggregate roots manage their own invariants and coordinate entity persistence
- Cross-domain communication happens via domain events
- Each bounded context has its own Service Provider for dependency registration
- Validation happens at the entity level via Validator classes
- The `Repository::save()` method handles the unit of work pattern automatically

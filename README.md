<p align="center"><a href="https://www.gap-personnel.com/" target="_blank"><img src="https://gap-public-storage.s3.eu-west-2.amazonaws.com/for-medical-document-gap-logo.jpg" width="400" alt="Laravel Logo"></a></p>

## About project

This is a recruitment CRM system following Domain Driven Design and CQRS architecture.

## Architecture

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

See details in CLAUDE.md

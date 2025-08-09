# API V1

This directory contains the controllers for version 1 of the API.

## Endpoints

All endpoints are prefixed with `/api/v1`.

### Authentication
- `POST /register`: Register a new user.
- `POST /login`: Login a user and get a token.
- `POST /logout`: Logout the current user (requires authentication).
- `GET /user`: Get the current authenticated user (requires authentication).

### Clubs
- `GET /clubs`: Get a paginated list of clubs.
- `POST /clubs`: Create a new club (requires authentication).
- `GET /clubs/{club}`: Get a specific club.
- `PUT/PATCH /clubs/{club}`: Update a specific club (requires authentication).
- `DELETE /clubs/{club}`: Delete a specific club (requires authentication).

### Stadiums
- `GET /stadiums`: Get a paginated list of stadiums.
- `POST /stadiums`: Create a new stadium (requires authentication).
- `GET /stadiums/{stadium}`: Get a specific stadium.
- `PUT/PATCH /stadiums/{stadium}`: Update a specific stadium (requires authentication).
- `DELETE /stadiums/{stadium}`: Delete a specific stadium (requires authentication).
- `GET /sport-types/{sportType}/stadiums`: Get a paginated list of stadiums for a specific sport type.

### Reservations
- `GET /reservations`: Get a paginated list of reservations (requires authentication).
- `POST /reservations`: Create a new reservation (requires authentication).
- `GET /reservations/{reservation}`: Get a specific reservation (requires authentication).
- `DELETE /reservations/{reservation}`: Delete a specific reservation (requires authentication).
- `POST /reservations/{reservation}/cancel`: Cancel a specific reservation (requires authentication).
- `GET /stadiums/{stadium}/availability`: Check available time slots for a stadium on a specific date.

## Authentication

This API uses Laravel Sanctum for authentication. To authenticate, you need to include the `Authorization` header with a bearer token in your requests:

`Authorization: Bearer <token>`

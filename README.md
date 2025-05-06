# API - Spotify

## Prerequisites

Before you begin, ensure you have the following installed:
- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Git](https://git-scm.com/downloads)

## Getting Started

### 1. Clone the Repository

```bash
# Clone the repository
git clone https://github.com/monicaGY/api-spotify.git api-spotify

# Navigate to the project directory
cd api-spotify
```

### 2. Environment Setup

```bash
# Copy the example env file
cp .env.example .env

# Update the following variables in .env file
DB_HOST=mysql
DB_PORT=3306
DB_PASSWORD=my_secret_password

# Add this variables in .env file
SPOTIFY_CLIENT_ID=YOUR_CLIENT_ID
SPOTIFY_CLIENT_SECRET=YOUR_CLIENT_SECRET
```

### 3. Build and Run Docker Containers

```bash
# Build and start the containers
docker-compose up -d

# Install PHP dependencies
docker-compose exec app composer install

# Generate application key
docker-compose exec app php artisan key:generate
```


### 4. Database Setup

```bash
# Run database migrations
docker-compose exec app php artisan migrate
```


|  |                     |
|---------|-------------------------|
| API | `http://localhost:8080` |
| Documentation | `http://localhost:8080/docs/api` |


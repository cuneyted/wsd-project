## URL Shortener Module
The project now includes a simple URL shortener module.

Current endpoints:
POST /api/78745/v1/short-links
GET /api/78745/v1/short-links
GET /api/78745/v1/short-links/{id}
GET /r/{code}

The module uses PostgreSQL for persistent storage, Redis for caching the list endpoint, and Base62 encoding for generating short codes from numeric database IDs.
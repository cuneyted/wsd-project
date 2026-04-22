# Session 4 – Cache and Deployment

## What tasks.index caches

The `tasks.index` cache key stores the result of the task list endpoint. It is used by the `index()` method in `TaskController` to avoid reading all tasks from the database on every request.

## Why cache invalidation is needed

The `store()`, `update()`, and `destroy()` methods call `Cache::forget('tasks.index')` because these actions change task data. If the cache was not cleared, the API could return old task list data after creating, updating, or deleting a task.

## Purpose of Redis

Redis is used as an in-memory cache service. In this stack, Laravel stores the `tasks.index` cached task list in Redis. This improves read performance and demonstrates cache-aside behavior.

## Purpose of Nginx

Nginx is used as the frontend web server and reverse proxy. It serves the Vue single-page application and forwards API requests from `/api/` to the Laravel backend container.

## Commands used for verification

```bash
docker compose ps
curl http://127.0.0.1:8080/health
curl http://127.0.0.1:8080/api/echo
curl http://127.0.0.1:8080/api/tasks
docker compose exec redis redis-cli PING
docker compose exec redis redis-cli DBSIZE
curl http://127.0.0.1:8080/api/tasks
docker compose exec redis redis-cli DBSIZE
curl -X POST http://127.0.0.1:8080/api/tasks -H "Content-Type: application/json" -d "{\"title\":\"Created after caching\",\"description\":\"This write should invalidate tasks.index\",\"status\":\"todo\",\"album_number\":\"78745\"}"
curl http://127.0.0.1:8080/api/tasks
docker compose exec redis redis-cli DBSIZE
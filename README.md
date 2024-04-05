<h1 align="center" id="title">Koizn Books Recommender API</h1>

<p align="center"><img src="https://documenter.getpostman.com/view/26243035/2sA35LVegT" alt="project-image"></p>

<p id="description">Books Recommender Backend is a robust system designed to manage reading intervals submitted by users and provide recommendations based on the most read books. The system aims to inspire users to discover the joy of reading and self-improvement by suggesting popular books within the community.</p>

<h2>🛠️ Installation Steps:</h2>

<p>1. Clone The Repo</p>

```
git clone https://github.com/mselem0/Koniz_Task.git
```

<p>2. Create env (Mac/Linux)</p>

```
cp  .env.example .env
```

<p>3. Create env (windows)</p>

```
copy .env.example .env
```

<p>4. Run Composer</p>

```
Composer Update
```

<p>5. Generate JWT Secret</p>

```
php artisan jwt:secret
```

<p>6. Generate App Key</p>

```
php artisan:key generate
```

<p>7. Run Migration</p>

```
php artisan migrate:f
```

<p>8. Seeding Date</p>

```
php artisan db:seed
```

<p>9. Let's Go</p>

```
php artisan serve --port=8001
```

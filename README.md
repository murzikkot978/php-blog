# php-blog

## Description

A simple, minimalist blog where users can sign in, create posts, and manage their own content.<br>
This blog features a clean, minimalistic design.

For this project, I used PHP and SQLite for the database.

## Features

**User registration and login** — Registration and authentication system to manage user accounts.

**Protected dashboard** — Only registered users can access the dashboard to manage their posts.

**View all published posts** — Anyone can browse and read blog posts.

**Create posts** — Users can write and publish posts.

**Post management** — Users can edit and delete their own blog posts.

**User profile management** — Users can update their information in their profile.

**Admin panel** — View all users, change user roles, and manage or moderate content.

## Instructions to start

### Steps :

### 1 - Copy project from repository.

```bash
git clone git@github.com:murzikkot978/php-blog.git
```

### 2 - Go to the project directory

```bash
cd ./php-blog
```

### 3- Create the database

1. Open project in editor
2. Find file database.db
3. Execut this file

### 4 - Install Tailwind CLI

```bash
npm install tailwindcss @tailwindcss/cli
```

### 5 - Start Tailwind and the server

```bash
npx @tailwindcss/cli -i public/style.css -o public/compiled.css --watch
```

```bash
php -S localhost:8080 -t ./public
```

### 6 - Open the site

```
http://localhost:8080/index.php
```
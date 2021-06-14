# MV Blog application

## About App

"MV Blog" is a simple web application made as a test app, using Laravel.

## Task
Please create a simple blogging application, using Laravel.
The application should contain the following features:

    Guest area:
        List posts
        View post
    Authenticated Area:
        User authentication (Login)
        Posts:
            List posts
            Create post
            Edit post
            Delete post
        Users:
            List users
            Create user
            Edit user
            Delete user

## Installation

### Requirements

- php 7.3 +
- mysql/maria database

### Steps

- pull code from GitHub
- composer install
- make a schema in database
- create ENV file with database setup
- artisan: 
    - generate key
    - migrate and seed data
- make a local domain or use Laravel serve

## Description

Migrations and seeds generate a few simple users and posts. 
For all users, the password is "password". First user is administrator, with credentials: admin@com.com/admin1admin

Only administrators can manipulate the users' data (add/edit/delete). 
Editors and administrators can show/edit/delete all posts.
Every writer can make a post, edit and delete only his own posts.

    User levels (integer)
        administrators: 900-999
        editors: 700-899
        writers: 500-699
        disabled: 0-99

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

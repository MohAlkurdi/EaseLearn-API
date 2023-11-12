# EaseLearn API

minimalistic E-Learn API built with laravel 10

## Table of Contents

-   [Introduction](#introduction)
-   [Prerequisites](#prerequisites)
-   [Installation](#installation)
-   [API Reference](#api-reference)
    -   [Register](#register)
    -   [Login](#login)
    -   [Logout](#logout)
    -   [Get a user](#get-a-user)
    -   [Get all courses](#get-all-courses)
    -   [Get a single course](#get-a-single-course)
    -   [Create a course](#create-a-course)
    -   [Update a course](#update-a-course)
    -   [Delete a course](#delete-a-course)
    -   [Enroll in a course](#enroll-in-a-course)
    -   [Get user courses](#get-user-courses)
    -   [Get Certificate by id](#get-certificate-by-id)

## Introduction

EaseLearn API is a minimalistic E-learning platform developed using Laravel. This API offers a wide range of features, including user authentication, course listing, course enrollment, and certificate creation. And a lot more!

## Prerequisites

-   PHP 8.2
-   Composer
-   Database (MySQL)

## Installation

**Note**: Before you start, make sure you have all the prerequisites in place as mentioned in the previous step.

1. Clone the Project:

```bash
git clone https://github.com/MohAlkurdi/EaseLearn-API.git
```

2. Configure Environment Variables:

```bash
cp .env.example .env
```

3. Install Composer Dependencies:

```bash
composer install
```

4. Generate Application Key:

```bash
php artisan key:generate
```

5. Run Database Migrations:

```bash
php artisan migrate
```

6. Start the Development Server:

```bash
php artisan serve
```

-   Laravel application should now be accessible at http://localhost:8000

## API Reference

#### Register

```http
POST /api/register
```

-   **Request Body**

```json
{
    "name": "User Name",
    "email": "m@m.com",
    "password": "12345678",
    "password_confirmation": "12345678",
    "member_id": "1111111111"
}
```

#### Login

```http
POST /api/login
```

-   **Request Body**

```json
{
    "email": " m@m.com",
    "password": "12345678"
}
```

#### Logout

```http
POST /api/logout
```

**Authentication:**

Include a Bearer Token in the `Authorization` header of your HTTP request.

| Header          | Value                      |
| :-------------- | :------------------------- |
| `Authorization` | `Bearer <your_token_here>` |

#### Get a user

```http
GET /api/user
```

| Header          | Value                      |
| :-------------- | :------------------------- |
| `Authorization` | `Bearer <your_token_here>` |

---

#### Get all courses

```http
GET /api/courses
```

#### Get a single course

```http
GET /api/courses/${id}
```

| Parameter | Type     | Description                         |
| :-------- | :------- | :---------------------------------- |
| `id`      | `string` | **Required**. Id of course to fetch |

#### Create a course

```http
POST /api/courses
```

**Request Body**

```json
{
    "name": "Course Name",
    "slug": "course-name",
    "description": "Course Description"
}
```

| Header          | Value                      |
| :-------------- | :------------------------- |
| `Authorization` | `Bearer <your_token_here>` |

#### Update a course

```http
PUT /api/courses/${id}
```

**Request Body (only one of the following is required)**

```json
{
    "name": "Course Name",
    "slug": "course-name",
    "description": "Course Description"
}
```

| Parameter | Type     | Description                          |
| :-------- | :------- | :----------------------------------- |
| `id`      | `string` | **Required**. Id of course to update |

| Header          | Value                      |
| :-------------- | :------------------------- |
| `Authorization` | `Bearer <your_token_here>` |

#### Delete a course

```http
DELETE /api/courses/${id}
```

| Parameter | Type     | Description                          |
| :-------- | :------- | :----------------------------------- |
| `id`      | `string` | **Required**. Id of course to delete |

#### Enroll in a course

```http
POST /api/courses/${id}/enroll
```

| Parameter | Type     | Description                          |
| :-------- | :------- | :----------------------------------- |
| `id`      | `string` | **Required**. Id of course to enroll |

| Header          | Value                      |
| :-------------- | :------------------------- |
| `Authorization` | `Bearer <your_token_here>` |

#### Get user courses

```http
GET /api/courses
```

| Header          | Value                      |
| :-------------- | :------------------------- |
| `Authorization` | `Bearer <your_token_here>` |

#### Get Certificate by id

```http
GET /api/certificate/${certificateId}
```

| Parameter       | Type     | Description                              |
| :-------------- | :------- | :--------------------------------------- |
| `CertificateId` | `string` | **Required**. Id of certificate to fetch |

| Header          | Value                      |
| :-------------- | :------------------------- |
| `Authorization` | `Bearer <your_token_here>` |

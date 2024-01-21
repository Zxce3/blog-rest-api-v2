<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Filament Blog API

Welcome to the Filament Blog API, a RESTful API for managing and retrieving blog content, authors, categories, and media. This API is built using Laravel and leverages the Filament blog package.

## Endpoints

1. **Get Published Posts**

   - Endpoint: `GET /api/posts`
   - Description: Retrieve a list of published blog posts.
   - Response: Returns a JSON array of published blog posts.

2. **Get Drafts**

   - Endpoint: `GET /api/drafts`
   - Description: Retrieve a list of draft blog posts.
   - Response: Returns a JSON array of draft blog posts.

3. **Get Post by ID**

   - Endpoint: `GET /api/posts/{id}`
   - Description: Retrieve a specific blog post by its ID.
   - Response: Returns a JSON object with details of the specified blog post.

4. **Get Authors**

   - Endpoint: `GET /api/authors`
   - Description: Retrieve a list of blog authors.
   - Response: Returns a JSON array of blog authors.

5. **Get Author by ID**

   - Endpoint: `GET /api/authors/{id}`
   - Description: Retrieve a specific blog author by their ID.
   - Response: Returns a JSON object with details of the specified blog author.

6. **Get Categories**

   - Endpoint: `GET /api/categories`
   - Description: Retrieve a list of blog categories.
   - Response: Returns a JSON array of blog categories.

7. **Get Category by ID**

   - Endpoint: `GET /api/categories/{id}`
   - Description: Retrieve a specific blog category by its ID.
   - Response: Returns a JSON object with details of the specified blog category.

8. **Get Media**

   - Endpoint: `GET /blog/{media}`
   - Description: Retrieve a specific media file by its filename.
   - Example: `GET /blog/sample-banner.jpg`

9. **Search Posts**

   - Endpoint: `GET /api/search-posts`
   - Description: Search for posts based on a keyword.
   - Parameters:
     - `keyword` (required): The keyword to search for in post titles and content.
   - Response: Returns a JSON array of posts matching the search criteria.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

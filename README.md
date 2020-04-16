# A no frills business directory

[![Build Status](https://img.shields.io/travis/openresources/resume-builder/master.svg?style=flat-square)](https://travis-ci.org/openresources/resume-builder)
[![Quality Score](https://img.shields.io/scrutinizer/g/openresources/resume-builder.svg?style=flat-square)](https://scrutinizer-ci.com/g/openresources/resume-builder)

This is a light weight business directory which does exactly what it says on the box. Download, install and customize to suit your needs.

## Setup Instructions
1. Install composer packages, laravel etc.
```
>_ composer install
```

2. Copy/Create the application's .env file
```
.env.example to .env
```

3. Generate the application key 
```
php artisan key:gen
```

4. Update the .env file as required

5. Create an empty sqlite database e.g.
```
touch database/business_directory.sqlite
```

6. Run the database migration files and seed the core database tables
```
php artisan migrate --seed
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please use the issue tracker.

## Credits

- [Eviano Afiemo](https://github.com/openresources)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).

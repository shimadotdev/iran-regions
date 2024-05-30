# Iran Regions Laravel Package

A Laravel package containing province and city data of Iran, including calling codes, along with geolocation functionality. Ideal for managing location-based information within Laravel apps.

## Installation

You can install the package via Composer by running:

```bash
composer require shimadotdev/iran-regions
```

After installing the package, run the following Artisan command to set up the necessary migrations and seed the database with provided data:

```bash
php artisan iran-regions:install
```

This command will create two tables named cities and provinces in your database, seeded with the required data.

## Usage

Once the package is installed and migrations are run, you can start using the provided functionality.

## Example Usage

You can access province and city data using the `Iran` Class:

```php
use Shimadotdev\IranRegions\Iran;;

// Get a province by its slug
$province = Iran::province()->where('slug', '=', 'tehran')->first();

// Get all provinces with their slugs and calling codes
$provinces = Iran::province()->get(['slug', 'calling_code']);

//Update a city
$provinces = Iran::city()->where('slug', '=', 'qom')->update(['is_active'=> 0]);

```

As you see, you can also utilize Laravel's Eloquent ORM to create custom queries and interact with the data as usual.

## Localization Support

The package supports two languages: English (en) and Persian (fa) for all city and province names. You can access them using their respective slugs:

```php
trans('iranRegions::slug.' . $province->slug);
```

## Database Structure
The package creates the following tables in your database:

#### `cities` Table

| Column       | Description     |
|--------------|-----------------|
| id           | Primary key     |
| slug         | City slug       |
| is_active    | Active status   |
| province_id  | Foreign key to provinces table |
| latitude     | City latitude   |
| longitude    | City longitude  |

#### `provinces` Table

| Column       | Description     |
|--------------|-----------------|
| id           | Primary key     |
| slug         | Province slug   |
| is_active    | Active status   |
| latitude     | Province latitude |
| longitude    | Province longitude |
| calling_code | Calling code of the province |


## Testing
You can run the automated tests for the package using PHPUnit:

```bash
phpunit
```

## Contributing
Contributions are welcome! If you have any ideas for improvements or find any issues, please submit them through GitHub issues or create a pull request.

## Security Vulnerabilities

If you discover any security vulnerabilities, please report them via email to [hi@shima.dev](mailto:hi@shima.dev)

## Credits
This package is developed and maintained by [Shima.Dev](https://shima.dev)

## License
This package is open-source software licensed under the [MIT licensev](https://opensource.org/licenses/MIT).
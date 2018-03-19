![Maintenance](https://img.shields.io/maintenance/yes/2015.svg)
 ![Packagist](https://img.shields.io/packagist/v/kaishiyoku/extended-validation.svg) ![Packagist](https://img.shields.io/packagist/dt/kaishiyoku/extended-validation.svg)

# Additional Validation Rules for Laravel 5.0.x/5.1.x

## Installing
Add ```"kaishiyoku/extended-validation": "*"``` to your **composer.json**
by running ```php composer.phar require kaishiyoku/extended-validation```

And select version ```0.*```

## Add support in Laravel
Add ```'Kaishiyoku\Validation\ValidationServiceProvider',``` to 'providers' in **app/config/app.php**.

## Add localization
Add the following lines to your ```validation.php``` localization file:

**English**:
```
'array_required' => ':attribute is mandatory',
'image_dimensions_max' => ':attribute may be only :widthx:height pixels',
```
**German:**:
```
'array_required' => ':attribute ist ein Pflichtfeld',
'image_dimensions_max' => ':attribute darf maximal :widthx:height Pixel groß sein',
```

## How to use
Here is a list of included validation rules in addition to the default Laravel validation rules:

- array_required  
  The field under validation must be an array which is not empty.
- image_dimensions_max:*width[,height]*  
  The field's image dimensions under validation may not be greater than the given parameters. If no maximum height is given the maximum height is equal the maximum width.

### Examples
```
$rules = array(
	'players' => 'array_required',
	'vacation_date_from' => 'date_before:vacation_date_till'
);
```

If you have any issues feel free to open a ticket :)

Author
======
Twitter: [@kaishiyoku](https://twitter.com/kaishiyoku)  
Website: www.andreas-wiedel.de

# Additional Validation Rules for Laravel 4.0.x

## Installing
Add ```"kaishiyoku/extended-validation": "*"``` to your **composer.json**   
by running ```php composer.phar require kaishiyoku/extended-validation```

And select version ```0.*```

## Add support in Laravel
Add ```Kaishiyoku\Core\Validation\ValidationServiceProvider``` in **app/config/app.php**.

## Add localization
Add the following lines to your validation.php localization file:

**English**:
```
array_required: ':attribute is mandatory'
date_before: ':attribute must be before :date_till_attribute'
```
**German:**:
```
array_required: ':attribute ist ein Pflichtfeld'
date_before: ':attribute muss vor :date_till_attribute liegen'
```

## How to use
Here is a list of included validation rules in addition to the default Laravel validation rules:

- **array_required**  
  The field under validation must be an array which is not empty.
- **date_before:*field_name***  
  The field under validation must be before the date given as an input name *field_name*.

### Examples
```
$rules = array(
	'players' => 'array_required',
	'vacation_date_from' => 'date_before:vacation_date_till'
);
```

If you have any issues feel free to open a ticket :)

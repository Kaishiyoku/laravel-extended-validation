<?php namespace Kaishiyoku\Core\Validation;
 
use Illuminate\Support\ServiceProvider;
use Kaishiyoku\Core\Validation\Validator;

class ValidationServiceProvider extends ServiceProvider {

	public function register(){}

	public function boot()
	{
		$this->app->validator->resolver(function($translator, $data, $rules, $messages)
		{
			return new Validator($translator, $data, $rules, $messages);
		});
	}
 
}
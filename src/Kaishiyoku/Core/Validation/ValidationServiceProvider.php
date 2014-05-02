<?php namespace Zero\Validation;
 
use Illuminate\Support\ServiceProvider;
use Zero\Validation\Validator;

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
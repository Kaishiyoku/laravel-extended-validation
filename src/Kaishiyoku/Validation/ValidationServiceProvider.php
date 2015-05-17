<?php namespace Kaishiyoku\Validation;
 
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Kaishiyoku\Validation\ExtendedValidator;

class ValidationServiceProvider extends ServiceProvider {

	public function register(){}

	public function boot()
	{
        Validator::resolver(function($translator, $data, $rules, $messages)
        {
            return new ExtendedValidator($translator, $data, $rules, $messages);
        });
	}
 
}
<?php namespace Zero\Validation;

use Illuminate\Validation\Validator as BaseValidator;

class Validator extends BaseValidator {

	/**
	 * Implicit Attributes
	 *
	 * Attributes with these rules will be validated even if no value is supplied.
	 */
	protected $implicitRules = array('Required', 'RequiredWith', 'RequiredWithout', 'RequiredIf', 'Accepted', // defined by Laravel Framework
		// custom implicit rules
		'ArrayRequired');

	/**
	 * Validate that a required array attribute has filled in values.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @param  array   $parameters
	 * @return bool
	 */
	public function validateArrayRequired($attribute, $value, $parameters)
	{
		if (is_array($value) && count($value) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Validate the date is before a given date (by input name).
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @param  array   $parameters
	 * @return bool
	 */
	public function validateDateBefore($attribute, $value, $parameters)
	{
		$date_from = $value;
		$date_till = \Input::get($parameters[0]);

		if (!empty($date_till) && $date_from <= $date_till)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Replace all place-holders for the date_before rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceDateBefore($message, $attribute, $rule, $parameters)
	{
		return str_replace(':date_till_attribute', trans('validation.attributes.'.$parameters[0]), $message);
	}
	
}
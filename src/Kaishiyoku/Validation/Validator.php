<?php namespace Kaishiyoku\Validation;

use Illuminate\Validation\Validator;

class ExtendedValidator extends Validator {

	/**
	 * Implicit Attributes
	 *
	 * Attributes with these rules will be validated even if no value is supplied.
	 */
	protected $implicitRules = array('Required', 'RequiredWith', 'RequiredWithout', 'RequiredIf', 'Accepted', // defined by Laravel Framework
		// custom implicit rules
		'ArrayRequired',
		'ImageDimensionsMax');

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
	 * Validate the image dimensions.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @param  array   $parameters
	 * @return bool
	 */
	public function validateImageDimensionsMax($attribute, $value, $parameters)
	{
		$check = $this->checkDimension($value, $parameters);

        return $check;
	}

	/**
	 * Replace all place-holders for the image_dimensions_max rule.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceImageDimensionsMax($message, $attribute, $rule, $parameters)
	{
		$max_width = $parameters[0];
		$max_height = (isset($parameters[1]) ? $parameters[1] : $parameters[0]);

		return str_replace(
			array(':width', ':height'),
			array($max_width, $max_height),
			$message
		);
	}

	protected function checkDimension($value, $dimension)
	{
		$max_width = $dimension[0];
		$max_height = (isset($dimension[1]) ? $dimension[1] : $dimension[0]);
		$width_pass = false;
		$height_pass = false;

		list($width, $height) = @getimagesize($value);

        if ($width === false && $height === false)
        {
        	return array('width_pass' => false, 'height_pass' => false);
        }

        if ($width <= $dimension[0])
        {
        	$width_pass = true;
        }
        
        if ($height <= $dimension[1])
        {
        	$height_pass = true;
        }

        return $width_pass && $height_pass;
	}
	
}
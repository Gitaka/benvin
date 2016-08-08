<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class productsRequests extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'productname'=>'required',
			'category'=>'required',
			'description'=>'required',
			'quantity'=>'required',
			'price'=>'required',
			'productPhoto'=>'required',
		];
	}

}

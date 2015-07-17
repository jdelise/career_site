<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class CreateNewUserForm extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        if(Auth::user()->can('can_manage_users')){
            return true;
        }
		return false;
	}

    /**
     * Get the validation rules that apply to the request.
     *
     * @param Request $request
     * @return array
     */
	public function rules(\Illuminate\Http\Request $request)
	{
        //dd($request);
		$rules = [
			'first_name' => 'required',
            'last_name' => 'required',
            'role_list' => 'required'
		];
        if($request->method() === 'POST'){
            $rules['password'] = 'required';
            $rules['email'] = 'required|email|unique:users';
        }
        return $rules;
	}

}

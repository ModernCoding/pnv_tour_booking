<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
  private function commonRules() {

    return [
      'first_name'              =>  'required',
      'last_name'               =>  'required',
      'date_of_birth'           =>  'required',
      'address'                 =>  'required',
      'user_type_id'            =>  'required',
      'country_id'              =>  'required',
      'title_id'                =>  'required',
      'identification_type_id'  =>  'required'
    ];
  
  }


  private function storeRules() {

    return [
      'email'                   =>  'required|unique:users,email',
      'phone'                   =>  'required|unique:users,phone',

      'identification_number'   =>  
        'required|unique:users,identification_number'
    ];
  
  }


  private function updateRules() {

    return [
      'email'                   =>  
        'required|unique:users,email,'.$this->get('id'),

      'phone'                   =>  
        'required|unique:users,phone,'.$this->get('id'),

      'identification_number'   =>  
        'required|unique:users,identification_number,'.$this->get('id')
    ];
  
  }


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
    return (
      array_merge(
        $this->commonRules(),
        $this->get('id') ? $this->updateRules() : $this->storeRules()
      )
    );
  }

  public function messages()
  {
    return [
      'first_name.required'     => 'The first name is required',
      'last_name.required'      => 'The last name is required',
      'date_of_birth.required'  => 'The date of birth is required',
      'address.required'        => 'The address is required',
      'user_type_id.required'   => 'The user category is required',
      'title_id.required'       => 'The title is required',
      'identification_type_id.required'  => 'The identification is required',
      'email.required'          => 'The email is required',
      'email.unique'            => 'This email has already been registered',
      'phone.required'          => 'The phone number is required',
      'phone.unique'            => 'This phone number has already been registered',
      'identification_number.required'  => 'The identification number is required',
      'identification_number.unique'    => 'This identification number has already been registered'
    ];
  }
}

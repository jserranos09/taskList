<?php
// this page can be used to validate pages
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // need to switch to true for it to work
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
            // sets rules for the info thats put in the contact page
            'name' => 'required|string',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            // what to show for name and the required validation
            'name.required' => 'Dont forget to fill the name ',
            'email.required' => 'Email doesnt work bra'
        ];
    }
}

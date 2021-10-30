<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'deadline' => 'required',
            'note' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Task Name is required!',
            'deadline.required' => 'Deadline is required!',
            'note.required' => 'Note is required!',
        ];
    }
}

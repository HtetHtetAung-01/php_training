<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class reportRequest extends FormRequest
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
            'done' => 'required',
            'progress' => 'required',
            'problem' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Report is required!',
            'done.required' => 'Done is required!',
            'progress.required' => 'Progress is required!',
            'problem.required' => 'Problem is required!',
        ];
    }
}

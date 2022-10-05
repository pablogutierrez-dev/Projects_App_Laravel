<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class SaveProjectRequest extends FormRequest
{
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
    * @return array<string, mixed>
    */
    public function rules()
    {   
        /* if($this->getMethod() === 'POST') {
            
        } */
        
        return [
            'title' => 'required',
            'url' => [
                'required', 
                Rule::unique('projects')->ignore( $this->route('project')),
            ],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => [
                $this->route('project') ? 'nullable' : 'required', 
                'image',
            /* 'dimensions:ratio=16/9' */],
            'description' => 'required'
        ];
    }
    
    public function messages () {
        return [
            'category_id.required' => "Elige una categoria.",
            'image.required' => 'Es obligatiorio intoducir una imagen.',
            'title.required' => 'El titulo del proyecto es obligatiorio.',
            'url.required' => 'La url del proyecto es obligatioria.',
            'description.required' => 'La descripcion del proyecto es obligatioria.'
        ];
    }
}

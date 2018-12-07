<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagenServicioRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required'
        ];
        $photos = count($this->input('imagesToUpload'));
        foreach(range(0, $photos) as $index) {
            $rules['imagenes.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
        }

        return $rules;

    }
    public function store(ImagenServicioRequest $request)
    {
        ImagenServicio::create($request->all());
        return redirect('/');
    }
}

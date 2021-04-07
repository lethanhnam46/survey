<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
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
        return [
            'survey_name' => 'required|unique:surveys,survey_name' .$this->id
        ];
    }

    public function messages()
    {
        return [
            'survey_name.required' => 'Dữ liệu không được để trống',
            'survey_name.unique' => 'Tên đã tồn tại trong hệ thống, vui lòng nhập tên khác',
        ];
    }
}

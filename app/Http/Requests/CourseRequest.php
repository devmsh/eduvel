<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'course_title' => 'required',
            'teacher_name' => 'required',
            'course_start' => 'required',
            'course_price' => 'required',
            'course_image' => 'required',
            'course_video' => 'required',
            'course_description' => 'required',
            'category_id' => 'required',
            'course_time' => 'required',
            'what_will_you_learn_title' => 'required',
            'what_will_you_learn_description' => 'required',
            'video_title' => 'required',
            'video_category' => 'required',
            'video_url' => 'required',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Course;
use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasAnyRole(['Admin','Editor'])
            || auth()->user()->courses()->where('id',$this->course_id)->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course_id' => 'required',
            'coupon_code_discount_price' => 'required',

            'start_date' => [],
            'end_date' => [],
            'number_of_students' => [],
        ];
    }
}

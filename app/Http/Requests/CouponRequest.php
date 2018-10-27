<?php

namespace App\Http\Requests;

use App\Coupon;
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
            'course_id' => 'required',
            'coupon_code_discount_price' => 'required',

            'start_date' => [],
            'end_date' => [],
            'number_of_students' => [],
        ];
    }
}

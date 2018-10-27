<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCouponRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->hasAnyRole(['Admin','Editor'])
            || request()->coupon->user_id == auth()->id();
    }

    public function rules()
    {
        return [];
    }
}

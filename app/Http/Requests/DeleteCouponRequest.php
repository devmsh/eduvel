<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCouponRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->can('delete',$this->coupon);
    }

    public function rules()
    {
        return [];
    }
}

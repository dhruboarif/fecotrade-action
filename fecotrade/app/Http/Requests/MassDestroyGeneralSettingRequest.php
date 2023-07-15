<?php

namespace App\Http\Requests;

use App\Models\GeneralSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGeneralSettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('general_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:general_settings,id',
        ];
    }
}

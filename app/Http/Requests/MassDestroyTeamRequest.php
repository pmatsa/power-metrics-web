<?php

namespace App\Http\Requests;

use App\Team;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTeamRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('team_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:teams,id',
        ];
    }
}

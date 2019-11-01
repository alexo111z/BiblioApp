<?php

namespace App\Http\Resources;

use App\User as AuthUser;
use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $userResource = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];

        $userType = $request->get('userType', $this->user_type);

        if ($userType === AuthUser::TYPE_TEACHER || $userType === AuthUser::TYPE_ADMINISTRATIVE) {
            $userResource['payroll'] = $this->payroll;
        }

        if ($userType === AuthUser::TYPE_STUDENT) {
            $userResource['control_number'] = $this->control_number;
            $userResource['career'] = $this->career;
        }

        if ($userType === AuthUser::TYPE_ADMINISTRATIVE) {
            $userResource['position'] = $this->position;
        }

        return $userResource;
    }
}

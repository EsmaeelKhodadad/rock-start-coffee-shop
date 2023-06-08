<?php

namespace App\Transformers;

use App\DTO\UserViewDTO;
use Illuminate\Database\Eloquent\Model;

class UserTransformer
{
    /**
     * @param Model $user
     * @return UserViewDTO
     */
    public static function modelToUserViewDTO(Model $user): UserViewDTO
    {
        return (new UserViewDTO())
            ->setId($user->id)
            ->setUserType($user->user_type)
            ->setEmail($user->email)
            ->setEmailVerifiedAt($user->email_verified_at)
            ->setCreatedAt($user->created_at)
            ->setUpdatedAt($user->updated_at);
    }
}

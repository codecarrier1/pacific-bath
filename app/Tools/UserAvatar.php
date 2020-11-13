<?php

namespace App\Tools;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class UserAvatar
{
    /**
     * @param User $user
     * @param $url
     * @return \Spatie\MediaLibrary\Models\Media
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     */
    public function update(User $user, $url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            if ($url !== User::GOOGLE_DEFAULT_IMAGE) {
                $user->addMediaFromUrl($url)->toMediaCollection('avatar');
                Cache::forget('avatar_' . $user->id);
                Cache::forget('small_avatar_' . $user->id);
            }
        } else {
            Log::error('User ' . $user->email . ' avatar provided by Google not a valid URL.');
            Log::debug($url);
        }
    }
}

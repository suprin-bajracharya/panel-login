<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    

    public function update(User $user, Post $post){
        //return true;
        return $user->owns($post);
        //return $this->id == $related->user_id;
    }

    public function destroy(User $user, Post $post){
        //return true;
        return $this->id == $related->user_id;
        //return $user->owns($post);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        App\Post::class => App\Policies\PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('show-post', function($user, $post){
        //     return $user->owns($post);
        // }); 

        // Gate::define('update-post', function($user, $post){
        //      return $user->owns($post);
        // });

        // Gate::define('destroy-post', function($user, $post){
        //      return $user->owns($post);
        // });

        // foreach($this->getPermissions() as $permission){
        //     Gate::define($permission->name, function($user){
        //         $user->hasRole($permission->roles);
        //     });
        // }

        
    }

    // protected function getPermissions(){
    //     return Permission::with('roles')->get();
    // }
}
// 
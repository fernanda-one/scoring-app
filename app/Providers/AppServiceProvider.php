<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $managementRole = [
            "admin"=>["Admin"],
            "juri"=>['Juri Pertama',"Juri Kedua","Juri Ketiga"],
            "ketua"=>["Ketua"],
            "dewan"=>['Dewan'],
            'guest'=>['Guest'],
            'operator'=>['Operator']
        ];
        foreach ($managementRole as $access => $roles) {
            Gate::define($access, function (User $users) use ($roles) {
               $role = Role::findOrFail($users['role_id']);
               return $this->checkIsRole($roles, $role);
            });
        }
    }

    private function checkIsRole($roles, $role)
    {
        $isTrue = false;
        foreach ( $roles as $item) {
            if ($item === $role['name'] && env("MANAGEMENT_ROLE")){
                $isTrue = true;
                break;
            }
        }
        return $isTrue;
    }
}

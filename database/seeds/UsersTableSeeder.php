<?php

use App\Role;
use App\User;
use App\Address;
use App\Profile;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->make()->each(function (User $user) {
            $user->role()->associate($this->getRole('administrator'))->save();
            $user->addresses()->create(
               $this->getAddresses(['primary', 'shipping', 'billing'])
            );
            $user->profile()->create($this->getProfile())->save();

        });

        factory(User::class, 2)->make()->each(function (User $user) {
            $user->role()->associate($this->getRole('editor'))->save();
            $user->addresses()->createMany([
                $this->getAddresses('billing'),
                $this->getAddresses('shipping')
            ]);
            $user->profile()->create($this->getProfile())->save();
        });

        factory(User::class, 1)->make()->each(function (User $user) {
            $user->role()->associate($this->getRole('unverified'))->save();
        })->first(function(User $user){
            $user->addresses()->create(
                $this->getAddresses(['primary'])
            );
        });

//        factory(User::class, 3)->state('unverified')->create()->first(function (User $user) {
//            $user->addresses()->create(
//                $this->getAddresses('primary')
//            );
//        });

    }

    private function getRole($slug)
    {
        return Role::whereSlug($slug)->first() ?? factory(Role::class)->state($slug)->create();
    }

    private function getAddresses($type)
    {
        return factory(Address::class)->states($type)->make()->toArray();
    }

    private function getProfile()
    {
        return factory(Profile::class)->make()->toArray();
    }

}

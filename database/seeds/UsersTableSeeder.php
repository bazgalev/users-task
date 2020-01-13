<?php

use App\City;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $this->call(CitiesSeeder::class);

        foreach (City::all() as $city) {
            $count = random_int(0, 15);
            for ($i = 0; $i < $count; $i++) {
                $user = factory(User::class)->make();
                $city->users()->save($user);
            }
        }
    }
}

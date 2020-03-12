<?php

use App\Eloquent\CityEloquent;
use App\Eloquent\UserEloquent;
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

        foreach (CityEloquent::all() as $city) {
            $count = random_int(0, 15);
            for ($i = 0; $i < $count; $i++) {
                $user = factory(UserEloquent::class)->make();
                $city->users()->save($user);
            }
        }
    }
}

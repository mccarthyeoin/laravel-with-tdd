<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Project;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'name' => 'Eoin McCarthy',
            'email' => 'eoin@test.com',
            'password' => Hash::make('test'),
        ]);

        factory(Project::class, 6)->create([
            'owner_id' => $user->id,
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class TransportingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goods')->delete();
        DB::table('transportings')->delete();

        factory(\App\Models\Transporting::class, 10)->create()->each(function ($transporting) {
            factory(\App\Models\Good::class, 10)->create(['transporting_id' => $transporting->id]);
        });
    }
}

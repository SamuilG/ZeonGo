<?php

namespace Database\Seeders;

use App\Models\Pass;
use App\Models\User;
use App\Models\Device;
use App\Models\History;
use App\Models\Manager;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $a = User::find(1);
        $a->email_verified = 1;
        $a->save();
        
        Device::create([
            'device_name' => 'EG Geo Milev',
            'uuid' => Device::createUUID(),
            'device_description' => 'EG Geo Milev is a school located in Dobrich. Sami the giga chad is from there!',
            'coordinates' => '43.5660385636653, 27.81893540981833',
            'device_key' => Device::createKey(),
        ]);
        Device::create([
            'device_name' => 'PMG Ivan Vazov',
            'uuid' => Device::createUUID(),
            'device_description' => 'PMG Ivan Vazov is a school located in Dobrich. Ilko studies there!',
            'coordinates' => '43.564057234319115, 27.828727169323802',
            'device_key' => Device::createKey(),
        ]);
        Device::create([
            'device_name' => 'AAAAAAAAAA',
            'uuid' => Device::createUUID(),
            'device_description' => 'AAAAAAAAAAAAAAAAA',
            'coordinates' => '43.57019220851931, 27.82741656421111',
            'device_key' => Device::createKey(),
        ]);
        Pass::create([
            'device_id' => 1,
            'user_id' => 1,
            'approved' => true,
        ]);
        Pass::create([
            'device_id' => 2,
            'user_id' => 1,
            'approved' => true,
        ]);
        Pass::create([
            'device_id' => 3,
            'user_id' => 1,
            'approved' => true,
        ]);
        Manager::create([
            'device_id' => 2,
            'user_id' => 1
        ]);
        History::factory()->times(100)->create();
        \App\Models\User::factory(20)->create();
        \App\Models\Pass::factory(10)->create();

        // Pass::create([
        //     'device_id' => 1,
        //     'user_id' => 5,
        //     'approved' => false,
        // ]);
        // Manager::create([
        //     'device_id' => 1,
        //     'user_id' => 1
        // ]);
    }
}

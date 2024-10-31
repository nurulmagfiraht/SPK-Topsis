<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'admin@mail.com',
                'email_verified_at' => '2023-11-19 02:19:08',
                'password' => '$2y$10$nUUp9rJtgJ/wqGuavkcDs.O/2XK/barfaQB98HXjQ.WzNusYpZ/4.',
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'two_factor_confirmed_at' => null,
                'type' => '0',
                'remember_token' => 'IrGyRugnrnl6QrZrj72EhoWChPOoFlRp6apAoIvTNlJXv669hQ4w6NCodack',
                'current_team_id' => null,
                'profile_photo_path' => null,
                'status' => '1',
                'clinic_id' => null,
                'created_at' => '2023-11-19 02:18:49',
                'updated_at' => '2024-02-13 04:47:38',
            ],
            [
                'id' => 2,
                'name' => 'Operator',
                'email' => 'operator@mail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$tHzZkkbz0KL8NWMGU0X6LeLe4QD.fUEFWJhJ4Z49p.BSOPASJraSy',
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'two_factor_confirmed_at' => null,
                'type' => '1',
                'remember_token' => 'xWoLy5ak57CxSP1NsMsces0wLByknWtdurcc5NsLg6tmyyXq3qye5ZRPjSrm',
                'current_team_id' => null,
                'profile_photo_path' => null,
                'status' => '1',
                'clinic_id' => 1,
                'created_at' => '2023-11-19 02:25:39',
                'updated_at' => '2024-02-13 04:50:17',
            ],
            // Tambahkan data lainnya dengan format yang sama
        ]);
    }
}

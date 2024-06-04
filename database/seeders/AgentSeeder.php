<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agent; 
class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agent = [
            'name' => 'Agent',
            'email' => 'agent@gmail.com',
            'password' => bcrypt('password')
        ];
        Agent::create($agent);
    }
}

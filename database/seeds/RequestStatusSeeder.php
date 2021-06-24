<?php

use App\Models\Requests_status;
use Illuminate\Database\Seeder;

class RequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
               'name'=>'pending',
               
            ],
            [
               'name'=>'approved',
              
            ],
            [
                'name'=>'reject',
               
             ],
        ];
  
        foreach ($data as $key => $value) {
            Requests_status::create($value);
        }
    }
}

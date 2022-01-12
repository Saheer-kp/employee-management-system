<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Designation::where('id', 1)->doesntExist())
        {
            $desigantion = New Designation();
            $desigantion->title = "Managing Director";
            $desigantion->save();
        }
        if(Designation::where('id', 2)->doesntExist())
        {
            $desigantion = New Designation();
            $desigantion->title = "Chief Technology Officer";
            $desigantion->save();
        }
        if(Designation::where('id', 3)->doesntExist())
        {
            $desigantion = New Designation();
            $desigantion->title = "Chief Operating Officer";
            $desigantion->save();
        }
        if(Designation::where('id', 4)->doesntExist())
        {
            $desigantion = New Designation();
            $desigantion->title = "Chief Marketing Officer";
            $desigantion->save();
        }
    }
}

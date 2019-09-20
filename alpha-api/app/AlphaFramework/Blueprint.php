<?php

namespace App\AlphaFramework;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint as BaseBlueprint;

class Blueprint extends BaseBlueprint
{

    public function BaseEntity()
    {
        $this->bigIncrements("id")->index();
        $this->unsignedBigInteger("company_id")->default(0)->index();
        $this->boolean("status")->default(1);
        $this->unsignedBigInteger("created_by_id");
        $this->dateTime("created_on")->default(DB::raw('CURRENT_TIMESTAMP'));
        $this->unsignedBigInteger("updated_by_id")->nullable();
        $this->dateTime("updated_on")->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
    }
}

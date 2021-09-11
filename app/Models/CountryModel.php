<?php

namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class CountryModel extends Model{
        protected $table = "_z_country";

        protected $fillable = [
            'iso', 'name','dname','iso3','position', 'numcode', 'phonecode',
            'phonecode', 'crreated', 'register_by', 'modified', 'modified_by'
        ];
    }
?>

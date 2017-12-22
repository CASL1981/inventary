<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model
{
	use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'make', 'ABC','stockmin', 'stockmax', 'residue', 'status', 'provider_id', 'um', 'typearticle'
    ];
 	
 	public function inventories()
    {
    	return $this->hasMany(Inventory::class);   	
    }   
}

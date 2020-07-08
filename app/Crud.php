<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $table = 'cruds';
    protected $primaryKey = 'crud_id';
    protected $fillable = ['name', 'department'];

    public function validation()
    {
    	return [

    		'name' => 'required',
    		'department' => 'required'

    	];
    }

    protected $dispatchesEvents = [

        'created' => \App\Events\CrudSave::class,
        'updated' => \App\Events\CrudUpdate::class,
        'deleted' => \App\Events\CrudDelete::class,
    ];

}

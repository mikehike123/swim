<?php

namespace App\Instructors;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Swimmer.
 *
 * @author  The scaffold-interface created at 2016-09-29 08:48:14pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Swimmer extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'swimmers';
    protected $fillable = ['First_Name', 'Last_Name'];
	
}

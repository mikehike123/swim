<?php 

namespace App\AdminSwim;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Skill.
 *
 * @author  The scaffold-interface created at 2016-09-29 08:48:14pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Skill extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'skills';

	public function ScopeCardId($query, $cardId)
    {
        return $query->where('card_id', $cardId);
    }
}

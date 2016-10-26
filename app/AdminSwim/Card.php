<?php  

namespace App\AdminSwim;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Card.
 *
 * @author  The scaffold-interface created at 2016-09-29 08:48:14pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Card extends Model
{
	
	
    public $timestamps = true;
    
    protected $table = 'cards';
    protected $fillable = ['card_name'];

    public function skills()
    {
        return $this->hasMany('\App\AdminSwim\Skill');
    }

	
}
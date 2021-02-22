<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkAssignment
 * 
 * @property int $id
 * @property int $work_id
 * @property int $user_id
 *
 * @package App\Models
 */
class WorkAssignment extends Model
{
	protected $table = 'work_assignment';
	public $timestamps = false;

	protected $casts = [
		'work_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'work_id',
		'user_id'
	];
}

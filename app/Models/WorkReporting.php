<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkReporting
 * 
 * @property int $id
 * @property int $work_id
 * @property int $user_id
 * @property string $reporting
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class WorkReporting extends Model
{
	protected $table = 'work_reporting';
	public $timestamps = false;

	protected $casts = [
		'work_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'work_id',
		'user_id',
		'reporting'
	];
}

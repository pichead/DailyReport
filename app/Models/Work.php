<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Work
 * 
 * @property int $id
 * @property string $name
 * @property string $detail
 * @property int $progress
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property string|null $remark
 * @property int $created_by
 * @property Carbon $created_at
 * @property int $visible
 *
 * @package App\Models
 */
class Work extends Model
{
	protected $table = 'work';
	public $timestamps = false;

	protected $casts = [
		'progress' => 'int',
		'created_by' => 'int',
		'visible' => 'int'
	];

	protected $dates = [
		'start_date',
		'end_date'
	];

	protected $fillable = [
		'name',
		'detail',
		'progress',
		'start_date',
		'end_date',
		'remark',
		'created_by',
		'visible'
	];
}

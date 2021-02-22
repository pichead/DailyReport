<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkReport
 * 
 * @property int $id
 * @property int $work_id
 * @property int $report
 * @property int $visible
 *
 * @package App\Models
 */
class WorkReport extends Model
{
	protected $table = 'work_report';
	public $timestamps = false;

	protected $casts = [
		'work_id' => 'int',
		'report' => 'int',
		'visible' => 'int'
	];

	protected $fillable = [
		'work_id',
		'report',
		'visible'
	];
}

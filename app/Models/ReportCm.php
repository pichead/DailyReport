<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportCm
 * 
 * @property int $id
 * @property int $report_id
 * @property string $cm
 * @property int $cm_user_id
 * @property int $status_user_id
 *
 * @package App\Models
 */
class ReportCm extends Model
{
	protected $table = 'report_cm';
	public $timestamps = false;

	protected $casts = [
		'report_id' => 'int',
		'cm_user_id' => 'int',
		'status_user_id' => 'int'
	];

	protected $fillable = [
		'report_id',
		'cm',
		'cm_user_id',
		'status_user_id'
	];
}

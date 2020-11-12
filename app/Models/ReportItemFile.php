<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportItemFile
 * 
 * @property int $id
 * @property int|null $report_id
 * @property string|null $file
 * @property Carbon|null $upload_time
 * @property int $visible
 *
 * @package App\Models
 */
class ReportItemFile extends Model
{
	protected $table = 'report_itemFile';
	public $timestamps = false;

	protected $casts = [
		'report_id' => 'int',
		'visible' => 'int'
	];

	protected $dates = [
		'upload_time'
	];

	protected $fillable = [
		'report_id',
		'file',
		'upload_time',
		'visible'
	];
}

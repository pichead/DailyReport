<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Report
 *
 * @property int $ID
 * @property string $Name
 * @property Carbon $workDate
 * @property string $Work1
 * @property string $Work2
 * @property string $Work3
 * @property string $Work4
 * @property string $Work5
 * @property string $Work6
 * @property Carbon $TimeStamp
 *
 * @package App\Models
 */
class Report extends Model
{
	protected $table = 'report';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $dates = [
		'workDate',
		'TimeStamp'
	];

	protected $fillable = [
		'Name',
		'workDate',
		'Work1',
		'Work2',
		'Work3',
		'Work4',
		'Work5',
		'Work6',
		'TimeStamp'
	];
}

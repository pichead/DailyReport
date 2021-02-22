<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportStatus
 * 
 * @property int $id
 * @property string $name
 *
 * @package App\Models
 */
class ReportStatus extends Model
{
	protected $table = 'report_status';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}

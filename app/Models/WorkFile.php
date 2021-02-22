<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkFile
 * 
 * @property int $id
 * @property int $work_id
 * @property string $name
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class WorkFile extends Model
{
	protected $table = 'work_file';
	public $timestamps = false;

	protected $casts = [
		'work_id' => 'int'
	];

	protected $fillable = [
		'work_id',
		'name'
	];
}

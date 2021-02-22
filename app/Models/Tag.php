<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * 
 * @property int $id
 * @property int $report_id
 * @property int $tag_user_id
 * @property int $visible
 * 
 * @property Report $report
 *
 * @package App\Models
 */
class Tag extends Model
{
	protected $table = 'tag';
	public $timestamps = false;

	protected $casts = [
		'report_id' => 'int',
		'tag_user_id' => 'int',
		'visible' => 'int'
	];

	protected $fillable = [
		'report_id',
		'tag_user_id',
		'visible'
	];

	public function report()
	{
		return $this->belongsTo(Report::class);
	}
}

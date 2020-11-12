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
 * @property int $id
 * @property Carbon $timestamp
 * @property int $name_id
 * @property int $visible
 * @property string $Work_type
 * @property Carbon $WorkDate
 * @property string|null $cm
 * @property string|null $Work1
 * @property string|null $Work2
 * @property string|null $Work3
 * @property string|null $Work4
 * @property string|null $Work5
 * @property string|null $Work6
 * @property string|null $Work7
 * @property string|null $Work8
 * @property string|null $Work9
 * @property string|null $Work10
 * @property string|null $Work11
 * @property string|null $Work12
 * @property string|null $Work13
 * @property string|null $Work14
 * @property string|null $Work15
 * @property string $Work_status
 * @property string|null $W1_time_start
 * @property string|null $W2_time_start
 * @property string|null $W3_time_start
 * @property string|null $W4_time_start
 * @property string|null $W5_time_start
 * @property string|null $W6_time_start
 * @property string|null $W7_time_start
 * @property string|null $W8_time_start
 * @property string|null $W9_time_start
 * @property string|null $W10_time_start
 * @property string|null $W11_time_start
 * @property string|null $W12_time_start
 * @property string|null $W13_time_start
 * @property string|null $W14_time_start
 * @property string|null $W15_time_start
 * @property string|null $W1_time_end
 * @property string|null $W2_time_end
 * @property string|null $W3_time_end
 * @property string|null $W4_time_end
 * @property string|null $W5_time_end
 * @property string|null $W6_time_end
 * @property string|null $W7_time_end
 * @property string|null $W8_time_end
 * @property string|null $W9_time_end
 * @property string|null $W10_time_end
 * @property string|null $W11_time_end
 * @property string|null $W12_time_end
 * @property string|null $W13_time_end
 * @property string|null $W14_time_end
 * @property string|null $W15_time_end
 * @property string|null $W1_ref
 * @property string|null $W2_ref
 * @property string|null $W3_ref
 * @property string|null $W4_ref
 * @property string|null $W5_ref
 * @property string|null $W6_ref
 * @property string|null $W7_ref
 * @property string|null $W8_ref
 * @property string|null $W9_ref
 * @property string|null $W10_ref
 * @property string|null $W11_ref
 * @property string|null $W12_ref
 * @property string|null $W13_ref
 * @property string|null $W14_ref
 * @property string|null $W15_ref
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Report extends Model
{
	protected $table = 'report';
	public $timestamps = false;

	protected $casts = [
		'name_id' => 'int',
		'visible' => 'int'
	];

	protected $dates = [
		'timestamp',
		'WorkDate'
	];

	protected $fillable = [
		'timestamp',
		'name_id',
		'visible',
		'Work_type',
		'WorkDate',
		'cm',
		'Work1',
		'Work2',
		'Work3',
		'Work4',
		'Work5',
		'Work6',
		'Work7',
		'Work8',
		'Work9',
		'Work10',
		'Work11',
		'Work12',
		'Work13',
		'Work14',
		'Work15',
		'Work_status',
		'W1_time_start',
		'W2_time_start',
		'W3_time_start',
		'W4_time_start',
		'W5_time_start',
		'W6_time_start',
		'W7_time_start',
		'W8_time_start',
		'W9_time_start',
		'W10_time_start',
		'W11_time_start',
		'W12_time_start',
		'W13_time_start',
		'W14_time_start',
		'W15_time_start',
		'W1_time_end',
		'W2_time_end',
		'W3_time_end',
		'W4_time_end',
		'W5_time_end',
		'W6_time_end',
		'W7_time_end',
		'W8_time_end',
		'W9_time_end',
		'W10_time_end',
		'W11_time_end',
		'W12_time_end',
		'W13_time_end',
		'W14_time_end',
		'W15_time_end',
		'W1_ref',
		'W2_ref',
		'W3_ref',
		'W4_ref',
		'W5_ref',
		'W6_ref',
		'W7_ref',
		'W8_ref',
		'W9_ref',
		'W10_ref',
		'W11_ref',
		'W12_ref',
		'W13_ref',
		'W14_ref',
		'W15_ref'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'name_id');
	}
}

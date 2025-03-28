<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property int $team
 * @property bool $type
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Report[] $reports
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'team' => 'int',
		'type' => 'bool'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'team',
		'type',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function reports()
	{
		return $this->hasMany(Report::class, 'name_id');
	}
}

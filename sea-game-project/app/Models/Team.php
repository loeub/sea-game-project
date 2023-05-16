<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'member',
        'user_id',
    ];

    
    public static function store($request, $id = null)
    {
        $teams = $request->only(['name', 'member', 'user_id']);
        $teams = self::updateOrCreate(['id' => $id], $teams);
        return $teams;
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Event()
    {
        return $this->belongsToMany(Event::class,'event_teams');
    }

}

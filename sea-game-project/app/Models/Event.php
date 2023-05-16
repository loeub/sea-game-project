<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dateStart',
        'dateEnd',
        'location',
        'user_id',
    ];

    public static function store($request, $id = null)
    {
        $event = $request->only(['name', 'dateStart', 'dateEnd', 'location', 'user_id']);
        $event = self::updateOrCreate(['id' => $id], $event);
        return $event;
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    
    public function Team(){
        return $this->belongsToMany(Team::class,'event_teams');
    }

    public function Ticket(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}

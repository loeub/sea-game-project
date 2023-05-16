<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'timeStart',
        'timeEnd',
        'user_id',
        'event_id',
        'location'
    ];

    
    public static function store($request, $id = null)
    {
        $ticket = $request->only([
            'name',
            'timeStart',
            'timeEnd',
            'user_id',
            'event_id',
            'location'
        ]);
        $data = self::updateOrCreate(['id' => $id], $ticket);
        return $data;
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function Event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}

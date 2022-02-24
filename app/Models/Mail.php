<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'body', 'sender_id', 'recipient_id', 'is_sent'
    ];

    protected $appends = [
        'status'
    ];

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient() {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function getStatusAttribute() {
        if ($this->is_sent) {
            return 'Enviado';
        }

        return 'Procesado';
    }
}

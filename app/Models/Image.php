<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['filename', 'proposal_id'];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}

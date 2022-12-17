<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalUsers extends Model
{
    use HasFactory;

    protected $table = 'proposal_users';
    protected $fillable = ['user_id', 'proposal_id'];
}

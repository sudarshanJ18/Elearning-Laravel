<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    // Specify the table name if it's not "resources"
    protected $table = 'resources';

    // Add fillable fields for mass assignment
    protected $fillable = ['title', 'type', 'url'];
}

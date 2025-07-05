<?php

namespace App\Models;

use CodeIgniter\Model;

class EntryModel extends Model
{
    protected $table = 'entries';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'title',
        'content',
        'date',
        'mood',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = false; // timestamps dihandle oleh MySQL
}

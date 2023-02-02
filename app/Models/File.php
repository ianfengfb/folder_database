<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        "file_name",
        "file_body",
        "folder_id"
        
    ];

    // Relationship To folder
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id');
    }
}

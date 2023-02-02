<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    public $fillable = ['folder_name','parent_folder'];

    // retrieve all parent folders
    public function getParentsAttribute()
    {
        $parents = collect([]);

        $parent = $this->parent;

        while(!is_null($parent)) {
            $parents->push($parent);
            $parent = $parent->parent;
        }

        return $parents;
    }

     // Relationship To parent folder
     public function parent()
     {
         return $this->belongsTo(Folder::class, 'parent_folder', 'id');
     }
     // Relationship To sub folders
     public function children()
     {
         return $this->hasMany(Folder::class, 'parent_folder', 'id');
     }
     // Relationship To files
     public function files()
     {
         return $this->hasMany(File::class, 'folder_id');
     }

}

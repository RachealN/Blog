<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['category','author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false ,  function($query, $search) {
            $query->where('title' , 'LIKE' , '%' . $search . '%' )
                ->orWhere('body' , 'LIKE' , '%' . $search . '%');

        });

        $query->when($filters['category'] ?? false , function($query){
            $query->whereHas('category' , function($query){ //relationship
                $query->Where('slug' , request('category'));
            });
        });

        $query->when($filters['author'] ?? false , function($query){
            $query->whereHas('author' , function($query){ //relationship
                $query->Where('username' , request('author'));
            });
        });
    }
        }

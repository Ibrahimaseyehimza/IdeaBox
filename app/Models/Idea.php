<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Department;
use App\Models\Project;
use App\Models\Theme;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    const STATUS_EN_ETUDE = 'en_etude';
    const STATUS_VALIDEE = 'validee';
    const STATUS_MISE_EN_OEUVRE = 'mise_en_oeuvre';
    const STATUS_REJETEE = 'rejete';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'theme_id',
        'department_id',
        'project_id',
        'status',
        'attachment',
        'is_anonymous'
    ];

    // Relations belongs to === appattient à
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function voters()
    {
        return $this->belongsToMany(User::class, 'votes')->withTimestamps();

    }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    // public function comments() {
    //     return $this->hasMany(Comment::class)->whereNull('parent_id')->latest();
    // }

//     public function comments()
// {
//     return $this->hasMany(Comment::class)->whereNull('parent_id')->with(['user', 'replies.user'])->latest();
// }

public function comments()
{
    return $this->hasMany(Comment::class)->with(['user', 'replies.user'])->latest();
}


}

<?php namespace PaulAllen\Movies\Models;

use Model;

/**
 * Model
 */
class Actor extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'paulallen_movies_actors_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $fillable = [
        'name',
        'lastname'
    ];

    // Relationships

    public $belongsToMany = [
        'movies' => [
            'PaulAllen\Movies\Models\Movie',
            'table' => 'paulallen_movies_actors_movies_',
            'order' => 'name'
        ]
    ];

    public $attachOne = [
        'actorImage' => 'System\Models\File'
    ];

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
    }
}

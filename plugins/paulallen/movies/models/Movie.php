<?php namespace PaulAllen\Movies\Models;

use Model;

/**
 * Model
 */
class Movie extends Model
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
    public $table = 'paulallen_movies_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $fillable = [
        'name',
        'slug',
        'year',
        'created_at',
        'published',
        'genres'
    ];

    protected $jsonable = ['themes'];

    // Relationships

    public $belongsToMany = [
        'genres' => [
            'PaulAllen\Movies\Models\Genre',
            'table' => 'paulallen_movies_movies_genres_',
            'order' => 'genre_title'
        ],
        'actors' => [
            'PaulAllen\Movies\Models\Actor',
            'table' => 'paulallen_movies_actors_movies_',
            'order' => 'name'
        ]
    ];

    /**
     * @var array Single Attachments
     */
    public $attachOne = [
        'poster' => 'System\Models\File'
    ];

    /**
     * @var array Multiple Attachments
     */
    public $attachMany = [
        'movie_gallery' => 'System\Models\File'
    ];
}

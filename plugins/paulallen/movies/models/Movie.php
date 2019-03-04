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

    protected $jsonable = ['actors'];

    // Relationships

    public $belongsToMany = [
        'genres' => [
            'PaulAllen\Movies\Models\Genre',
            'table' => 'paulallen_movies_movies_genres_',
            'order' => 'genre_title'
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

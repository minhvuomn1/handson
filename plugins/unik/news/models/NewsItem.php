<?php namespace Unik\News\Models;

use Model;

/**
 * Model
 */
class NewsItem extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_news_item';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function scopeIsVisible($query)
    {
        return $query->where('is_visible', true);
    }    
    public $belongsTo = [
        'category' => NewsCategory::class
    ];       
}

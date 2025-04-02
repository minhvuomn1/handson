<?php namespace Unik\News\Models;

use Model;

/**
 * Model
 */
class NewsCategory extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_news_category';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
    ];

    public $hasMany = [
        'items' => [NewsItem::class, 'key' => 'category_id', 'scope' => 'isVisible']
    ];  
}

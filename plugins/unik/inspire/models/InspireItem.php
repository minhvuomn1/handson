<?php namespace Unik\Inspire\Models;

use Model;

/**
 * Model
 */
class InspireItem extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    protected $guarded = ['*'];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_inspire_item';

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
        'category' => InspireCategory::class
    ];   
    public $belongsToMany = [
        'tags' => [
            InspireTags::class,
            'table' => 'unik_inspire_item_tags',
            'key' => 'item_id',
            'otherKey' => 'tag_id'
        ]
    ];            
}

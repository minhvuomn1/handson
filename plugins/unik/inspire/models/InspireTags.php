<?php namespace Unik\Inspire\Models;

use Model;

/**
 * Model
 */
class InspireTags extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_inspire_tags';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
    ];

    public $belongsToMany = [
        'items' => [
            InspireItem::class,
            'table' => 'unik_inspire_item_tags',
            'key' => 'tag_id',
            'otherKey' => 'item_id'
        ]
    ];    
}

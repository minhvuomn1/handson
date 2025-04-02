<?php namespace Unik\Inspire\Models;

use Model;

/**
 * Model
 */
class InspireCategory extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    // use \October\Rain\Database\Traits\Sluggable;

    // protected $slugs = ['slug' => 'name'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_inspire_category';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
    ];

    public $hasMany = [
        'items' => [InspireItem::class, 'key' => 'category_id', 'scope' => 'isVisible']
    ]; 

    // public function beforeSave()
    // {
    //     // Autogenerate name
    //     if (empty($this->name)) {
    //         $this->name = $this->make . ' ' . $this->model . ' ' . $this->variant;
    //     }

    //     // Force creation of slug
    //     if (empty($this->slug)) {
    //         unset($this->slug);
    //         $this->setSluggedValue('slug', 'name');
    //     }
    // }               
}

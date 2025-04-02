<?php namespace Unik\Component\Models;

use Model;

class XstSettings extends Model
{
    use \October\Rain\Database\Traits\Encryptable;

    public $rules = [
        // 'gallery'   => 'nullable|image|max:4000',     
    ];

    // public $attachMany = [
    //     'gallery' => [\System\Models\File::class, 'delete' => true]
    // ];         
    
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'sxt_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    /**
     * @var array List of attributes to encrypt.
     */
    protected $encryptable = ['password'];
}
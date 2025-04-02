<?php

namespace Unik\Creative\Models;

use Backend\Facades\BackendAuth;
use Yaml;
use File;
use Db;
use Backend\Models\ExportModel;
use Carbon\Carbon;
use Unik\Creative\Models\CreativeItem;

class CreativeItemExport extends ExportModel
{
  /**
   * @var array Fillable fields
   */
  protected $fillable = ['from', 'to','category'];

  public function listCategory($fieldName, $value, $formData)
  {
    $data = [];
    $data[''] = 'All';
    $categories = CreativeItem::get();
    foreach ($categories as $item) {
      $data[strip_tags($item->name)] = strip_tags($item->name);
    }    
    return $data;
  }

  public function exportData($columns, $sessionKey = null)
  {

        $category = $this->category;

        // Filter by date range
        $query_date = '';
        $query_activity_date = '';
        if ($this->from) {
          $from = Carbon::createFromFormat('Y-m-d H:i:s', $this->from);
          $from->setTime(0, 0);

          $query_date ='created_at >= \''.$from.'\' ';
          $query_activity_date ='created_at >= \''.$from.'\' ';
        }
        if ($this->to) {
          $to = Carbon::createFromFormat('Y-m-d H:i:s', $this->to);
          $to->setTime(23, 59, 59);
          if ($this->from) {
            $query_date.= 'AND ';
            $query_activity_date.= 'AND ';
          }
          $query_date.= 'created_at <= \''.$to.'\' ';
          $query_activity_date.= 'created_at <= \''.$to.'\' ';
        }

        $selectColumns = [
          'name',
          'phone',
          'dob',
          'email',
          'cch',
        ];    
        $sql = 'SELECT ' . implode(',', $selectColumns) . ' ';       
        $sql .= 'FROM unik_creative_register 
          WHERE phone IS NOT NULL '.($category?(' AND cch = \''.$category.'\' '):'')
          .($query_activity_date?' AND '.$query_activity_date:'');
        $data = DB::select($sql);
        $data = json_decode(json_encode($data), true);
    return $data;
  }

}

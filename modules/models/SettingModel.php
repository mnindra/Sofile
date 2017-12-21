<?php
class SettingModel extends Eloquent {

  protected $tableName = "setting";
  protected $primaryKey = "setting_id";
  protected $fillable = [
    'company',
    'email',
    'phone',
    'address'
  ];
}
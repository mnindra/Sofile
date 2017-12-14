<?php
class ServiceModel extends Eloquent {

  protected $tableName = "service";
  protected $primaryKey = "service_id";
  protected $fillable = [
    'service',
    'service_description',
  ];
}
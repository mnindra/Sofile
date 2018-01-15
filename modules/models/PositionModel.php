<?php
class PositionModel extends Eloquent {

  protected $tableName = "position";
  protected $primaryKey = "position_id";
  protected $fillable = [
    'position',
    'salary',
    'position_description',
    'open',
    'photo'
  ];
}
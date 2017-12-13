<?php
class TeamModel extends Eloquent {

  protected $tableName = "team";
  protected $primaryKey = "team_id";
  protected $fillable = [
    'team',
  ];
}
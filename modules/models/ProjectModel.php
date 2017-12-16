<?php
class ProjectModel extends Eloquent {

  protected $tableName = "project";
  protected $primaryKey = "project_id";
  protected $fillable = [
    'service_id',
    'title',
    'project_description',
    'link',
    'portfolio',
  ];
}
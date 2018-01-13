<?php
class MessageModel extends Eloquent {

  protected $tableName = "message";
  protected $primaryKey = "message_id";
  protected $fillable = [
    'job_app',
    'title',
    'name',
    'email',
    'phone',
    'company',
    'content',
    'file'
  ];
}
<?php
class MessageModel extends Eloquent {

  protected $tableName = "message";
  protected $primaryKey = "message_id";
  protected $fillable = [
    'type',
    'title',
    'name',
    'email',
    'phone',
    'company',
    'content',
    'file'
  ];
}
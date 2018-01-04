<?php
class MessageModel extends Eloquent {

  protected $tableName = "message";
  protected $primaryKey = "message_id";
  protected $fillable = [
    'type',
    'name',
    'email',
    'phone',
    'company',
    'content',
    'file'
  ];
}
<?php
class UserModel extends Eloquent {

  protected $tableName = "user";
  protected $primaryKey = "user_id";
  protected $fillable = [
    'position_id',
    'team_id',
    'name',
    'gender',
    'date',
    'address',
    'phone',
    'email',
    'username',
    'password',
    'last_login'
  ];
}
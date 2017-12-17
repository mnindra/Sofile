<?php
class TestimonialModel extends Eloquent {

  protected $tableName = "testimonial";
  protected $primaryKey = "testimonial_id";
  protected $fillable = [
    'project_id',
    'name',
    'email',
    'phone',
    'company',
    'testimonial'
  ];
}
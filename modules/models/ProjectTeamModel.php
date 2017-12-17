<?php
class ProjectTeamModel extends Eloquent {

  protected $tableName = "project_team";
  protected $primaryKey = "project_team_id";
  protected $fillable = [
    'project_id',
    'team_id',
    'task'
  ];

  public function select_unjoined_team($project_id) {
    $this->db->select("*");
    $this->db->from("team");
    $this->db->where("team_id NOT IN (SELECT team_id FROM project_team WHERE project_id = $project_id)");
    return $this->db->execute()->result();
  }
}
<?php

class Eloquent extends Model {

  protected $tableName = "";
  protected $primaryKey = "";
  protected $fillable = [];

  public function all($join = []) {

    $this->db->select("*");

    $this->db->from($this->tableName);

    foreach ($join as $item) {
      $tableOrigin = array_key_exists('tableOrigin', $item) ? $item['tableOrigin'] : $this->tableName;
      $this->db->join(
        $item['table'],
        "$tableOrigin.$item[field] = $item[table].$item[field]"
      );
    }

    return $this->db->execute()->result();
  }

  public function find($id, $join = []) {
    $this->db->select("*");
    $this->db->from($this->tableName);

    foreach ($join as $item) {
      $tableOrigin = array_key_exists('tableOrigin', $item) ? $item['tableOrigin'] : $this->tableName;
      $this->db->join(
        $item['table'],
        "$tableOrigin.$item[field] = $item[table].$item[field]"
      );
    }

    $this->db->where($this->primaryKey . ' = ' . $id);
    return $this->db->execute()->row();
  }

  public function where($condition, $join = []) {
    $this->db->select("*");
    $this->db->from($this->tableName);

    foreach ($join as $item) {
      $tableOrigin = array_key_exists('tableOrigin', $item) ? $item['tableOrigin'] : $this->tableName;
      $this->db->join(
        $item['table'],
        "$tableOrigin.$item[field] = $item[table].$item[field]"
      );
    }

    $this->db->where($condition);
    return $this->db->execute()->result();
  }

  public function create($data) {
    $insert_data = [];
    foreach ($this->fillable as $item) {
      $insert_data[$item] = $data[$item];
    }

    $this->db->insert($this->tableName, $insert_data);
    $this->db->execute();
  }

  public function update($data, $id) {
    $update_data = [];
    foreach ($this->fillable as $item) {
      $update_data[$item] = $data[$item];
    }

    $this->db->where($this->primaryKey . ' = ' . $id);
    $this->db->update($this->tableName, $update_data);
    $this->db->execute();
  }

  public function destroy($id) {
    $this->db->delete($this->tableName);
    $this->db->where($this->primaryKey . ' = ' . $id);
    $this->db->execute();
  }
}
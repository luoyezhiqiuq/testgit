<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends CI_Model
{
    public function __construct()
    {
    	$this->load->database();
        parent::__construct();
    }

    //插入数据模型
    public function insert($p)
    {
    	$ret = $this->db->insert('user',$p);
    	return $ret;
    }
    //通过主键更新模型
    public function update($p,$id)
    {
    	$this->db->where('id', $id);
		$ret = $this->db->update('user', $p);
		return $ret;
    }
    //替换更新  REPLACE 语句根据表的**主键**和**唯一索引** 来执行
    public function replace($p)
    {
    	$ret = $this->db->replace('user', $p);
    	return $ret;
    }
    //查询全部
    public function dataAll()
    {
    	$ret = $this->db->get('user');
    	$data = array();
    	foreach ($ret->result() as $row)
		{
		    $data[] = $row;
		}
		return $data;
    }
    //根据条件查询
    public function whereDataAll($p)
    {
    	$result = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);

    	if($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				$data[] = $row;
			}
		}
		return $data;
    }
    //联表查询
    public function joinDate()
    {
    	$this->db->select('*');
		$this->db->from('blogs');
		$this->db->join('comments', 'comments.id = blogs.id');
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				$data[] = $row;
			}
		}
    }
    //删除数据
    public function delect($id)
    {
    	$this->db->where('id', $id);
		$ret = $this->db->delete('mytable');
		return $ret;
    }
  
}
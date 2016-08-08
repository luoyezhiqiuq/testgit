<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ClassificationModel extends CI_Model
{
    public function __construct()
    {
    	$this->load->database();
        parent::__construct();
    }

    //插入数据模型
    public function insert($p)
    {
    	$ret = $this->db->insert('lily_shop_classification',$p);
    	return $ret;
    }
    //通过主键更新模型
    public function update($p,$id)
    {
    	$this->db->where('id', $id);
		$ret = $this->db->update('lily_shop_classification', $p);
        // echo $this->db->last_query();
		return $ret;
    }
    //替换更新  REPLACE 语句根据表的**主键**和**唯一索引** 来执行
    public function replace($p)
    {
    	$ret = $this->db->replace('lily_shop_classification', $p);
    	return $ret;
    }
    //查询全部
    public function dataAll()
    {
         $this->db->select('* ,concat(path,".",id) as paths ');
         $this->db->order_by('paths', 'asc');
    	$ret = $this->db->get('lily_shop_classification');
        // echo $this->db->last_query();
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
    	$result = $this->db->get_where('lily_shop_classification', array('id' => $p));
        $data = array();
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
		$this->db->join('lily_shop_classification', 'comments.id = blogs.id');
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
		$ret = $this->db->delete('lily_shop_classification');
		return $ret;
    }
  
}
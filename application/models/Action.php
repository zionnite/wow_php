<?php
class Action extends My_Model{
    public function __construct(){
        parent::__construct();
    }

    public function get_quote(){
        $query  =$this->db->get('quote');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }
    public function get_quote_by_id($id){
        $this->db->where('id',$id);
        $query  =$this->db->get('quote');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_category(){
        $query  =$this->db->get('category');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_quote_by_cat_id($id){
        $this->db->where('cat_id',$id);
        $query  =$this->db->get('quote');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_forum(){
        $query  =$this->db->get('forum');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function get_forum_by_id($id){
        $this->db->where('id',$id);
        $query  =$this->db->get('forum');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }
    public function get_forum_comment($forum_id){
        $this->db->where('forum_id',$forum_id);
        $query  =$this->db->get('forum_comment');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }
}

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
//    public function get_quote($current_page){
//        $this->db->limit($current_page);
//        $query  =$this->db->get('quote');
//        if($query->num_rows() > 0){
//            return $query->result_array();
//        }
//        return false;
//    }
    public function count_quote(){
        return $this->db->from('quote')->count_all_results();

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

    public function count_quote_by_cat_id($id){
        return  $this->db->from('quote')->where('cat_id',$id)->count_all_results();
    }
    public function get_quote_by_cat_id($id){
        $this->db->where('cat_id',$id);
        $query  =$this->db->get('quote');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function count_forum(){
        return $this->db->from('forum')->count_all_results();
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
    public function get_forum_comment($forum_id,$limit,$start){
        $this->db->limit($limit,$start);
        $this->db->where('forum_id',$forum_id);
        $query  =$this->db->get('forum_comment');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }

    public function forum_comment_counter($forum_id){
        $this->db->where('forum_id',$forum_id);
        $counter    = $this->db->from('forum_comment')->count_all_results();
        return "$counter";
    }

    public function count_forum_comment($forum_id){
        $this->db->where('forum_id',$forum_id);
        return  $this->db->from('forum_comment')->count_all_results();
    }


    public function count_forum_search($search_term){
        $this->db->like('title',$this->db->escape_like_str($search_term,'both'));
        $this->db->or_like('body',$this->db->escape_like_str($search_term,'both'));

        return $this->db->from('forum')->count_all_results();

    }

    public function time_stamp($session_time) {

        $time_difference = time() - $session_time ;
        $seconds = $time_difference ;
        $minutes = round($time_difference / 60 );
        $hours = round($time_difference / 3600 );
        $days = round($time_difference / 86400 );
        $weeks = round($time_difference / 604800 );
        $months = round($time_difference / 2419200 );
        $years = round($time_difference / 29030400 );

        if($seconds <= 60){
            return "$seconds seconds ago";
        }elseif($minutes <=60){
            if($minutes==1){
                return "one minute ago";
            }else{
                return "$minutes minutes ago";
            }
        }else if($hours <=24){
            if($hours==1){
                return "one hour ago";
            }else{
                return "$hours hours ago";
            }
        }else if($days <=7){
            if($days==1){
                return "one day ago";
            }else{
                return "$days days ago";
            }
        }else if($weeks <=4){
            if($weeks==1){
                return "one week ago";
            }else{
                return "$weeks weeks ago";
            }
        }else if($months <=12){
            if($months==1){
                return "one month ago";
            }else{
                return "$months months ago";
            }
        }else{
            if($years==1){
                return "one year ago";
            }else{
                return "$years years ago";
            }
        }
    }
}

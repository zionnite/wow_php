<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends My_Controller {
    public function __construct(){
        parent::__construct();
    }
	public function index(){
        $data['content'] ='';
        $data['content'] ='1';
		$this->load->view('welcome_message');
	}

	public function get_quote(){
        $msg    =array();
		$action   =$this->Action->get_quote();
        if(is_array($action)){
            foreach($action as $row){
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $image      = base_url().'quote_img/images/'.$row['image'];
                $author     =$row['author'];
                $author_img = base_url().'agent/images/'.$row['author_image'];
                $time       =$this->Action->time_stamp($row['time']);
                $type       =$row['type'];
                $is_background  =$row['is_background'];
                $background_link    =$row['background_link'];
                $cat_id         =$row['cat_id'];

                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success','status_msg'=>'Data fetched successfully',
                'is_background'=>$is_background,'background_link'=>$background_link,
                'cat_id'=>$cat_id);
            }
        }else{
            $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch data from server');
        }
        echo json_encode($msg);
	}

//	public function get_quote($current_page){
//        $msg    =array();
//		$action   =$this->Action->get_quote($current_page);
//        if(is_array($action)){
//            foreach($action as $row){
//                $id         =$row['id'];
//                $title      =$row['title'];
//                $desc       =$row['body'];
//                $image      =$row['image'];
//                $author     =$row['author'];
//                $author_img =$row['author_image'];
//                $time       =$this->Action->time_stamp($row['time']);
//                $type       =$row['type'];
//                $is_background  =$row['is_background'];
//                $background_link    =$row['background_link'];
//                $cat_id         =$row['cat_id'];
//
//                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success','status_msg'=>'Data fetched successfully',
//                'is_background'=>$is_background,'background_link'=>$background_link,
//                'cat_id'=>$cat_id);
//            }
//        }else{
//            $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch data from server');
//        }
//        echo json_encode($msg);
//	}
//

    public function get_quote_2($page =NULL){
        $msg    =array();
        $start = 0;

        $limit = 20;

        $total    =$this->Action->count_quote();
//
        if($page > $total) {
//            $page = $total;
            $msg[]  = array('status'=>'end 1');
            echo json_encode($msg);
        }else{

            $msg    =array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit,$start);
            $this->db->order_by('id','desc');
            $query  =$this->db->get('quote');
            foreach ($query->result_array() as $row) {
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $image      = base_url().'quote_img/images/'.$row['image'];
                $author     =$row['author'];
                $author_img = base_url().'agent/images/'.$row['author_image'];
                $time       =$this->Action->time_stamp($row['time']);
                $type       =$row['type'];
                $is_background  =$row['is_background'];
                $background_link    =$row['background_link'];
                $cat_id         =$row['cat_id'];

                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success','status_msg'=>'Data fetched successfully',
                'is_background'=>$is_background,'background_link'=>$background_link,
                'cat_id'=>$cat_id);
            }



            if(count($msg) != 0){
                echo json_encode($msg);
            }else{
                $msg[]  = array('status'=>'end 2');
                echo json_encode($msg);
            }
        }
    }


	public function get_quote_by_id($id){
        $msg    =array();
		$action   =$this->Action->get_quote_by_id($id);
        if(is_array($action)){
            foreach($action as $row){
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $image      = base_url().'quote_img/images/'.$row['image'];
                $author     =$row['author'];
                $author_img = base_url().'agent/images/'.$row['author_image'];
                $time       =$this->Action->time_stamp($row['time']);
                $type       =$row['type'];
                $is_background  =$row['is_background'];
                $background_link    =$row['background_link'];
                $cat_id         =$row['cat_id'];

                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success','status_msg'=>'Data fetched successfully',
                'is_background'=>$is_background,'background_link'=>$background_link,
                'cat_id'=>$cat_id);
            }
        }else{
            $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch data from server, reason be that Quote ID not found or Server is Busy!');
        }
        echo json_encode($msg);
	}


    public function get_category(){
        $msg    =array();
		$action   =$this->Action->get_category();
        if(is_array($action)){
            foreach($action as $row){
                $cat_id         =$row['cat_id'];
                $cat_name       =$row['cat_name'];


                $msg[]      =array('cat_id'=>$cat_id,'cat_name'=>$cat_name);
            }
        }else{
            $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch data from server');
        }
        echo json_encode($msg);
	}


	public function get_quote_by_cat_id($id){
        $msg    =array();
		$action   =$this->Action->get_quote_by_cat_id($id);
        if(is_array($action)){
            foreach($action as $row){
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $image      = base_url().'quote_img/images/'.$row['image'];
                $author     =$row['author'];
                $author_img = base_url().'agent/images/'.$row['author_image'];
                $time       =$this->Action->time_stamp($row['time']);
                $type       =$row['type'];
                $is_background  =$row['is_background'];
                $background_link    =$row['background_link'];
                $cat_id         =$row['cat_id'];

                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success','status_msg'=>'Data fetched successfully',
                'is_background'=>$is_background,'background_link'=>$background_link,
                'cat_id'=>$cat_id);
            }
        }else{
            $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch data from server, reason be that Quote ID not found or Server is Busy!');
        }
        echo json_encode($msg);
	}


	public function get_quote_by_cat_id_2($id=NULL,$page=NULL){
        $msg    =array();
        $start = 0;

        $limit = 20;

        $total    =$this->Action->count_quote_by_cat_id($id);
//
        if($page > $total) {
//            $page = $total;
            $msg[]  = array('status'=>'end');
            echo json_encode($msg);
        }else{

            $msg    =array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit,$start);
            $this->db->order_by('id','desc');
            $this->db->where('cat_id',$id);

            $query  =$this->db->get('quote');
            foreach ($query->result_array() as $row) {
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $image      = base_url().'quote_img/images/'.$row['image'];
                $author     =$row['author'];
                $author_img = base_url().'agent/images/'.$row['author_image'];
                $time       =$this->Action->time_stamp($row['time']);
                $type       =$row['type'];
                $is_background  =$row['is_background'];
                $background_link    =$row['background_link'];
                $cat_id         =$row['cat_id'];

                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success','status_msg'=>'Data fetched successfully',
                'is_background'=>$is_background,'background_link'=>$background_link,
                'cat_id'=>$cat_id);
            }



            if(count($msg) != 0){
                echo json_encode($msg);
            }else{
                $msg[]  = array('status'=>'end');
                echo json_encode($msg);
            }
        }
	}



	public function get_forum(){
        $msg    =array();
		$action   =$this->Action->get_forum();
        if(is_array($action)){
            foreach($action as $row){
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $date_entered   =$row['date_created'];
                $image      = base_url().'forum_post_img/'.$date_entered.'/'.$row['image'];
                $author     =$row['author'];
                $author_img = base_url().'/forum_post_img/'.$date_entered.'/'.$row['author_image'];
                $time       =$this->Action->time_stamp($row['time']);
                $type       =$row['type'];
                $comment_counter    =$this->Action->forum_comment_counter($id);

                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success',
                'status_msg'=>'Data fetched successfully','comment_counter'=>$comment_counter);
            }
        }else{
            $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch data from server');
        }
        echo json_encode($msg);
	}

    public function get_forum_2($page=NULL){
        $msg    =array();
        $start = 0;

        $limit = 20;

        $total    =$this->Action->count_forum();
//
        if($page > $total) {
//            $page = $total;
            $msg[]  = array('status'=>'end');
            echo json_encode($msg);
        }else{

            $msg    =array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit,$start);
            $this->db->order_by('id','desc');

            $query  =$this->db->get('forum');
            foreach ($query->result_array() as $row) {
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $date_entered   =$row['date_created'];
                $image      = base_url().'forum_post_img/'.$date_entered.'/'.$row['image'];
                $author     =$row['author'];
                $author_img = base_url().'/forum_post_img/'.$date_entered.'/'.$row['author_image'];
                $time       =$this->Action->time_stamp($row['time']);
                $type       =$row['type'];
                $comment_counter    =$this->Action->forum_comment_counter($id);


                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success',
                'status_msg'=>'Data fetched successfully','comment_counter'=>$comment_counter);
            }



            if(count($msg) != 0){
                echo json_encode($msg);
            }else{
                $msg[]  = array('status'=>'end');
                echo json_encode($msg);
            }
        }
    }

	public function get_forum_by_id($id){
        $msg    =array();
		$action   =$this->Action->get_forum_by_id($id);

        if(is_array($action)){
            foreach($action as $row){
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $date_entered   =$row['date_created'];
                $image      = base_url().'forum_post_img/'.$date_entered.'/'.$row['image'];
                $author     =$row['author'];
                $author_img = base_url().'/forum_post_img/'.$date_entered.'/'.$row['author_image'];
                $time       =$this->Action->time_stamp($row['time']);
                $type       =$row['type'];
                $comment_counter    =$this->Action->forum_comment_counter($id);


                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,
                'status'=>'success','status_msg'=>'Data fetched successfully','comment_counter'=>$comment_counter);
            }
        }else{
            $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch data from server');
        }
        echo json_encode($msg);
	}

	public function get_forum_comment_by_id($id){
        $msg    =array();
		$action   =$this->Action->get_forum_by_id($id);

        if(is_array($action)){
            foreach($action as $row){
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $date_entered   =$row['date_created'];
                $image      = base_url().'forum_post_img/'.$date_entered.'/'.$row['image'];
                $author     =$row['author'];
                $author_img = base_url().'/forum_post_img/'.$date_entered.'/'.$row['author_image'];
                $time       =$this->Action->time_stamp($row['time']);
                $type       =$row['type'];
                $comment_counter    =$this->Action->forum_comment_counter($id);



                $comment    =$this->Action->get_forum_comment($id);
                if(is_array($comment)){
                    foreach($comment as $row){
                        $com_id     =$row['id'];
                        $commenter  =$row['author'];
                        $comment_body   =$row['body'];
                        $comment_time   =$this->Action->time_stamp($row['time']);

                         $msg[]      =array('com_id'=>$com_id,'com_author'=>$commenter,'com_body'=>$comment_body,'com_time'=>$comment_time);
                    }
                }else{
                    $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch Comment from server');
                }
            }
        }else{
            $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch data from server');
        }
        echo json_encode($msg);
	}

    public function get_forum_comment_by_id_2($forum_id=NULL,$page=NULL){
        $msg    =array();
        $start = 0;

        $limit = 20;

        $total    =$this->Action->count_forum_comment($forum_id);
//
        if($page > $total) {
//            $page = $total;
            $msg[]  = array('status'=>'end 1');
            echo json_encode($msg);
        }else{

            $msg    =array();
            $start = ($page - 1) * $limit;


            $this->db->where('id',$forum_id);

            $query  =$this->db->get('forum');
            foreach ($query->result_array() as $row) {
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $date_entered   =$row['date_created'];
                $image      = base_url().'forum_post_img/'.$date_entered.'/'.$row['image'];
                $author     =$row['author'];
                $author_img = base_url().'/forum_post_img/'.$date_entered.'/'.$row['author_image'];
                $time       =$this->Action->time_stamp($row['time']);
                $type       =$row['type'];
                $comment_counter    =$this->Action->forum_comment_counter($id);



                $comment    =$this->Action->get_forum_comment($forum_id,$limit,$start);
                if(is_array($comment)){
                    foreach($comment as $row){
                        $com_id     =$row['id'];
                        $commenter  =$row['author'];
                        $comment_body   =$row['body'];
                        $comment_time   =$this->Action->time_stamp($row['time']);

                         $msg[]      =array('com_id'=>$com_id,'com_author'=>$commenter,'com_body'=>$comment_body,'com_time'=>$comment_time);
                    }
                }else{
                    $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch Comment from server');
                }
            }



            if(count($msg) != 0){
                echo json_encode($msg);
            }else{
                $msg[]  = array('status'=>'end 2');
                echo json_encode($msg);
            }
        }
    }

    public function make_comment(){
        $msg =array();
        $fname      =$this->input->post('name');
        $email      =$this->input->post('email');
        $comment    =$this->input->post('comment');
        $forum_id   =$this->input->post('forum_id');

        $data   =array('forum_id'=>$forum_id,'author'=>$fname,'email'=>$email,'body'=>$comment,'time'=>time());
        $this->db->set($data);
        $this->db->insert('forum_comment');
        if($this->db->affected_rows() > 0){
            $msg['status'] = true;

        }else{
            $msg['status'] = false;
        }
        echo json_encode($msg);

    }

    public function make_post(){
        $msg =array();

        $title      = $this->input->post('title');
        $body       = $this->input->post('body');
        $author     = $this->input->post('author');
        $email      = $this->input->post('email');

        $date       = date('Y-m-d');

        @mkdir('forum_post_img');
        @mkdir('forum_post_img/'.$date);
        $postImg        = $_FILES['post_image']['name'];
        $postImgPath    = 'forum_post_img/'.$date.'/'.$postImg;
        $postTmp        = $_FILES['post_image']['tmp_name'];
        move_uploaded_file($postTmp,$postImgPath);

        $profileImg        = $_FILES['profile_image']['name'];
        $profileImgPath    = 'forum_post_img/'.$date.'/'.$profileImg;
        $profileTmp        = $_FILES['profile_image']['tmp_name'];
        move_uploaded_file($profileTmp,$profileImgPath);


        $data   =array('title'=>$title,
                       'body'=>$body,
                       'author'=>$author,
                       'email'=>$email,
                       'time'=>time(),
                       'image'=>$postImg,
                       'author_image'=>$profileImg,
                       'date_created'=>$date,
                      );
        $this->db->set($data);
        $this->db->insert('forum');
        if($this->db->affected_rows() > 0){
            $msg['status'] = true;

        }else{
            $msg['status'] = false;
        }
        echo json_encode($msg);

    }


    public function search_forum(){
        $msg = array();
        $search_term    = $this->input->post('search_term');

        $this->db->like('title',$this->db->escape_like_str($search_term,'both'));
        $this->db->or_like('body',$this->db->escape_like_str($search_term,'both'));
        $query  = $this->db->get('forum');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $date_entered   =$row['date_created'];
                $image      = base_url().'forum_post_img/'.$date_entered.'/'.$row['image'];
                $author     =$row['author'];
                $author_img = base_url().'/forum_post_img/'.$date_entered.'/'.$row['author_image'];
                $time       =$this->Action->time_stamp($row['time']);
                $type       =$row['type'];
                $comment_counter    =$this->Action->forum_comment_counter($id);


                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success',
                'status_msg'=>'Data fetched successfully','comment_counter'=>$comment_counter);
            }

        }else{
            $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch data from server');
        }
        echo json_encode($msg);
    }

    public function search_forum_by_page($page=NULL){
        $search_term    = $this->input->post('search_term');
        $msg    =array();
        $start = 0;

        $limit = 1;

        $total    =$this->Action->count_forum_search($search_term);
//
        if($page > $total) {
//            $page = $total;
            $msg[]  = array('status'=>'end');
            echo json_encode($msg);
        }else{

            $msg    =array();
            $start = ($page - 1) * $limit;

            $this->db->limit($limit,$start);
            $this->db->order_by('id','desc');

            $this->db->like('title',$this->db->escape_like_str($search_term,'both'));
            $this->db->or_like('body',$this->db->escape_like_str($search_term,'both'));
            $query  = $this->db->get('forum');

            foreach ($query->result_array() as $row) {
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $date_entered   =$row['date_created'];
                $image      = base_url().'forum_post_img/'.$date_entered.'/'.$row['image'];
                $author     =$row['author'];
                $author_img = base_url().'/forum_post_img/'.$date_entered.'/'.$row['author_image'];
                $time       =$this->Action->time_stamp($row['time']);
                $type       =$row['type'];
                $comment_counter    =$this->Action->forum_comment_counter($id);


                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success',
                'status_msg'=>'Data fetched successfully','comment_counter'=>$comment_counter);
            }



            if(count($msg) != 0){
                echo json_encode($msg);
            }else{
                $msg[]  = array('status'=>'end');
                echo json_encode($msg);
            }
        }
    }



}

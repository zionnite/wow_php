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
                $image      =$row['image'];
                $author     =$row['author'];
                $author_img =$row['author_image'];
                $time       =$row['time'];
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

	public function get_quote_by_id($id){
        $msg    =array();
		$action   =$this->Action->get_quote_by_id($id);
        if(is_array($action)){
            foreach($action as $row){
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $image      =$row['image'];
                $author     =$row['author'];
                $author_img =$row['author_image'];
                $time       =$row['time'];
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
                $image      =$row['image'];
                $author     =$row['author'];
                $author_img =$row['author_image'];
                $time       =$row['time'];
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



	public function get_forum(){
        $msg    =array();
		$action   =$this->Action->get_forum();
        if(is_array($action)){
            foreach($action as $row){
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $image      =$row['image'];
                $author     =$row['author'];
                $author_img =$row['author_image'];
                $time       =$row['time'];
                $type       =$row['type'];
                $comment_counter    ='3';

                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success',
                'status_msg'=>'Data fetched successfully','comment_counter'=>$comment_counter);
            }
        }else{
            $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch data from server');
        }
        echo json_encode($msg);
	}

	public function get_forum_by_id($id){
        $msg    =array();
		$action   =$this->Action->get_forum_by_id($id);

        if(is_array($action)){
            foreach($action as $row){
                $id         =$row['id'];
                $title      =$row['title'];
                $desc       =$row['body'];
                $image      =$row['image'];
                $author     =$row['author'];
                $author_img =$row['author_image'];
                $time       =$row['time'];
                $type       =$row['type'];
                $comment_counter    ='3';

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
                $image      =$row['image'];
                $author     =$row['author'];
                $author_img =$row['author_image'];
                $time       =$row['time'];
                $type       =$row['type'];



                $comment    =$this->Action->get_forum_comment($id);
                if(is_array($comment)){
                    foreach($comment as $row){
                        $com_id     =$row['id'];
                        $commenter  =$row['author'];
                        $comment_body   =$row['body'];
                        $comment_time   =$row['time'];

                         $msg[]      =array('com_id'=>$com_id,'com_author'=>$commenter,'com_body'=>$comment_body,'com_time'=>$comment_time);
                    }
                }else{
                    $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch Comment from server');
                }

//                $msg      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success','status_msg'=>'Data fetched successfully','data'=>$data);


            }
        }else{
            $msg[]  =array('status'=>'fail','status_msg'=>'Couldn\'t fetch data from server');
        }
        echo json_encode($msg);
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
}

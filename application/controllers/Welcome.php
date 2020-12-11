<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_Controller {
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

                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success','status_msg'=>'Data fetched successfully');
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

                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success','status_msg'=>'Data fetched successfully');
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

                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success','status_msg'=>'Data fetched successfully');
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

                $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success','status_msg'=>'Data fetched successfully');
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

                         $msg[]      =array('id'=>$id,'title'=>$title,'desc'=>$desc,'image'=>$image,'author'=>$author,'author_image'=>$author_img,'time'=>$time,'type'=>$type,'status'=>'success','status_msg'=>'Data fetched successfully','com_id'=>$com_id,'com_author'=>$commenter,'com_body'=>$comment_body,'com_time'=>$comment_time);
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
}

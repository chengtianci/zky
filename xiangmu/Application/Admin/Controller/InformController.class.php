<?php
	namespace Admin\Controller;
	use Think\Controller;
	class InformController extends Controller{
		public function _initialize(){
          if(!isset($_SESSION['username']) || $_SESSION['username'] == '' || $_SESSION['isTeacher'] == 0){
            $this -> redirect("__APP__/Home/Index/main");
          }
        }
      	// 添加通知的操作
      	public function add(){
      		$this -> display();
      	}
      	//由原来的index改成news
		public function news(){
			$n = M("Information");
			$arr = $n -> order("id desc") -> select();
			$arr['content'] = htmlspecialchars_decode($arr['content']);
			$this -> assign('data',$arr);
			$this -> display();
		}
		public function do_show(){
			$n = M('Information');
			$n -> Create();  //创建数据对象
			$n -> date = date("Y-m-d");
			$n -> userid = $_SESSION['id'];
			if($_POST['title'] == "" || $_POST['content'] == ""){
				$id = 0;
			}else{
				$id  = $n -> add(); //写入数据库，并且返回result的值进行判断
			}
			if($id){
	            $data = array(
	                'code'=>'0',
	                'id'=>$id
	            );
	            echo json_encode($data);
        	}
		}
		public function showitems(){
			$n = M('Information');
			$where = $_GET['id'];
			$arr = $n -> where("id = $where") -> find();
			$arr['content'] = htmlspecialchars_decode($arr['content']);
			$this -> assign("data",$arr);
			$this -> display();
		}
		public function do_delete(){
			$where = $_GET['id'];
			$n = M("Information");
			$result = $n -> where("id = $where") -> delete();
			if($result){
				$this -> redirect('Inform/news','','0','页面跳转中');
			}else{
				$this -> error("删除失败");
			}
		}
		public function update() {
			$where = $_GET['id'];
			$n = M('Information');
			$arr = $n -> where("id = $where") -> find();
			$arr['content'] = htmlspecialchars_decode($arr['content']);
			$this -> assign('data',$arr);
			$this -> display();
		}
		public function do_update() {
			$where = $_POST['id'];
			$n = M('Information');
			$n -> date = date("Y-m-d");
			$n -> title = $_POST['title'];
			$n -> content = $_POST['content'];
			$result = $n -> where("id = $where") -> save();
			if($result){
	            $data = array(
	                'code'=>'1',
	                'where'=> $where,
	            );
	            echo json_encode($data);
        	}
		}
	}
?>
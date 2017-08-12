<?php
	namespace Admin\Controller;
	use Think\Controller;
	class EquipmentController extends Controller{
		public function _initialize(){
          if(!isset($_SESSION['username']) || $_SESSION['username'] == '' || $_SESSION['isTeacher'] == 0){
            $this -> redirect("__APP__/Home/Index/main");
          }
        }
		public function equipment(){
			$n = D('Equipment');
			$count = $n -> count();
			$Page = new\Think\Page($count,1);// 每页显示的记录数
        	$Page->setConfig('header','个文件');
        	$Page->setConfig('next','下一页');
        	$Page->setConfig('prev','上一页');
      	  	$show = $Page -> show();
      		$arr = $n -> limit($Page->firstRow.','.$Page->listRows) -> order("id") -> relation(true) -> where($data) -> select();
        	$this -> assign("data",$arr);
        	$this -> assign('show',$show);

        	$m = M("Class");
        	$result = $m -> select();
        	$this -> assign("classtype", $result);

        	$this -> display();
		}
		public function do_add(){
			$n = M('Equipment');
			$n -> create();
			//上传文件操作
			$upload = new\Think\Upload();//实例化上传类
			$upload -> maxSize = 10485760;//设置附件的大小
			$upload-> exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload -> rootPath = './uploads/';//设置上传根目录
			$upload -> savePath = './Equipment/'; //设置文件上传子目录
			$upload->saveName = 'time';
			$info = $upload -> upload();
			if(!$info){
				//上传错误提示信息
				$this -> error($upload->getError());
			}
			$n -> imagicname = $info['file']['savename'];//记录文件的上传路径
			$n -> imagicaddress =$info['file']['savepath'].$info['file']['savename'];
			$last = $n -> add();
			if($last){
				$this -> redirect('Equipment/equipment','','0','上传成功'); // 进行重定向操作，返回到主页
			}
		}
		public function delete(){
			$n = M('Equipment');
			$m = M('Equipmentmanage');
			$do = $_GET['id'];
			$count = $n -> where("id = $do") -> getField("count");
			if(!$count) {
				$result = $n -> where("id = $do") -> delete();
				if($result){
					$this -> success("删除成功");
				}else{
					$this -> error("删除失败");
				}
			} else {
				$result = $n -> where("id = $do") -> delete();
				if($result){
					$resultq1 = $m -> where("equipmentid = $do") -> delete();
					if($resultq1){
						$this -> success("删除成功");
					}else{
						$this -> error("删除失败");
					}
				} else {
					$this -> error("删除失败");
				}
			}
		}
		public function update(){
			$do = $_GET['id'];
			$n = D('Equipment');
			$result = $n -> relation(true) -> where("id = $do") -> find();

			$m = M("Class");
        	$result1 = $m -> select();

        	$this -> assign("classtype", $result1);

			$this -> assign("vo",$result);
			$this -> display();
		}
		public function do_update(){
			$n = M('Equipment');
			$do = $_POST['id'];

			//上传文件操作
			$upload = new\Think\Upload();//实例化上传类
			$upload -> maxSize = 10485760;//设置附件的大小
			$upload-> exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload -> rootPath = './uploads/';//设置上传根目录
			$upload -> savePath = './Equipment/'; //设置文件上传子目录
			$upload->saveName = 'time';
			$info = $upload -> upload();

			if(!$info){
				//上传错误提示信息
				//$this -> error($upload->getError());
				$_POST['imagicname'] = $n -> where("id = $do") -> getField('imagicname');//记录文件的上传路径
				$_POST['imagicaddress'] =$n -> where("id = $do") -> getField('imagicaddress');

			} else {

				$_POST['imagicname'] = $info['file']['savename'];//记录文件的上传路径
				$_POST['imagicaddress'] =$info['file']['savepath'].$info['file']['savename'];
		
			}

			//$_POST['eblong'] = date("Y-m-d H:i:s");
			$result = $n -> where("id = $do") -> data($_POST) -> save();

			$this -> redirect("Equipment/equipment");
		}
		/*
		 * 跳转到添加仪器设备管理信息界面
		 */
		public function add_management(){
			$this -> assign("data",$_GET['id']);
			$this -> display();
		}
		/*
		 * 添加仪器设备管理信息具体实现方法
		 */
		public function do_addmanagement(){
			$m = M("Equipment");
			$n = M("Equipmentmanage");
			$where = $_GET['id'];
			if($_POST['title'] == "" || $_POST['content'] == ""){
				$id = 0;
			}else{
				$count = $m -> where("id = $where") -> getField("count");
				$m -> where("id = $where") -> count = $count + 1;
				$n -> create();
				$n -> equipmentid = $where;
				$result = $n -> add();
				if($result){
					$id = $m -> save();
				}else{
					$id = 0;
				}
			}
			if($id){
	            $data = array(
	                'code'=>'0',
	                'id'=>$id
	            );
	            echo json_encode($data);
        	}
		}
		/*
		 * 添加仪器设备
		 */
		public function add(){
			$this -> display();
		}
		/*
		 * 查询仪器设备
		 */
		public function search(){
			$n = D("Equipment");
			$search = $_POST['search1'];
			$condition = $_POST['condition'];
			if($condition == '1'){
				// 进行模糊查询，可以包含所有的选项
				$data['ecname'] = array('like','%'.$search.'%');
				$data['eid'] = $search;
				$data['_logic'] = 'or';
			}else if($condition == '2'){
				$data['ecname'] = array('like','%'.$search.'%');
			}else{
				$data['eid'] = $search;
			}
			$count = $n -> where($data) -> count();
			$arr = $n -> where($data) -> select();
			$this -> assign("data",$arr);
        	$this -> assign("count",$count);
        	$this -> display();
		}
		/*
		 * 删除仪器设备介绍方法
		 */
		public function deleteManagement() {
			$where1 = I('get.id');
			$where2 = I('get.eid');
			$n = M('Equipment');
			$query1 = "UPDATE tp_equipment SET count = count - 1 WHERE id = ".$where1."";
			$result1 = $n -> execute($query1);
			$m = M('Equipmentmanage');
			$query2 = "DELETE FROM tp_equipmentmanage WHERE id = ".$where2."";
			$result2 = $m -> execute($query2);
			if($result1 && $result2) {
				$this -> success("删除成功！");
			} else {
				$this -> error("删除失败！");
			}
		}
		/*
		 * 修改仪器设备介绍方法
		 */
		public function updateManagement() {
			$where = I("get.id");
			$n = M("Equipmentmanage");
			$result = $n -> where("id = $where") -> select();
			$result[0]['content'] = htmlspecialchars_decode($result[0]['content']);
			$this -> assign("data", $result[0]);
			$this -> display();
		}
		public function doUpdateManagement() {
			$where = I("get.id");
			$n = M('Equipmentmanage');
			$result = $n -> where("id = $where") -> data($_POST) -> save();
			if($result){
	        	$data = array(
	               	'result'=>$result
	            );
	            echo json_encode($data);
        	}
		}

	}
?>

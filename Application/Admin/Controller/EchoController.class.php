<?php
namespace Admin\Controller;
class EchoController extends CommonController
{
	public function index(){
		$model = M();
		$sql = "select articleid,author,title from pe_article  where count != 0 order by articleid";
		$data = $model -> query($sql);
		$sq = "select zyst,username from pe_stuuser";
		$num = $model -> query($sq);
		foreach($data as $key => $value){
			foreach($num as $k => $val){
				
				if($value['articleid'] == $val['zyst']){
					
					$str .= $val['username'];
					$str .=".";
				}
				$data[$key]['stu'] = $str;
			}$str = "";	
		}
		$this -> assign('data',$data);
		$this -> display();
	}
}
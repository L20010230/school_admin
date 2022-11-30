<?php 
/*
 module:		菜单配置模型
 create_time:	2022-11-30 10:30:41
 author:		
 contact:		
*/

namespace app\api\model;
use think\Model;
use think\model\concern\SoftDelete;

class MemberMenu extends Model {


	use SoftDelete;

	protected $deleteTime = 'delete_time';

	protected $pk = 'member_menu_id';

 	protected $name = 'member_menu';
 

}


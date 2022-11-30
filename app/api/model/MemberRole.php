<?php 
/*
 module:		角色管理模型
 create_time:	2022-11-29 13:41:15
 author:		
 contact:		
*/

namespace app\api\model;
use think\Model;
use think\model\concern\SoftDelete;

class MemberRole extends Model {


	use SoftDelete;

	protected $deleteTime = 'delete_time';

	protected $pk = 'member_role_id';

 	protected $name = 'member_role';
 

}


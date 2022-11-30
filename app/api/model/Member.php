<?php 
/*
 module:		账号管理模型
 create_time:	2022-11-29 14:57:04
 author:		
 contact:		
*/

namespace app\api\model;
use think\Model;
use think\model\concern\SoftDelete;

class Member extends Model {


	use SoftDelete;

	protected $deleteTime = 'delete_time';

	protected $pk = 'member_id';

 	protected $name = 'member';
 

}


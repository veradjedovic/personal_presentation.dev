<?php 
require_once 'config/index.php';

use app\models\Skill as User;

$user = new User();
$u = $user->GetSkillsVisible();


dd($u);
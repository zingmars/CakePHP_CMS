<?php
/**
 * Created by PhpStorm.
 * User: zingmars
 * Date: 27.10.2015
 * Time: 23:47
 */
namespace App\Controller\Component;

use Cake\Controller\Component;

class PrivilegeComponent extends Component
{
    const AdminAccess = 1;
    const PostEdit = 1 << 2;
}
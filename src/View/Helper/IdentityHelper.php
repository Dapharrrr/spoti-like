<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

class IdentityHelper extends Helper
{
    public function get($field)
    {
        $identity = $this->_View->getRequest()->getAttribute('identity');
        if ($identity) {
            return $identity->get($field);
        }
        return null;
    }
}

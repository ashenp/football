<?php
/**
 * @Author: anchen
 * @Date:   2015-12-01 17:14:43
 * @Last Modified by:   anchen
 * @Last Modified time: 2015-12-01 17:46:23
 */

class Controller_Mgr_Message extends Controller {
    public function message() {
        $page = isset($_REQUEST['page']) ?  $_REQUEST['page'] : 1;
        $pagesize = isset($_REQUEST['pagesize']) ? $_REQUEST['pagesize'] : 20;
        $messages = CoreApi_Message::instance()->pageMessage(array(), $page, $pagesize);
        $count = CoreApi_Message::instance()->countMessage(array());
        $smartyParams = array();
        $smartyParams['page'] = $page;
        $smartyParams['pagesize'] = $pagesize;
        $smartyParams['count'] = $count;
        $smartyParams['messages'] = $messages;
        return $this->display('messages', $smartyParams);
    }
}
<?php
class Core {

    public function run() {
        $url = substr($_SERVER['PHP_SELF'], 10);

        if (!empty($url)) {

            $url = explode('/', $url);
            //array_shift($url);
            $currentController = $url[0] . 'Controller';
            if (isset($url[1])) {
                $currentAction = $url[1];
            } else {
                $currentAction = 'index';
            }
        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
        }
        require_once 'core/controller.php';

        $c = new $currentController();
        $c->$currentAction();
    }

}

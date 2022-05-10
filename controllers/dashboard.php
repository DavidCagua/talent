
<?php

class Dashboard extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();
        error_log("Dashboard::constructor() ");
    }

     function render(){
        error_log("Dashboard::RENDER() ");

        $this->view->render('dashboard/index', [
            'user'                 => $this->user,
        ]);
    }
    
    //obtiene la lista de expenses y $n tiene el número de expenses por transacción

}

?>
<?php

class Controller_admin extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }
    public function action_dashboard_admin()
    {
        $m=Admin::get_model();
        $data=['nb_ventes_total'=>$m->get_nb_ventes_total_jour(),
               'ca_jour'=>$m->get_ca_jour(),
               'ventes'=>$m->get_ventes_jour_all()];
        $this->render("dashboard_admin", $data);
    }

    
    

    

    

    
}
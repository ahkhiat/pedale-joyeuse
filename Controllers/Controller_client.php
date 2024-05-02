<?php

class Controller_client extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }
    public function action_home()
    {
        $this->render('home');
    }


    public function action_all_clients()
    {
        $m=Client::get_model();
        $data=['clients'=>$m->get_all_clients()];
        $this->render("all_clients",$data);
    }
    
    public function action_client_add()
    {
        $this->render("client_add");
    }

    public function action_client_add_request()
    {
        $m=Client::get_model();
        ['client'=>$m->set_client_add()];
        $this->render("client_add");
    }
    
    
   




}
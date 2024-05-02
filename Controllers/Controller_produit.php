<?php

class Controller_produit extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }

    public function action_all_produits()
    {
        $m=Produit::get_model();
        $data=['produits'=>$m->get_all_produits()];
        $this->render("all_produits",$data);
    }
    public function action_all_produits_json()
    {
        $m=Produit::get_model();
        $m->get_all_produits_json();
    }

}

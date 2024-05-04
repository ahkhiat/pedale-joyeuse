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
    public function action_produit_add()
    {
        $m=Produit::get_model();
        $data=['tva'=>$m->get_tva()];
        $this->render("produit_add", $data);
    }
    public function action_produit_add_request()
    {
        $m=Produit::get_model();
        $m->set_produit_add_request();
        $data=['message'=> 'Le produit a bien été ajouté !'];
        $this->render("produit_result", $data);
    }
    public function action_produit_update()
    {
        $m=Produit::get_model();
        $data=['produit'=>$m->get_produit_show(),
               'tva'=>$m->get_tva()];
        $this->render("produit_update", $data);
    }
    public function action_produit_update_request()
    {
        $m=Produit::get_model();
        $data=['produit'=>$m->set_produit_update_request(),
               'message'=> 'Le produit a bien été modifié !'];
        $this->render("produit_result", $data);
    }

}

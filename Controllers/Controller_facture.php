<?php

class Controller_facture extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }
    public function action_home()
    {
        $this->render('home');
    }


    public function action_all_factures()
    {
        $m=Facture::get_model();
        $data=['factures'=>$m->get_all_factures()];
        $this->render("all_factures",$data);
    }
    
    public function action_facture_add()
    {
        $mc=Client::get_model();
        $mp=User::get_model();
        $mpr=Produit::get_model();

        $data=['clients'=>$mc->get_all_clients(),
                'users'=>$mp->get_all_users(),
                'produits'=> $mpr->get_all_produits_json()];
        $this->render("facture_add", $data);
    }

    public function action_facture_add_request()
    {
        $m=Facture::get_model();
        $m->set_facture_add_request();
        $this->render("all_factures");
    }
    
    
   




}
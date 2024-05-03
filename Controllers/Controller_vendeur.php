<?php

class Controller_vendeur extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }

    public function action_ventes_mois()
    {
        $m=Facture::get_model();
        $data=['ventes'=>$m->get_ventes_mois(),
                'titre'=>'Ventes pour le mois en cours'];
        $this->render("ventes",$data);
    }

}
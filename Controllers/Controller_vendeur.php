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

    public function action_dashboard()
    {
        $m=Facture::get_model();
        $data=['ventes'=>$m->get_ventes_mois(),
               'nbr_ventes'=>$m->get_ventes_mois_nombre(),
               'ytd_ventes'=>$m->get_ventes_ytd_nombre(),
                'titre'=>'Etat des ventes de :'];
        $this->render("dashboard_vendeur",$data);
    }
    public function action_ventes_mois()
    {
        $m=Facture::get_model();
        $data=['ventes'=>$m->get_ventes_mois(),
               'nbr_ventes'=>$m->get_ventes_mois_nombre(),
                'totaux'=>$m->get_ventes_mois_total(),
                'titre'=>'Ventes du mois de: ' .date('F') ];
        $this->render("ventes",$data);
    }
    public function action_ventes_ytd()
    {
        $m=Facture::get_model();
        $data=['ventes'=>$m->get_ventes_ytd(),
               'nbr_ventes'=>$m->get_ventes_ytd_nombre(),
                'totaux'=>$m->get_ventes_ytd_total(),
                'titre'=>'Ventes cumulées depuis le 1er janvier'];
        $this->render("ventes",$data);
    }



}
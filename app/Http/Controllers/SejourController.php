<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Request;
use App\DAO\ServiceSejour;
use App\DAO\ServiceClient;
use App\DAO\ServiceEmplacement;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Session;

class SejourController extends Controller {

    // On recherche tous les séjours
    public function listeSejours() {
        try {
            $unSejour = new ServiceSejour();
            $mesSejours = $unSejour->getListeSejours();
            return view('vues/listerSejours', compact('mesSejours'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        }
    }

    public function ajoutSejour() {
        if (Session::get('role') == "admin") {
            try {
                $unClient = new ServiceClient();
                $mesClients = $unClient->getListeClients();
                $unEmp = new ServiceEmplacement();
                $mesEmplacements = $unEmp->getListeEmplacements();
                return view('vues/ajouterSejour',
                      compact('mesClients', 'mesEmplacements'));
            } catch (MonException $e) {
                $erreur = $e->getMessage();
                return view('Error', compact('erreur'));
            } catch (Exception $ex) {
                $erreur = $e->getMessage();
                return view('Error', compact('erreur'));
            }
        } else {
            $erreur = "Vous n'avez pas l'autorisation d'ajouter";
            return view('Error', compact('erreur'));
        }
    }

    public function postAjoutSejour() {
        try {
            $NumCli = Request::input('cbClient');
            $NumEmpl = Request::input('cbEmplacement');
            $DatedebSej = Request::input('DatedebSej');
            $DateFinSej = Request::input('DateFinSej');
            $NbPersonnes = Request::input('NbPersonnes');
            $unSejour = new ServiceSejour();
            $unSejour->ajoutSejour($NumCli, $NumEmpl, $DatedebSej, $DateFinSej, $NbPersonnes);
            return view('home');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        }
    }

    public function modification($id) {

        try {
            $unSejour = new ServiceSejour();
            $unS = $unSejour->getById($id);

            $unClient = new ServiceClient();
            $mesClients = $unClient->getListeClients();
            $unEmp = new ServiceEmplacement();
            $mesEmplacements = $unEmp->getListeEmplacements();

            return view('vues/modifierSejour', compact('unS', 'mesClients', 'unEmp', 'mesEmplacements'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        }
    }

    public function postmodifierSejour($NumCli) {

        try {

            // Récupération des données
            $NumEmpl = Request::input('cbEmplacement');
            $DatedebSej = Request::input('DatedebSej');
            $DateFinSej = Request::input('DateFinSej');
            $NbPersonnes = Request::input('NbPersonnes');
            $unSejour = new ServiceSejour();

            $unSejour->modifSejour($NumCli, $NumEmpl, $DatedebSej, $DateFinSej, $NbPersonnes);
            return view('home');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        }
    }



     public function suppression($id) {

        try {
            $unSejour = new ServiceSejour();
             $unSejour->supprimeSejour($id);
               return view('home');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        }
    }

    public function rechercheSejour($annee, $mois) {
        try {
            // Récupération des données
            $DatedebSej = Request::input('DatedebSej');
            $DateFinSej = Request::input('DateFinSej');

            $unSejour = new ServiceSejour();
            $mesSejours = $unSejour->recherchesejour($annee, $mois);

            return view('listerSejours', compact('mesSejours'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $ex->getMessage(); // fix variable name here
            return view('Error', compact('erreur'));
        }
    }
}

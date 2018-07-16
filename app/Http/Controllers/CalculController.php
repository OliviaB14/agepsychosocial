<?php

namespace AgePsychoSocial\Http\Controllers;

use Illuminate\Http\Request;

class CalculController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    var $coeff_dilat = 0.8;
    #Sert à moduler la différence entre l'âge réel et l'APS en fonction du score


    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('calcul');
    }

    public function resultat_f1($x){
        #fonction de conversion du résultat RLRI16 en score de [-1;1]

        $tx1 = [0,6,11,13,16];
        $ty1 = [-1,0,-0.8,0.0,0.5,1,0];

        if ($x == $tx1[0]){
            return $ty1[0];
        }
        for($i = 0; $i < sizeof($tx1); $i++){
            if ($x <= $tx1[$i]){
                $a = ($ty1[$i]-$ty1[$i-1])/($tx1[$i]-$tx1[$i-1]);
                $b = $ty1[$i]-$a*$tx1[$i];
                return $a*$x + $b;
            }
        }
    }

    public function resultat_f2($x)
    {
        #fonction de conversion du résultat mémoire des chiffres  en score de [-1;1]
        $Tx2 = [0,3,5,9];
        $Ty2 = [-1.0,0.0,0.8,1.0];
  	    if ($x == $Tx2[0]){
            return $Ty2[0];
        }
        for ($i = 0; $i < sizeof($Tx2); $i++){
            if ($x <= $Tx2[$i]){
                $a = ($Ty2[$i]-$Ty2[$i-1])/($Tx2[$i]-$Tx2[$i-1]);
                $b = $Ty2[$i]-$a*$Tx2[$i];
                return $a*$x + $b;
            }
        }
    }

    public function resultat_f3($x)
    {
        #fonction de conversion du résultat WCST en score de [-1;1]
        $Tx3 = [0,2,4,6];
  	  $Ty3 = [-1.0,0.0,0.5,1.0];
  	  if ($x == $Tx3[0]){
  	      return $Ty3[0];
  	  }

  	  for($i = 0; $i < sizeof($Tx3); $i++){
          if($x <= $Tx3[$i]){
              $a = ($Ty3[$i]-$Ty3[$i-1])/($Tx3[$i]-$Tx3[$i-1]);
          $b = $Ty3[$i]-$a*$Tx3[$i];
  			          return $a*$x + $b;
              }

      }



    }


public function resultat_f4($x){
    #fonction de conversion du résultat au test des cloches  en score de [-1;1]
    $Tx4 = [0,20,25,35];
    $Ty4 = [-1.0,-0.5,0.0,1.0];
    if($x == $Tx4[0]){
        return $Ty4[0];
    }
    for($i = 0; $i < sizeof($Tx4); $i++){
        if($x <= $Tx4[$i]){
            $a = ($Ty4[$i]-$Ty4[$i-1])/($Tx4[$i]-$Tx4[$i-1]);
            $b = $Ty4[$i]-$a*$Tx4[$i];
            return $a*$x + $b;
        }
    }
}



public function resultat_f5($x){
    #fonction de conversion du résultat test des faux pas en score de [-1;1]

    $Tx5 = [0,70,80,90,120];
    $Ty5 = [-1.0,-0.8,0.0,0.5,1.0];
  	  if ($x == $Tx5[0]){
  	      return $Ty5[0];
      }

  	  for($i = 0; $i < sizeof($Ty5); $i++){
          if ($x <= $Tx5[$i]){
              $a = ($Ty5[$i]-$Ty5[$i-1])/($Tx5[$i]-$Tx5[$i-1]);
              $b = $Ty5[$i]-$a*$Tx5[$i];
              return $a*$x + $b;
          }
      }

}







public function calcul_APS(Request $request){
        $Ar = $request->age_reel;
        $s1 = $request->resultat_f1;
        $s2 = $request->resultat_f2;
        $s3 = $request->resultat_f3;
        $s4 = $request->resultat_f4;
        $s5 = $request->resultat_f5;

    $s = ($this->resultat_f1($s1)+$this->resultat_f2($s2)+$this->resultat_f3($s3)+$this->resultat_f4($s4)+$this->resultat_f5($s5))/5;
    $res = 0;
    if($s > 0){
        $res = $Ar + (18-$Ar)*($s)*$this->coeff_dilat;
        $res = round($res, 2);
        redirect('calcul', ['$res' => $res]);
    }
    $res = $Ar + 2*$Ar*(-$s)**$this->coeff_dilat;
    $res = round($res, 2);
    return view('calcul', ['res' => $res, 'age_reel' => $Ar]);
    }



}

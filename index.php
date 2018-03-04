<?php
require 'class/class.crud.php';
require 'config/db.php';

$crud = new Crud($pdo);

if(isset($_POST['zapisz_tytul'])){
	$tytul = $_POST['tytul'];
	$crud->wstawTytul($tytul);
}
if(isset($_POST['zapisz_punkt'])){
	$tid = $_POST['tid'];
	$punkt = $_POST['punkt'];
	$crud->wstawPunkt($tid, $punkt);
}
if(isset($_POST['zapisz_podpunkt'])){
	$pid = $_POST['pid'];
	$podpunkt = $_POST['podpunkt'];
	$crud->wstawPodpunkt($pid, $podpunkt);
}

$form_tytul = $crud->FormularzTytul();
$kolumna = $crud->liczbaKolumn();
$rzad = $crud->pobierzDane();
$form_punkt = $crud->FormularzPunkt();
$form_punkt_close = $crud->FormularzPunktClose();
$form_podpunkt = $crud->FormularzPodpunkt();
$form_podpunkt_close = $crud->FormularzPodpunktClose();

include 'naglowek.php';
echo $form_tytul;

echo '<ol class="poziom1">';
foreach($rzad as $klucz1=>$tytul_lista)
{
	if($kolumna == 1)  {
		echo '<div class="kolumna" id="kolumna1">';
			echo '<div class="naglowek">';
				echo '<li>'.$tytul_lista["tytul"].'
				<a href="usun.php?txid='.$klucz1.'" class="btn btn-xs btn-danger deletet">x</a>';
			echo '</div>';

			echo $form_punkt;
			echo '<input type="hidden" name="tid" value="'.$klucz1.'"/>';	
			echo $form_punkt_close;

			echo '<div class="tresc">';
			echo '<ol class="poziom2" id="'.$klucz1.'">';
			foreach ($tytul_lista['punkty'] as $klucz2=>$punkt_lista)
			{
				if(isset($punkt_lista['punkt']))
				{
					echo '<li class="poziomli2" id="'.$klucz2.'">'.$punkt_lista['punkt'].'
					<a href="usun.php?pxid='.$klucz2.'" class="btn btn-xs btn-basic deletep">X</a>';
				
					echo $form_podpunkt;	
					echo '<input type="hidden" name="pid" value="'.$klucz2.'"/>';
					echo $form_podpunkt_close;
					
					echo '<ol class="poziom3">';
					foreach($punkt_lista['podpunkty'] as $klucz3=>$podpunkt_lista)
					{
						if(isset($podpunkt_lista['podpunkt']))
							echo '<li class="poziomli3">'.$podpunkt_lista['podpunkt'].'
							<a href="usun.php?poxid='.$klucz3.'" class="btn btn-xs btn-basic deletepod">x</a></li>';
					}
					echo '</ol></li>';
				}
			}
			echo '</ol></div></li></div>';
	} //end one
	elseif ($kolumna == 2) {
		echo '<div class="kolumna" id="kolumna2">';
			echo '<div class="naglowek">';
				echo '<li>'.$tytul_lista["tytul"].'
				<a href="usun.php?txid='.$klucz1.'" class="btn btn-xs btn-danger deletet">x</a>';
			echo '</div>';

			echo $form_punkt;
			echo '<input type="hidden" name="tid" value="'.$klucz1.'"/>';	
			echo $form_punkt_close;

			echo '<div class="tresc">';
			echo '<ol class="poziom2" id="'.$klucz1.'">';
			foreach ($tytul_lista['punkty'] as $klucz2=>$punkt_lista)
			{
				if(isset($punkt_lista['punkt']))
				{
					echo '<li class="poziomli2" id="'.$klucz2.'">'.$punkt_lista['punkt'].'
					<a href="usun.php?pxid='.$klucz2.'" class="btn btn-xs btn-basic deletep">X</a>';
				
					echo $form_podpunkt;	
					echo '<input type="hidden" name="pid" value="'.$klucz2.'"/>';
					echo $form_podpunkt_close;
					
					echo '<ol class="poziom3">';
					foreach($punkt_lista['podpunkty'] as $klucz3=>$podpunkt_lista)
					{
						if(isset($podpunkt_lista['podpunkt']))
							echo '<li class="poziomli3">'.$podpunkt_lista['podpunkt'].'
							<a href="usun.php?poxid='.$klucz3.'" class="btn btn-xs btn-basic deletepod">x</a></li>';
					}
					echo '</ol></li>';
				}
			}
			echo '</ol></div></li></div>';
	} //koniec wersja 2 rzędy
	elseif ($kolumna == 3) {
		echo '<div class="kolumna" id="kolumna3">';
			echo '<div class="naglowek">';
				echo '<li>'.$tytul_lista["tytul"].'
				<a href="usun.php?txid='.$klucz1.'" class="btn btn-xs btn-danger deletet">x</a>';
			echo '</div>';

			echo $form_punkt;
			echo '<input type="hidden" name="tid" value="'.$klucz1.'"/>';	
			echo $form_punkt_close;

			echo '<div class="tresc">';
			echo '<ol class="poziom2" id="'.$klucz1.'">';
			foreach ($tytul_lista['punkty'] as $klucz2=>$punkt_lista)
			{
				if(isset($punkt_lista['punkt']))
				{
					echo '<li class="poziomli2" id="'.$klucz2.'">'.$punkt_lista['punkt'].'
					<a href="usun.php?pxid='.$klucz2.'" class="btn btn-xs btn-basic deletep">X</a>';
				
					echo $form_podpunkt;	
					echo '<input type="hidden" name="pid" value="'.$klucz2.'"/>';
					echo $form_podpunkt_close;
					
					echo '<ol class="poziom3">';
					foreach($punkt_lista['podpunkty'] as $klucz3=>$podpunkt_lista)
					{
						if(isset($podpunkt_lista['podpunkt']))
							echo '<li class="poziomli3">'.$podpunkt_lista['podpunkt'].'
							<a href="usun.php?poxid='.$klucz3.'" class="btn btn-xs btn-basic deletepod">x</a></li>';
					}
					echo '</ol></li>';
				}
			}
			echo '</ol></div></li></div>';
	} //koniec wersja 3 kolumny
	elseif ($kolumna == 4) {
		echo '<div class="kolumna" id="kolumna4">';
			echo '<div class="naglowek">';
				echo '<li>'.$tytul_lista["tytul"];
				echo '<a href="usun.php?txid='.$klucz1.'" class="btn btn-xs btn-danger deletet">x</a>';
			echo '</div>';

			echo $form_punkt;
			echo '<input type="hidden" name="tid" value="'.$klucz1.'"/>';	
			echo $form_punkt_close;

			echo '<div class="tresc">';
			echo '<ol class="poziom2" id="'.$klucz1.'">';
			foreach ($tytul_lista['punkty'] as $klucz2=>$punkt_lista)
			{
				if(isset($punkt_lista['punkt']))
				{
					echo '<li class="poziomli2" id="'.$klucz2.'">'.$punkt_lista['punkt'].'
					<a href="usun.php?pxid='.$klucz2.'" class="btn btn-xs btn-basic deletep">X</a>';
				
					echo $form_podpunkt;	
					echo '<input type="hidden" name="pid" value="'.$klucz2.'"/>';
					echo $form_podpunkt_close;
					
					echo '<ol class="poziom3">';
					foreach($punkt_lista['podpunkty'] as $klucz3=>$podpunkt_lista)
					{
						if(isset($podpunkt_lista['podpunkt']))
							echo '<li class="poziomli3">'.$podpunkt_lista['podpunkt'].'
							<a href="usun.php?poxid='.$klucz3.'" class="btn btn-xs btn-basic deletepod">x</a></li>';
					}
					echo '</ol></li>';
				}
			}
			echo '</ol></div></li></div>';
	} //koniec wersja 4 kolumny
	else  {
		echo '<div class="kolumna" id="kolumna5">';
			echo '<div class="naglowek">';
				echo '<li>'.$tytul_lista["tytul"].'
				<a href="usun.php?txid='.$klucz1.'" class="btn btn-xs btn-danger deletet">x</a>';
			echo '</div>';

			echo $form_punkt;
			echo '<input type="hidden" name="tid" value="'.$klucz1.'"/>';	
			echo $form_punkt_close;

			echo '<div class="tresc">';
			echo '<ol class="poziom2" id="'.$klucz1.'">';
			foreach ($tytul_lista['punkty'] as $klucz2=>$punkt_lista)
			{
				if(isset($punkt_lista['punkt']))
				{
					echo '<li class="poziomli2" id="'.$klucz2.'">'.$punkt_lista['punkt'].'
					<a href="usun.php?pxid='.$klucz2.'" class="btn btn-xs btn-basic deletep">X</a>';
				
					echo $form_podpunkt;	
					echo '<input type="hidden" name="pid" value="'.$klucz2.'"/>';
					echo $form_podpunkt_close;
					
					echo '<ol class="poziom3">';
					foreach($punkt_lista['podpunkty'] as $klucz3=>$podpunkt_lista)
					{
						if(isset($podpunkt_lista['podpunkt']))
							echo '<li class="poziomli3">'.$podpunkt_lista['podpunkt'].'
							<a href="usun.php?poxid='.$klucz3.'" class="btn btn-xs btn-basic deletepod">x</a></li>';
					}
					echo '</ol></li>';
				}
			}
			echo '</ol></div></li></div>';
	} //koniec wersja 5 kolumn
}		
echo '</ol>';
include 'stopka.php';
?>
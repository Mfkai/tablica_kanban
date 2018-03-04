<?php 
class Crud {

	function __construct($pdo) {
		$this->pdo = $pdo;
    }
	
	function pobierzDane() {

		$stmt=$this->pdo->prepare('SELECT t.tid, t.tytul, p.punkt, p.pid, p.listpunkt, tp.podid, tp.podpunkt from tytul t left join punkt p on p.tid = t.tid left join podpunkt tp on tp.pid = p.pid order by t.tid+0, listpunkt'); 
		$stmt->execute();

		$tablica = array();	
		while($rzad=$stmt->FETCH(PDO::FETCH_ASSOC))		
		{
			$tid = $rzad['tid'];
			$pid = $rzad['pid'];
			$podid = $rzad['podid'];
			$tytul = $rzad['tytul'];
			$punkt = $rzad['punkt'];
			$podpunkt = $rzad['podpunkt'];
		
			if (!isset($tablica[$tid]))
				$tablica[$tid] = array('tid'=>$tid, 'tytul' => $tytul, 'punkty' => array());
  	
			if(!isset($tablica[$tid]['punkty'][$pid])){
				$tablica[$tid]['punkty'][$pid]=array('pid'=>$pid,
				'punkt'=> $punkt,'listpunkt'=>$rzad['listpunkt'],
				'podpunkty'=> array()); 
			}
				
			if(!isset($tablica[$tid]['punkty'][$pid]['podpunkty'][$podid])){
				$tablica[$tid]['punkty'][$pid]['podpunkty'][$podid] = array('podid' => $podid, 'podpunkt' => $podpunkt); 
			}
		}
		return $tablica;	
	}
	
		function wstawTytul($tytul) {
			$stmt = $this->pdo->prepare("INSERT INTO tytul (tytul) VALUES (:tytul)");
			$stmt->bindParam(':tytul', $tytul, PDO::PARAM_STR);
			if($stmt->execute())
				header('Location:index.php');
			
	}

		function wstawPunkt($tid, $punkt) {
			$stmt = $this->pdo->prepare("INSERT INTO punkt (tid, punkt) VALUES (:tid, :punkt)");
			$stmt->bindParam(':tid', $tid, PDO::PARAM_STR);
			$stmt->bindParam(':punkt', $punkt, PDO::PARAM_STR);
			if($stmt->execute())
				header('Location:index.php');
	}
	
			function wstawPodpunkt($pid, $podpunkt) {
			$stmt = $this->pdo->prepare("INSERT INTO podpunkt (pid, podpunkt) VALUES (:pid, :podpunkt)");
			$stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
			$stmt->bindParam(':podpunkt', $podpunkt, PDO::PARAM_STR);
			if($stmt->execute())
				header('Location:index.php');
	}
	
	

	function liczbaKolumn() {
		$stmt=$this->pdo->prepare('SELECT * FROM tytul LIMIT5'); 
		$stmt->execute();
		$liczba = $stmt->rowCount();
		
		return $liczba;	
	}

	function piec() {
		return 5;
	}
		
	function FormularzTytul() {
		$formularz_tytul = "";
		$formularz_tytul .= '<h2 align="center">KANBAN PROJEKT - WERSJA POKAZOWA</h2>';
		$formularz_tytul .= '<form action="" method="POST">';
		$formularz_tytul .= '<input type="text" class="tytul" id="tytul" name="tytul" size="30" placeholder="wstaw tytul kolumny"/>';
		$formularz_tytul .= '<button type="submit" name="zapisz_tytul" class="btn btn-s btn-danger" '.($this->liczbaKolumn() == $this->piec() ? "disabled":"").">+</button>";
		$formularz_tytul .=	'</form></br>';	
		
		return $formularz_tytul;
	}			
	
	function FormularzPunkt(){
		$formularz_punkt = "";
		$formularz_punkt .= '<div class="formpunkt">';
		$formularz_punkt .= '<button class="btn btn-link btn-sm toggle_punkt">dodaj punkt</button>';
		$formularz_punkt .= '<div class="form_punkt">';
		$formularz_punkt .= '<form action="" method="post">';
		
		return $formularz_punkt;
	}
	
	function FormularzPunktClose() {
		$formularz_punkt_close = "";
		$formularz_punkt_close .='<textarea type="text" class="punkt" id="punkt" name="punkt" placeholder="wstaw punkt"></textarea>';
		$formularz_punkt_close .='<button type="submit" name="zapisz_punkt" class="btn btn-xs btn-success zapisz_p">+</button>';
		$formularz_punkt_close .='</form><br>';
		$formularz_punkt_close .= '</div></div>';

		return $formularz_punkt_close;
	}
	
	function FormularzPodpunkt() {
		$formularz_podpunkt = "";
		$formularz_podpunkt .= '<div class="form_podpunkt" id="form_podpunkt">';
		$formularz_podpunkt .= '<form action="" method="post">';
		
		return $formularz_podpunkt;
		
	}
	
	function FormularzPodpunktClose() {
		$formularz_podpunkt_close = "";
		$formularz_podpunkt_close .= '<textarea type="text" class="podpunkt" id="podpunkt" name="podpunkt" placeholder="wstaw podpunkt"></textarea>';
		$formularz_podpunkt_close .= '<button type="submit" name="zapisz_podpunkt" class="btn btn-xs btn-basic zapisz_pod">+</button>';
		$formularz_podpunkt_close .= '</form></div>';
		
		return $formularz_podpunkt_close;
	}
	
	function usunTytul($txid) {
		$stmt = $this->pdo->prepare("DELETE FROM tytul WHERE tid = :id");
		if($stmt->execute(array(':id' => $txid)))
		{
			header('Location:index.php');
		}	
	}
	
	function usunPunkt($pxid) {
		$stmt = $this->pdo->prepare("DELETE FROM punkt WHERE pid = :id");
		if($stmt->execute(array(':id' => $pxid)))
		{
			header('Location:index.php');
		}
	}
	
	function UsunPodpunkt($poxid) {
		$stmt = $this->pdo->prepare("DELETE FROM podpunkt WHERE podid = :id");
		if($stmt->execute(array(':id' => $poxid)))
		{
			header('Location:index.php');
		}
	}
}	
?>
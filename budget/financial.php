<?php

include_once "../pdo-api.php";

class Financial{

	public function ReportCount(){
		$database = new Operations();
		$conn = $database -> dbConnection();
		try{
			$sql = "SELECT budget_id FROM `budget`";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				return $count;
			}
		}
		catch(PDOException $e){
			echo json_encode($e);
		}
	}

	public function LaporanKewangan($data = null){
		$database = new Operations();
		$conn = $database -> dbConnection();
		try{
			#$count = $this->ReportCount;
			#$budget_id = "b" . uniqid($count+1);
			$id = $data->report_id;
			$peruntukan_hep = number_format($data->peruntukan_hep,2);
			$yuran_pendapatan = number_format($data->yuran_pendapatan,2);
			$penaja = $data->penaja;
			$speaker = $data->speaker;
			$tempat_pertama = number_format($data->tempat_pertama,2);
			$tempat_kedua = number_format($data->tempat_kedua,2);
			$tempat_ketiga = number_format($data->tempat_ketiga,2);
			$sql = "UPDATE `budget` SET peruntukan_hep = :peruntukan_hep, yuran_pendapatan = :yuran_pendapatan,
			penaja = :penaja, speaker = :speaker, tempat_pertama = :tempat_pertama, tempat_kedua = :tempat_kedua, tempat_ketiga = :tempat_ketiga WHERE report_id = :report_id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam('report_id',$id);
			$stmt->bindParam('peruntukan_hep',$peruntukan_hep);
			$stmt->bindParam('yuran_pendapatan',$yuran_pendapatan);
			$stmt->bindParam(':penaja',$penaja);
			$stmt->bindParam(':speaker',$speaker);
			$stmt->bindParam(':tempat_pertama',$tempat_pertama);
			$stmt->bindParam(':tempat_kedua',$tempat_kedua);
			$stmt->bindParam(':tempat_ketiga',$tempat_ketiga);
			if($stmt->execute()){
				echo json_encode([
					"message" => "Data inserted successfully !"
				]);
				exit;
			}
			else{
				echo "Bro Nothing Happened trust me!";
			}
			#echo $this->ReportCount();
			#echo $tempat_pertama . "\n";
			#echo $tempat_kedua;
		}
        catch(PDOException $e){
            echo json_encode($e);
        }
	}

	public function getTotal($data = null){
		$database = new Operations();
		$conn = $database -> dbConnection();
		try{
			$id = $data->report_id;
			$sql = "SELECT `tempat_pertama`,`tempat_kedua`,`tempat_ketiga` FROM `budget`";
			$stmt = $conn->prepare($sql);
			#$stmt->bindParam(':report_id',$id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$count = $stmt->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode($count);
				exit;
			}
			else{
				echo "percayala bro tiada data";
			}
		}
		catch(PDOException $e){
			echo json_encode($e, JSON_PRETTY_PRINT);
		}		
	}

	#get data based on the date
	/*public function getBasedDate($data = null){
		$database = new Operations();
		$conn = $database -> dbConnection();
		try{
			$date = $data->date;
			$sql = "SELECT `peruntukan_hep`,`yuran_pendapatan` FROM `budget`";
			$stmt $conn->prepare($sql);
			exit;

		}
		catch(PDOException $e){
			echo json_encode($e);
		}
	}*/

	public function getFinancialDetails($data = null){
		$database = new Operations();
		$conn = $database->dbConnection();
		try{
			$sql = "SELECT `speaker`,`tempat_pertama`,`tempat_kedua`,`tempat_ketiga`,`peruntukan_hep`,`yuran_pendapatan`,
			`penaja` FROM `budget` WHERE report_id = :report_id";
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(':report_id',$data);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode($details);
				exit;
			}
		}
		catch(PDOException $e){
			echo json_encode($e);
		}
	}

	public function sendPendahuluan($data = null){
		$database = new Operations();
		$conn = $database->dbConnection();
		try{
			$report_id = $data->report_id;
			$name_activity = $data->nama_aktiviti;
			$penganjur = $data->penganjur;
			$pengarah = $data->pengarah;
			$p_bertanggungjawab = $data->pegawai_bertanggungjawab;
			$b_diluluskan = $data->bajet_diluluskan;
			$p_kelulusan = $data->penama_kelulusan;
			$k_oleh = $data->kelulusan_oleh;
			$jumlah_cek = $data->jumlah_cek;
			$penerima_cek = $data->penerima_cek_tunai;
			$sql = "UPDATE `budget` SET name_activity = :name_activity, penganjur = :penganjur, pengarah = :pengarah,
			pegawai_bertanggungjawab = :p_bertanggungjawab, bajet_diluluskan = :b_diluluskan, penama_kelulusan = :p_kelulusan,
			kelulusan_oleh = :k_oleh, jumlah_cek = :jumlah_cek, penerima_cek = :penerima_cek WHERE report_id = :report_id";
			$stmt = $conn -> prepare($sql);
			$stmt->bindParam(':report_id',$report_id);
			$stmt->bindParam(':name_activity',$name_activity);
			$stmt->bindParam(':penganjur',$pengajur);
			$stmt->bindParam(':pengarah',$pengarah);
			$stmt->bindParam(':p_bertanggungjawab',$p_bertanggungjawab);
			$stmt->bindParam(':b_diluluskan',$b_diluluskan);
			$stmt->bindParam('p_kelulusan',$p_kelulusan);
			$stmt->bindParam(':k_oleh',$k_oleh);
			$stmt->bindParam(':jumlah_cek',$jumlah_cek);
			$stmt->bindParam(':penerima_cek',$penerima_cek);
			if($stmt->execute()){
				echo json_encode([
					"message" => "Data inserted successfully !"
				]);
				exit;
			}

		}
		catch(PDOException $e){
			echo json_encode($e);
		}
	}

	public function getAllLaporanKewangan($data = null){
		$db = new Operations();
		$conn = $db -> dbConnection();
		$report_id = $data;
		try{
			$sql = "SELECT * FROM `budget` WHERE report_id = :report_id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':report_id',$report_id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode($details);
			}
			else{
				echo json_encode([
					"message" => "Data not found!"
				]);
			}
		}
		catch(PDOException $e){
			echo json_encode($e);
		}
	}

	public function getPendahuluan($data = null){
		$db = new Operations();
		$conn = $db->dbConnection();
		$report_id = $data;
		try{
			$sql = "SELECT `name_activity`,`penganjur`,`pengarah`,`pegawai_bertanggungjawab`,`bajet_diluluskan`,
			`penama_kelulusan`,`kelulusan_oleh`,`jumlah_cek`,`penerima_cek` FROM `budget` WHERE report_id = :report_id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':report_id',$report_id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode($details);
			}
			else{
				echo json_encode(["message"=>"Data is not found!"]);
			}
		}
		catch(PDOException $e){
			echo json_encode($e);
		}
	}
}

?>
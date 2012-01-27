<?php
class BadWordsModel extends ModelBase{

	public function addBadWords($BadWords){
		$i = 0;
		while($i < count($BadWords)){
			$this->provider->executeQuery("INSERT INTO `g_words` SET `word` = '%s' ;", array($BadWords[$i]));
			++$i;
		}
	}

	public function DeleteBadWords($BadWordID){
		$this->provider->executeQuery( "DELETE FROM `g_words` WHERE `ID` = '%s' ;", array($BadWordID));
	}

	public function GetBadWords($pageIndex, $pageSize){
		return $this->provider->fetchResultSet("SELECT * FROM `g_words` LIMIT %s,%s;", array($pageIndex * $pageSize, $pageSize));
	}

	public function getBadWordsCount(){
		return $this->provider->fetchScalar("SELECT COUNT(*) FROM `g_words` ;");
	}
}
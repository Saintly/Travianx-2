<?php
class NewsModel extends ModelBase{

	public function getSiteNews(){
		return $this->provider->fetchScalar('SELECT news_text FROM g_summary');
	}

	public function setSiteNews($news){
		$this->provider->executeQuery('UPDATE g_summary SET news_text="%s"', array($news));
	}

	public function getGlobalSiteNews(){
		return $this->provider->fetchScalar('SELECT gnews_text FROM g_summary');
	}

	public function setGlobalPlayerNews($news){
		$this->provider->executeQuery('UPDATE g_summary SET gnews_text="%s"', array($news));
		$flag = trim($news) != "" ? 1 : 0;
		$this->provider->executeQuery('UPDATE p_players SET new_gnews=%s', array($flag));
	}
}
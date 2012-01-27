<?php
define( "__QS_LOCK_FS_", APP_PATH."lock" );
class MutexModel extends ModelBase{

	public function lock(){
		if(0 < $this->provider->executeQuery2( "UPDATE g_settings gs SET gs.qlocked=1, qlocked_date=NOW() WHERE gs.qlocked=0" ) && ($fp = fopen(__QS_LOCK_FS_, "r")) != FALSE){
			if(flock($fp, LOCK_EX)){
				fclose($fp);
				return TRUE;
			}
			fclose($fp);
		}
		return FALSE;
	}

	public function release(){
		$this->_releaseInternal();
		$this->provider->executeQuery( "UPDATE g_settings gs SET gs.qlocked=0" );
	}

	public function releaseOnTimeout(){
		if(0 < $this->provider->executeQuery2( "UPDATE g_settings gs SET gs.qlocked=0WHEREgs.qlocked=0ANDTIME_TO_SEC(TIMEDIFF(NOW(), gs.qlocked_date)) > 120")){
			$this->_releaseInternal();
		}
	}

	public function _releaseInternal(){
		if(($fp = fopen( __QS_LOCK_FS_, "r")) != FALSE){
			flock($fp, LOCK_UN);
			fclose($fp);
		}
	}
}
<?php 
require('.'.DIRECTORY_SEPARATOR.'GameEngine'.DIRECTORY_SEPARATOR.'boot.php');
require_once( MODEL_PATH."alliance.php" );
class GPage extends SecureGamePage{

	public $selectedTabIndex;
	public $fullView;
	public $hasAlliance = FALSE;
	public $allianceData = NULL;
	public $lastReports = NULL;
	public $hasErrors = FALSE;
	public $invitesResult = -1;
	public $contracts;
	public $bbCodeReplacedArray = array();

	public function GPage(){
		parent::securegamepage();
		$this->viewFile = "alliance.php";
		$this->contentCssClass = "alliance";
	}

	public function load(){
		parent::load();
		$m = new AllianceModel();
		$allianceId = 0;
		$this->allianceData = NULL;
		if(isset($_GET['id']) && 0 < intval($_GET['id'])){
			$allianceId = intval( $_GET['id'] );
			$this->allianceData = $m->getAllianceData($allianceId);
		}
		if($this->allianceData == NULL){
			$allianceId = intval($this->data['alliance_id']);
			if($allianceId <= 0){
				$this->hasAlliance = FALSE;
			}
			else{
				$this->allianceData = $m->getAllianceData($allianceId);
			}
		}
		$this->hasAlliance = TRUE;
		$this->fullView = $allianceId == intval($this->data['alliance_id']);
		$this->selectedTabIndex = 0;
		if($this->fullView){
			if($this->selectedTabIndex == 1 && !$this->hasAllianceEditRole()){
				$this->selectedTabIndex = 0;
			}
			elseif(!empty($_GET['t']) && $_GET['t'] == 2){
				$this->selectedTabIndex = 2;
			}
			elseif(!empty($_GET['t']) && $_GET['t'] == 3){
				$this->selectedTabIndex = 3;
			}
		}
		if($this->isPost() && $this->fullView && $this->selectedTabIndex == 1 && $this->hasAllianceEditRole()){
			$newData = array( "name" => isset( $_POST['aname1'] ) && trim( $_POST['aname1'] ) != "" ? $_POST['aname1'] : $this->allianceData['name'], "name2" => isset( $_POST['aname2'] ) && trim( $_POST['aname2'] ) != "" ? $_POST['aname2'] : $this->allianceData['name2'], "description1" => htmlspecialchars( $_POST['be1'] ), "description2" => htmlspecialchars( $_POST['be2'] ) );
			$m->editAllianceData( intval( $this->data['alliance_id'] ), $newData, $this->allianceData['players_ids'] );
			$m->dispose();
			$this->redirect("alliance.php");
		}
		else{
			if($this->selectedTabIndex == 0 && isset($_GET['d']) && 0 < intval($_GET['d']) && $this->hasAllianceRemovePlayerRole() && $this->player->playerId != intval($_GET['d']) && $this->isMemberOfAlliance(intval($_GET['d']))){
				$this->allianceData['players_ids'] = $m->removeFromAlliance(intval($_GET['d']), $allianceId, $this->allianceData['players_ids'], $this->allianceData['player_count']);
				//--$this->allianceData['player_count'];
				$this->allianceData['player_count'];
			}
			elseif($this->selectedTabIndex == 2){
				$lastReportsType = 0;
				if(isset( $_GET['ac'])){
					if($_GET['ac'] == 1){
						$lastReportsType = 1;
					}
					elseif($_GET['ac'] == 2){
						$lastReportsType = 2;
					}
				}
				$this->lastReports = $m->getLatestReports($this->allianceData['players_ids'], $lastReportsType);
			}
			elseif($this->selectedTabIndex == 3 && isset( $_GET['a'])){
				switch($_GET['a']){
					case 1 :
                        if ( !$this->hasAllianceInviteRoles( ) )
                        {
                            unset( $_GET['a'] );
                            break;
                        }
                        $this->allianceData['players_invites'] = array( );
                        if ( trim( $this->allianceData['invites_player_ids'] ) != "" )
                        {
                            $invites = explode( "\n", trim( $this->allianceData['invites_player_ids'] ) );
                            foreach ( $invites as $invite )
                            {
                                //$pname = explode( " ", $invite, 2 )[1];
                                //$pid = explode( " ", $invite, 2 )[0];
                                $pname = explode( " ", $invite[1],2);
                                $pid = explode( " ", $invite[0],2);
                                $this->allianceData['players_invites'][$pid] = $pname;
                            }
                        }
                        if ( $this->isPost( ) && isset( $_POST['a_name'] ) )
                        {
                            $pid = intval( $m->getPlayerId( $_POST['a_name'] ) );
                            if ( 0 < $pid )
                            {
                                if ( !isset( $this->allianceData['players_invites'][$pid] ) )
                                {
                                    $this->invitesResult = 2;
                                    $this->allianceData['players_invites'][$pid] = $_POST['a_name'];
                                    $m->addAllianceInvites( $pid, $allianceId );
                                }
                            }
                            else
                            {
                                $this->invitesResult = 1;
                            }
                        }
                        if (intval($_GET['d']) && isset( $_GET['d'], $this->allianceData['players_invites'] ) )
                        {
                            //unset( $Var_6816['players_invites'][intval( $_GET['d'] )] );
                            unset( $this->allianceData['players_invites'][intval($_GET['d'])] );
                            $m->removeAllianceInvites( intval( $_GET['d'] ), $allianceId );
                        }
                        break;
					case 2 :
                        if ( !$this->hasAllianceEditContractRole( ) )
                        {
                            unset( $_GET['a'] );
                            break;
                        }
                        $contracts_alliance_id = trim( $this->allianceData['contracts_alliance_id'] );
                        $contracts = array( );
                        if ( $contracts_alliance_id != "" )
                        {
                            $contracts_alliance_idArr = explode( ",", $contracts_alliance_id );
                            foreach ( $contracts_alliance_idArr as $item )
                            {
                                $pendingStatus = explode( " ", $item[1] );
                                $aid = explode( " ", $item[0] );
                                $contracts[$aid] = $pendingStatus;
                            }
                        }
                        $this->hasErrors = TRUE;
                        if ( !$this->isPost( ) )
                        {
                            if ( $_GET['d'] && isset( $_GET['d'], $contracts ) )
                            {
                                unset( $contracts[$_GET['d']] );
                                $m->removeAllianceContracts( $allianceId, intval( $_GET['d'] ) );
                            }
                            if ( $_GET['c'] && isset( $_GET['c'], $contracts ) )
                            {
                                $contracts[$_GET['c']] = 0;
                                $m->acceptAllianceContracts( $allianceId, intval( $_GET['c'] ) );
                            }
                        }
                        else if ( isset( $_POST['a_name'] ) && trim( $_POST['a_name'] ) != "" )
                        {
                            $caid = intval( $m->getAllianceId( trim( $_POST['a_name'] ) ) );
                            if ( 0 < $caid && !isset( $contracts[$caid] ) )
                            {
                                $m->addAllianceContracts( $allianceId, $caid );
                                $contracts[$caid] = 1;
                                $this->hasErrors = FALSE;
                            }
                        }
                        $this->contracts = $contracts;
                        break;
					case 3 :
						if($this->isPost()){
							if(isset($_POST['pw']) && strtolower($this->data['pwd']) == strtolower(md5($_POST['pw']))){
								$this->allianceData['players_ids'] = $m->removeFromAlliance( $this->player->playerId, $allianceId, $this->allianceData['players_ids'], $this->allianceData['player_count'] );
								//--$this->allianceData['player_count'];
								$this->allianceData['player_count'];
								$m->dispose( );
								$this->redirect( "alliance.php" );
							}
							else{
								$this->hasErrors = TRUE;
							}
						}
					break;
				}
			}
			if($this->selectedTabIndex == 0){
				$contracts_alliance_id = trim($this->allianceData['contracts_alliance_id']);
				$this->contracts = array();
				if($contracts_alliance_id != ""){
					$contracts_alliance_idArr = explode(",", $contracts_alliance_id);
					foreach($contracts_alliance_idArr as $item){
						$pendingStatus = explode(" ", $item[1]);
						$aid = explode( " ", $item[0] );
						if($pendingStatus == 0){
							$this->contracts[$aid] = $m->getAllianceName($aid);
						}
					}
				}
				$this->allianceData['rank'] = $m->getAllianceRank( $allianceId, $this->allianceData['score'] );
				$result = $m->getAlliancePlayers( $this->allianceData['players_ids'] );
				$this->allianceData['players'] = array();
				while($result != NULL && $result->next()){
					$this->allianceData['players'][] = array( "id" => $result->row['id'], "name" => $result->row['name'], "total_people_count" => $result->row['total_people_count'], "alliance_roles" => $result->row['alliance_roles'], "villages_count" => $result->row['villages_count'], "lastLoginFromHours" => $result->row['lastLoginFromHours'] );
				}
			}
			$m->dispose();
		}
	}

	public function _hasAllianceRole($role){
		$alliance_roles = trim($this->data['alliance_roles']);
		if($alliance_roles == ""){
			return FALSE;
		}
		$roleName = explode( " ", $alliance_roles[1], 2 );
		$roleNumber = explode( " ", $alliance_roles[0], 2 );
		return $roleNumber & $role;
	}

	public function hasAllianceEditRole(){
		return $this->_hasAllianceRole(ALLIANCE_ROLE_EDITNAMES);
	}

	public function hasAllianceRemovePlayerRole(){
		return $this->_hasAllianceRole(ALLIANCE_ROLE_REMOVEPLAYER);
	}

	public function hasAllianceSetRoles(){
		return $this->_hasAllianceRole(ALLIANCE_ROLE_SETROLES);
	}

	public function hasAllianceInviteRoles(){
		return $this->_hasAllianceRole(ALLIANCE_ROLE_INVITEPLAYERS);
	}

	public function hasAllianceEditContractRole(){
		return $this->_hasAllianceRole(ALLIANCE_ROLE_EDITCONTRACTS);
	}

    public function preRender(){
		//( );
		if ( isset( $_GET['id'] ) ){
			//  $ && _39768112 .= "villagesLinkPostfix";
		}
		if(0 < $this->selectedTabIndex){
			//    $ && _5844592 .= "villagesLinkPostfix";
		}
	}

	public function getAllianceName($aid){
		$m = new AllianceModel( );
		$n = $m->getAllianceName( $aid );
		return trim( $n ) != "" ? $n : "[?]";
	}

	public function getAllianceDataFor($playerId){
		$m = new AllianceModel( );
		return $m->getAllianceDataFor($playerId);
	}

	public function isMemberOfAlliance($playerId){
		$players_ids = trim( $this->allianceData['players_ids'] );
		if($players_ids == ""){
			return FALSE;
		}
		$arr = explode(",", $players_ids);
		foreach($arr as $pid){
			if($pid == $playerId){
				return TRUE;
				break;
			}
		}
		return FALSE;
	}


	public function getOnlineStatus($lastLoginFromHours){
		if($lastLoginFromHours <= 1){
			return "<img class=\"online1\" src=\"assets/x.gif\" title=\"".alliance_p_status1."\" alt=\"".alliance_p_status1."\">";
		}
		if($lastLoginFromHours <= 24){
			return "<img class=\"online2\" src=\"assets/x.gif\" title=\"".alliance_p_status2."\" alt=\"".alliance_p_status2."\">";
		}
		if($lastLoginFromHours <= 24 * 3){
			return "<img class=\"online3\" src=\"assets/x.gif\" title=\"".alliance_p_status3."\" alt=\"".alliance_p_status3."\">";
		}
		if($lastLoginFromHours <= 24 * 7){
			return "<img class=\"online4\" src=\"assets/x.gif\" title=\"".alliance_p_status4."\" alt=\"".alliance_p_status4."\">";
		}
		return "<img class=\"online5\" src=\"assets/x.gif\" title=\"".alliance_p_status5."\" alt=\"".alliance_p_status5."\">";
	}

    public function getAllianceDescription( $text ){
		$img = "<img class=\"%s\" src=\"assets/x.gif\" onmouseout=\"med_closeDescription()\" onmousemove=\"med_mouseMoveHandler(arguments[0],'<p>%s</p>')\">";
		$medals = explode( ",", $this->allianceData['medals'] );
		foreach ( $medals as $medal ){
			if(trim($medal) == ""){
				continue;
			}
			$week = explode( ":", $medal[2] );
			$rank = explode( ":", $medal[1] );
			$index = explode( ":", $medal[0] );
			if(!isset( $this->gameMetadata['medals'][$index])){
				continue;
			}
			$bbCode = intval( $medalData['BBCode'] ) + intval( $week ) * 10 + ( intval( $rank ) - 1 );
			$cssClass = "medal ".$medalData['cssClass']."_".$rank;
			$altText = htmlspecialchars( sprintf( "<table><tr><th>".profile_medal_txt_cat.":</th><td>%s</td></tr><tr><th>".profile_medal_txt_week.":</th><td>%s</td></tr><tr><th>".profile_medal_txt_rank.":</th><td>%s</td></tr></table>", constant( "medal_".$medalData['textIndex'] ), $week, $rank ) );
			if(!isset( $this->bbCodeReplacedArray[$bbCode])){
				$count = 0;
				$text = preg_replace( "/\\[#".$bbCode."\\]/", preg_replace( $img, $cssClass, $altText ), $text, 1, $count );
				if ( 0 < $count ){
					$this->bbCodeReplacedArray[$bbCode] = $count;
				}
			}
		}
		$contractsStr = "";
		foreach ( $this->contracts as $Var_2616 => $aname ){
			$contractsStr .= "<a href=\"alliance.php?id=".$aid."\">".$aname."</a><br/>";
		}
		if ( !isset( $this->bbCodeReplacedArray['contracts'] ) ){
			$count = 0;
			$text = preg_replace( "/\\[contracts\\]/", $contractsStr, $text, 1, $count );
			if ( 0 < $count ){
				$this->bbCodeReplacedArray['contracts'] = $count;
			}
		}
		return nl2br( $text );
	}
	
}
$p = new GPage();
$p->run();
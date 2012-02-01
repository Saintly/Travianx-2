<?php
require('.'.DIRECTORY_SEPARATOR.'GameEngine'.DIRECTORY_SEPARATOR.'boot.php');
require_once( MODEL_PATH."links.php" );
class GPage extends securegamepage{

	public function GPage(){
		parent::securegamepage();
		$this->viewFile = "links.php";
		$this->contentCssClass = "player";
	}

	public function load(){
		parent::load();
        if(!$this->data['active_plus_account']){exit(0);}
		else{
			if($this->isPost()){
				$this->playerLinks = array();
				$i = 0;
				$c = sizeof( $_POST['nr'] );
				while($i < $c){
					$name = trim( $_POST['linkname'][$i] );
					$url = trim( $_POST['linkurl'][$i] );
					if ( $url == "" || $name == "" || $_POST['nr'][$i] == "" || !is_numeric( $_POST['nr'][$i] ) ){
                        continue;
                    }
                    $selfTarget = TRUE;
                    if ( substr( $url, strlen( $url ) - 1 ) == "*" ){
                        $url = substr( $url, 0, strlen( $url ) - 1 );
                        $selfTarget = FALSE;
                    }
                    if ( isset( $this->playerLinks[$_POST['nr'][$i]] ) ){
                        ++$_POST['nr'][$i];
                    }
                    $this->playerLinks[$_POST['nr'][$i]] = array( "linkName" => $name, "linkHref" => $url, "linkSelfTarget" => $selfTarget );
                    ++$i;
                }
                ksort( $this->playerLinks );
                $links = "";
                foreach ( $this->playerLinks as $link ){
                    if ( $links != "" ){
                        $links .= "\n\n";
                    }
                    $links .= $link['linkName']."\n".$link['linkHref']."\n".( $link['linkSelfTarget'] ? "?" : "*" );
                }
                $m = new LinksModel();
                $m->changePlayerLinks( $this->player->playerId, $links );
                $m->dispose();
            }
        }
    }
}
$p = new GPage();
$p->run();
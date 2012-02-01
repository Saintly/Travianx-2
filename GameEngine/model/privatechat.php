<?php 
class PrivateChatModel extends ModelBase
{

    public function SendToChat( $from, $playerId, $avatar, $to, $to_id, $message )
    {
        $user = $this->provider->fetchScalar( "SELECT `avatar` FROM `p_players` WHERE `id` = '%s';", array( $to_id ) );
        $this->provider->executeQuery( "INSERT INTO `privatechat` SET\r\n\t\t`from` \t\t= '%s',\r\n\t\t`from_id` \t= '%s',\r\n\t\t`from_img` \t= '%s',\r\n\t\t`to` \t\t= '%s',\r\n\t\t`to_id` \t= '%s',\r\n\t\t`to_img` \t= '%s',\r\n\t\t`message` \t= '%s',\r\n\t\t`sent` \t\t= NOW();", array( $from, $playerId, $avatar, $to, $to_id, $user, $message ) );
    }

    public function GetFromChat( $playerId )
    {
        $privatechat = $this->provider->fetchResultSet( "SELECT * FROM `privatechat` WHERE (`to_id` = '%s' AND recd = 0) ORDER BY `id` ASC;", array( $playerId ) );
        $this->provider->executeQuery( "UPDATE `privatechat` SET `recd` = 1 WHERE `to_id` = '%s' AND `recd` = 0;", array( $playerId ) );
        return $privatechat;
    }

}
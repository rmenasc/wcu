<?php //include "../user/User.php";

abstract class Block {
  const TEXT_TOP =
   "<h5> %s </h5>"; //Title
   
   const TEXT_BOTTOM = "";
    
  abstract protected function getBlockBody($data);
    
  public function getBlock($title, $data) {
    return sprintf(self::TEXT_TOP .  $this->getBlockBody($data) . self::TEXT_BOTTOM, $title);
    //$text .= sprintf(self::TEXT_BOTTOM;
    //return = $text;
  }

}
?>
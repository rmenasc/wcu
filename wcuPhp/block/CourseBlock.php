<?php
//include "../user/User.php";
//include "Block.php";

class CourseBlock extends Block {
  const TEXT_TOP =
    "<table class='w3-table-all w3-card-4'>";
  const TEXT_ROW =
    " <tr>"
    . " <td>"
    . "  %s " // name
    . " </td>"
    . "</tr>";
  const TEXT_BOTTOM =
    "</table>"; 
    
  public function getBlockBody($data) {
    $text = sprintf(self::TEXT_TOP); 
    foreach ($data as $d) {
      $text .= sprintf(self::TEXT_ROW, $d->getName());
    }
    
    $text .= sprintf(self::TEXT_BOTTOM);
    return $text;
  }
}
?>
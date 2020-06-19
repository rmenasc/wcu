<?php
//include "Block.php";

class UserBlock extends Block {
  const TEXT_TOP =
    "<table class='w3-table w3-white w3-card-4'>";
  const TEXT_ROW =
    " <tr>"
    . " <td>"
    . "  <img src='%s' class='w3-left w3-margin-right' style='width:75px'> " // photo
    . " </td>"
    . "</tr>"
    ." <tr>"
    . " <td>"
    . "  %s %s" // firstname and last name
    . " </td>"
    . "</tr>"
    ." <tr>"
    . " <td>"
    . "  G.P.A. = %s " // GPA
    . " </td>"
    . "</tr>"
    ." <tr>"
    . " <td>"
    . "  Title:  %s " // Title
    . " </td>"
    . "</tr>";
  const TEXT_BOTTOM =
    "</table>"; 
    
  public function getBlockBody($data) {
    $text = sprintf(self::TEXT_TOP); 
    
    $text .= sprintf(self::TEXT_ROW, $data->getPhoto(), $data->getFirstName(), 
        $data->getLastName(), $data->getGpa(), $data->getTitle());
    
    $text .= sprintf(self::TEXT_BOTTOM);
    return $text;
  }
}
?>
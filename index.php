<?php
  $link=new mysqli('192.168.0.100', 'user', '548794877414', 'weight');
  $select="SELECT * FROM test WHERE 1";
  $search=$link->query($select);
  echo '<table border=0 width=250>';
  echo '<tr>';
  echo '<td>tid</td>';
  echo '<td>nid</td>';
  echo '<td>weight</td>';
  echo '</tr>';
  while($data=$search->fetch_assoc())
  {
	  echo '<tr>';
	  echo '<td>'.$data['tid'].'</td>';
	  echo '<td>'.$data['nid'].'</td>';
	  echo '<td>'.$data['weight'].'</td>';
	  echo '</tr>';
  }
  echo '</table>';
  $select="SELECT SUM(weight) AS SUM FROM test WHERE 1";
  $search=$link->query($select);
  $data=$search->fetch_assoc();
  echo '</br></br>SUM(weight)='.$data['SUM'];
  $link->close();
?>

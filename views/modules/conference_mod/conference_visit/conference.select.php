<?php

foreach ($this->ConferenceM->readConference() as $row) {
?>
<a href="conference-visit&token=<?php echo $row['con_code']; ?>"><?php echo $row["con_name"]; ?></a>
<?php } ?>

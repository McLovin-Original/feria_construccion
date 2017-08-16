<?php

foreach ($this->ConferenceM->readConference() as $row) {
?>
<a href="conference-visit&token=<?php echo $row['sta_code']; ?>"><?php echo $row["sta_name"]; ?></a>
<?php } ?>

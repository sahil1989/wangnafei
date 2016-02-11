<?php
	if ( isset( $errors->Error ) ) {
		$Error = $errors->Error;
        if(isset($Error->Code)) {
    		switch ($Error->Code) {
                case 931:
                    echo '<p class="text-danger fontlg">No flights found for the selected dates.</p>';
                    break; 
                case 118:
                    echo '<p class="text-danger fontlg">Transaction unable to process.</p>';
                    break;
                case 996:
                    echo '<p class="text-danger fontlg ">No journey found for requested places!</p>';
                    break;
    			case 977:
                    echo '<p class="text-danger fontlg">No available flight found for the requested segment!</p>';
                    break;
    			case 866:
                    echo '<p class="text-danger fontlg">No results found!</p>';
                    break;
    			case 985:
                    echo '<p class="text-danger fontlg">No results found for the selected dates!</p>';
                case 950:
                    echo '<p class="text-danger fontlg">No results found. Please try new search!</p>';
                    break;
                default:
                    echo '<p class="text-danger fontlg">'.$Error->_.'. Code -  '.$Error->Code.' </p>';
            }
        }
        else {
            echo '<p class="text-danger fontlg">No results found.</p>';
        }
	}
?>

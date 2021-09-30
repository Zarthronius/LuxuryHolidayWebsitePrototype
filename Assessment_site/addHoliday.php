<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" content="Error page for when incorrect information is enterred while creating a new holiday"> <!-- description of the page-->
        <link href="style.css" rel="stylesheet"> <!--Uses CSS stylesheet for design-->
        <script src="responsive_menu.js"></script> <!--JScript hamburger menu for low width displays-->
        <title>Leading Choice Getaways - Holiday Added</title>
</head>
<body>
    <div class = "gridContainer"> <!-- creates grid container to contain page-->
        <header>
            <h1><a id="ham_menu">&#9776;</a> Leading Choice Getaways</h1> <!--Menu Icon only visible on narrow screens (e.g. mobile)-->
        </header>

        <nav>
            <ul id="main-nav"> <!--Navigation bar links with accessibility features-->
                <li><a class="navbar-image" href="index.php"><img id="navIcon" src="Images/Logo.png" alt="Leading Choice Getaways logo, a circle representing an abstract beach view of the horizon."></a></li>
                <li><a href="index.php" accesskey="h">Home</a></li>
                <li><a href="holidays.php" accesskey="v">View Holidays</a></li>
                <li><a class="active" href="admin.php" accesskey="a">Admin</a></li>
                <li><a href="credits.html" accesskey="c">Credits</a></li>
                <li><a href="wireframes.pdf" accesskey="w">Wireframes</a></li>
            </ul>
        </nav>

        <main>
            <section class="NoBottomMargin topSection"> <!--Section container for main content-->
                <?php
                    // database_conn.php holds dbConn variable
                    include 'database_conn.php';

                    // Variables for DB, will set to null if not filled
                    $holidayTitle = isset($_REQUEST['holidayTitle']) ? $_REQUEST['holidayTitle'] : null;
                    $holidayDescription = isset($_REQUEST['holidayDescription']) ? $_REQUEST['holidayDescription'] : null;
                    $holidayDuration = isset($_REQUEST['holidayDuration']) ? $_REQUEST['holidayDuration'] : null;
                    $locationID = isset($_REQUEST['locationID']) ? $_REQUEST['locationID'] : null;
                    $catID = isset($_REQUEST['catID']) ? $_REQUEST['catID'] : null;
                    $holidayPrice = isset($_REQUEST['holidayPrice']) ? $_REQUEST['holidayPrice'] : null;

                    // Validation for empty fieldsm, presents error
                    if (empty($holidayTitle)||empty($holidayDescription)||empty($holidayDuration)||empty($locationID)||empty($catID)||empty($holidayPrice)){
                        echo "<h2>Error: Empty Fields</h2>";
                        echo "<p>All fields should be completed.</p>";
                        echo "<button><a href='admin.php'>Go Back</a></button>\n</section>\n</main>\n</body>\n</html>";
                    }
                    // Extra server validation for valid duration
                    else if ($holidayDuration < 1 ||$holidayDuration > 99){
                        echo "<h2>Error: Incorrect Duration Value</h2>";
                        echo "<p>Holiday Duration must be no less than 1 day and no more than 99 days.</p>";
                        echo "<button><a href='admin.php'>Go Back</a></button>\n</section>\n</main>\n</body>\n</html>";
                    }
                    // Extra server validation for valid price
                    else if ($holidayPrice < 0 || $holidayPrice > 999999.99){
                        echo "<h2>Error: Incorrect Price Value</h2>";
                        echo "<p>Holiday Price must be between £0 and £999999.99</p>";
                        echo "<button><a href='admin.php'>Go Back</a></button>\n</section>\n</main>\n</body>\n</html>";
                    }

                    // If fields not empty, and values in valid range, insert into DB
                    else {
                        
                        //escapes HTML field inputs
                        //user can still change HTML field type e.g. convert duration to text field. Should ensure input is an int/float
                        $holidayTitle = $dbConn->real_escape_string($holidayTitle);
                        $holidayDescription = $dbConn->real_escape_string($holidayDescription);
                        $holidayDuration = $dbConn->real_escape_string($holidayDuration);
                        $locationID = $dbConn->real_escape_string($locationID);
                        $catID = $dbConn->real_escape_string($catID);
                        $holidayPrice = $dbConn->real_escape_string($holidayPrice);
                        
                        $insertSQL = "INSERT INTO LCG_holidays(holidayTitle, holidayDescription, holidayDuration, locationID, catID, holidayPrice)
                                    VALUES ('$holidayTitle', '$holidayDescription', '$holidayDuration', '$locationID', '$catID', '$holidayPrice')";
                        
                        // Attempts to update DB
                        $success = $dbConn->query($insertSQL);
                        
                        if ($success === false) // If query failed, return error to user and exit.
                        {
                            echo "<h2>Server Error</h2>";
                            echo "<p>Query failed: ".$dbConn->error."</p>\n</section>\n</main>\n</body>\n</html>";
                            exit;
                        
                        } else {

                        $retrieveCatDesc = "SELECT catDesc FROM LCG_category\n"
                                         . "WHERE LCG_category.catID = '$catID'"; // If query was successful, find the category description, location name, and country from the newest holidayID (the one just enterred)
                        
                                        $success = $dbConn->query($retrieveCatDesc); // See if SQL retrieval from cat table was successful, reuses variable from insert query
                        
                        $retrieveLocation = "SELECT locationName, country FROM LCG_location\n"
                                          . "WHERE LCG_location.locationID = '$locationID'";

                                        $success2 = $dbConn->query($retrieveLocation); // See if SQL retrieval from location table was successful
                                    }

                        // If problem retrieving from either table, return error similarly to when failing to update.
                        if ($success === false || $success2 === false)
                        {
                            echo "<h2>Server Error</h2>";
                            echo "<p>Query failed: ".$dbConn->error."</p>\n</section>\n</main>\n</body>\n</html>";
                            exit;

                        } else { // Else state success and give View Holiday button
                            echo "<h2>New Holiday Added!</h2>\n";
                            echo "<p>Your holiday will be shown as follows:</p>";
                            $rowCatObj = $success->fetch_object(); // Fetches record from cat table
                            $rowLocationObj = $success2->fetch_object(); // Fetches row from location table
                            $costPerDay = number_format((($holidayPrice)/($holidayDuration)), 2); //Calculates cost per day by doing holidayPrice/holidayDuration and formats to 2 decimal places
                            echo "<section class='holiday flexChild'>\n
                                  <h3 class='holidayTitle'>{$holidayTitle}</h3>\n
                                  <div class='imgAndDesc'>\n
                                  <img class='leftFloatingImage' src=Images/flags/{$rowLocationObj->country}.png alt='An icon of the {$rowLocationObj->country} flag.'>\n 
                                  <p class='holidayDescription'>{$holidayDescription}</p>\n
                                  </div>\n
                                  <p class='holidayDuration'><b>Duration:</b> {$holidayDuration} Days</p>\n
                                  <p class='holidayPrice'><b>Price:</b> £{$holidayPrice}</p>\n
                                  <p class='costPerDay'><b>Cost per day:</b> £{$costPerDay}</p>\n
                                  <p class='catDesc'><b>Category:</b> {$rowCatObj->catDesc}</p>\n
                                  <p class='locationName'><b>Location:</b> {$rowLocationObj->locationName}, {$rowLocationObj->country}</p>\n
                                  </section>\n";
                                
                            $success->close(); // Closes queries and connection
                            $success2->close();
                            $dbConn->close();
                            echo "<button><a href='holidays.php'>View Holidays</a></button>\n"; // Button to return to View Holidays page
                        }
                    }
                ?>
        </section>
    </main>
    <aside>
    </aside>
    
    <footer>
        <p>This is a page for a fictional site called Leading Choice Getaways</p>
    </footer>
    </div>
</body>
</html>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" content="View all available holidays on offer."> <!-- description of the page-->
        <link href="style.css" rel="stylesheet"> <!--Uses CSS stylesheet for design-->
        <script src="responsive_menu.js"></script> <!--JScript hamburger menu for low width displays-->
        <title>Leading Choice Getaways - Holidays</title>
    </head>
    <body>
        <div class = "gridContainer"> <!-- creates grid container to contain page-->
            <header>
                <h1><a id="ham_menu">&#9776;</a> Leading Choice Getaways</h1> <!--Menu Icon only visible on narrow screens (e.g. mobile)-->
            </header>
    
            <nav>
                <ul id="main-nav"> <!--Navigation menu locations with accessibility keys-->
                <li><a class="navbar-image" href="index.php"><img id="navIcon" src="Images/Logo.png" alt="Leading Choice Getaways logo, a circle representing an abstract beach view of the horizon."></a></li>
                <li><a href="index.php" accesskey="h">Home</a></li>
                <li><a class = "active" href="holidays.php" accesskey="v">View Holidays</a></li>
                <li><a href="admin.php" accesskey="a">Admin</a></li>
                <li><a href="credits.html" accesskey="c">Credits</a></li>
                <li><a href="wireframes.pdf" accesskey="w">Wireframes</a></li>
                </ul>
            </nav>

            <main>
                    <section class="NoBottomMargin topSection"> <!--Section container for main content-->
                    <h2>All Holidays</h2>
                        <div class="flexParent"> <!-- flex div-->
                        <?php
                        /**
                         * @var $dbConn mysqli
                         */
                            include 'database_conn.php'; // Make db connection

                            $sql = "SELECT holidayTitle, holidayDescription, holidayDuration, holidayPrice, catDesc, locationName, country FROM LCG_holidays\n"
                            . "JOIN LCG_category on LCG_holidays.catID = LCG_category.catID\n"
                            . "JOIN LCG_location on LCG_holidays.locationID = LCG_location.locationID\n"
                            . "ORDER BY holidayTitle ASC"; // Select query for all content in all tables

                            $queryResult = $dbConn->query($sql);

                            // Check for and handle query failure
                            if($queryResult === false) {
                                echo "<p>Query failed: ".$dbConn->error."</p>\n</div>\n</section>\n</main>\n</body>\n</html>"; 
                                exit;
                            }
                            // Otherwise, fetch all the rows returned by the query one by one
                            else {
                                while($rowObj = $queryResult->fetch_object()){ // 
                                $costPerDay = number_format((($rowObj->holidayPrice)/($rowObj->holidayDuration)), 2); //Calculates cost per day by doing holidayPrice/holidayDuration and formats to 2 decimal places
                                echo "<section class='holiday flexChild'>\n
                                      <h3 class='holidayTitle'>$rowObj->holidayTitle</h3>\n
                                      <div class='imgAndDesc'>\n
                                      <img class='leftFloatingImage' src=Images/flags/$rowObj->country.png alt='An icon of the $rowObj->country flag.'>\n 
                                      <p class='holidayDescription'>$rowObj->holidayDescription</p>\n
                                      </div>\n
                                      <p class='holidayDuration'><b>Duration:</b> $rowObj->holidayDuration Days</p>\n
                                      <p class='holidayPrice'><b>Price:</b> £$rowObj->holidayPrice</p>\n
                                      <p class='costPerDay'><b>Cost per day:</b> £$costPerDay</p>\n
                                      <p class='catDesc'><b>Category:</b> $rowObj->catDesc</p>\n
                                      <p class='locationName'><b>Location:</b> $rowObj->locationName, $rowObj->country</p>\n
                                      </section>\n"; //Displays all content for each holiday and
                                }
                            }
                            $queryResult->close(); // Closes queries and connection
                            $dbConn->close();
                        ?>
                        </div>
                </section>
            </main>

            <aside> <!--Right side of screen at high width-->
                <img class="blockImg" src="Images/LargeImages/seaShell.jpg" alt="Image of a sea shell propped on a sand mount under a blue clouded sky.">
                <p>All Holidays provided offer <strong>24/7 contact support</strong>, and a variety of <em>exclusive</em> activities provided by partners of Leading Choice Getaways.</p>
                <p>Prices shown are per person and include return flight tickets and an all inclusive room at one of our partnered hotels close to the heart of your holiday destination.</p>
                <p>Holidays shown may vary depending on availability due to some limited time seasonal holiday packages.</p>
                <p>Contact us if you wish to make a booking or find more information on holidays shown.</p>
            </aside>
            
            <footer>
                <p>This is a page for a fictional site called Leading Choice Getaways</p>
            </footer>
        </div> 
    </body>
</html>
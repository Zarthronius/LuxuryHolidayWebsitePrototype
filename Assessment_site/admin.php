<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" content="Create and submit details for a new holiday."> <!-- description of the page-->
        <link href="style.css" rel="stylesheet"> <!--Uses CSS stylesheet for design-->
        <script src="responsive_menu.js"></script> <!--JScript hamburger menu for low width displays-->
        <title>Leading Choice Getaways - Admin</title>
    </head>
    <body>
        <div class = "gridContainer"> <!-- creates grid container to contain page-->
            <header>
                <h1><a id="ham_menu">&#9776;</a> Leading Choice Getaways</h1> <!--Menu Icon only visible on narrow screens (e.g. mobile)-->
            </header>

            <nav>
                <ul id="main-nav"> <!--Navigation bar links with accessibility features-->
                <li><a class="navbar-image" href="index.php"><img id="navIcon" src="Images/Logo.png" alt="Leading Choice Getaways logo, a circle representing an abstract beach view of the horizon."></a></li>
                <li><a href="index.php" accesskey= "h">Home</a></li>
                <li><a href="holidays.php" accesskey= "v">View Holidays</a></li>
                <li><a class = "active" href="admin.php" accesskey= "a">Admin</a></li>
                <li><a href="credits.html" accesskey= "c">Credits</a></li>
                <li><a href="wireframes.pdf" accesskey= "w">Wireframes</a></li> <!--WIREFRAMES PDF IS NOT FINAL VERSION-->
                </ul>
            </nav>

            <main>
                <section class="NoBottomMargin topSection"> <!--Section container for main content-->
                    <h2>Create Holiday</h2>
                    <p>Complete this form to enter a new holiday.</p>
                    <form action="addHoliday.php" method="post">
                        <!-- FIELDSET FOR LCG_holidays TABLE (holidayTitle, holidayDescription, holidayDuration, holidayPrice)-->
                        
                        <fieldset>
                        <legend>Holiday Details</legend>
                        <div class="formGrid">
                            <!--TITLE-->
                            <label for="holidayTitle">Title: </label>
                            <input type="text" name="holidayTitle" id="holidayTitle" maxlength="25" size="20" accesskey= "t" required>
                            <!--DESCRIPTION-->
                            <label for="holidayDescription">Description:</label>
                            <textarea name="holidayDescription" id="holidayDescription" maxlength="256" cols="70" rows="5" accesskey= "r" required></textarea>
                            <!--DURATION-->
                            <label for="holidayDuration">Days:</label>
                            <input type="number" name="holidayDuration" id="holidayDuration" min="1" max="99" accesskey= "y" required>
                            <!--PRICE-->
                            <label for="holidayPrice">Price (£):</label>
                            <input type="number" step = "0.01" name="holidayPrice" id="holidayPrice" min="0" max="999999.99" accesskey= "p" required>

                            <!--DYNAMIC CATEGORY DESCRIPTION (RADIO BUTTON)-->
                            <span id=formRadioHeader>Category:</span>               
                            <?php
                                include 'database_conn.php';

                                //dynamically generated Location list from database
                                $sql = "SELECT catID, catDesc FROM LCG_category";
                            
                                $queryResult = $dbConn -> query($sql);
                                
                                if($queryResult === false) { // If query fails, return error and exit page
                                    echo "<p>Query failed: ".$dbConn->error."</p>\n</div>\n</fieldset>\n</form>\n</section>\n</main>\n</body>\n</html>";
                                    exit;
                                }

                                else {
                                    $accessKey = 1;
                                    while($rowObj = $queryResult->fetch_object()){ // If no error, add new radio button for each category and increment access key
                                        
                                        echo "<label class='radioLabel' for='{$rowObj->catDesc}'>{$rowObj->catDesc}</label>\n";
                                        echo "<input type='radio' name='catID' id='{$rowObj->catDesc}' value='{$rowObj->catID}' accesskey='$accessKey' required>";
                                        
                                        $accessKey += 1;
                                    }
                                }
                            ?> 
                                                              

                            <!--LOCATION NAME -->
                            <label for="locationID">Location:</label>
                            <select name="locationID" id="locationID" accesskey= "l" required>
                                <?php
                                include 'database_conn.php';

                                //dynamically generated Location list from database
                                $sql = "SELECT locationID, locationName FROM LCG_location\n"
                                       . "ORDER BY locationName ASC";
                            
                                $queryResult = $dbConn -> query($sql);
                                
                                if($queryResult === false) { // If query failed, return error to user and exit.
                                    echo "<p>Query failed: ".$dbConn->error."</p>\n</select>\n</div>\n</fieldset>\n</form>\n</section>\n</main>\n</div>\n</body>\n</html>";
                                    exit;
                                }
                            
                                else { // Dynamically lists options
                                    while($rowObj = $queryResult->fetch_object()){
                                        echo "<option value='{$rowObj->locationID}'>{$rowObj->locationName}
                                        </option>\n";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        </fieldset>
                        <input type="submit" accesskey= "s" value="Submit Holiday Entry"> <!--Submits record to DB-->
                        
                    </form>
                </section>
            </main>

            <aside>
                <h2>Page Info</h2> <!--Aside on right side of screen at high width-->
                <p>Use this page to create new holiday packages.</p>
                <p>Any holidays created will be displayed on the <strong>View Holidays</strong> page, and may be starred as a featured holiday on our Home page!</p>
                <p><em><strong>All</strong></em> fields must be filled and submitted using the button at the bottom of the form.</p>
            </aside>
            
            <footer>
                <p>This is a page for a fictional site called Leading Choice Getaways</p>
            </footer>
        </div>
    </body>
</html>
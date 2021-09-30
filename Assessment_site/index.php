<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" content="The home page for Leading Choice Getaways."> <!-- description of the page-->
        <link href="style.css" rel="stylesheet"> <!--Uses CSS stylesheet for design-->
        <script src="responsive_menu.js"></script> <!--JScript hamburger menu for low width displays-->
        <title>Leading Choice Getaways - Home</title>
    </head>
    
    <body>
        <div class = "gridContainer">
            <header>
                <h1><a id="ham_menu">&#9776;</a>Leading Choice Getaways</h1>
            </header>
            <nav>
                <ul id="main-nav"> <!--Navigation bar links with accessibility features-->
                    <li><a class="navbar-image" href="index.php"><img id="navIcon" src="Images/Logo.png" alt="Leading Choice Getaways logo, a circle representing an abstract beach view of the horizon."></a></li>
                    <li><a class="active" href="index.php" accesskey="h">Home</a></li>
                    <li><a href="holidays.php" accesskey="v">View Holidays</a></li>
                    <li><a href="admin.php" accesskey= "a">Admin</a></li>
                    <li><a href="credits.html" accesskey= "c">Credits</a></li>
                    <li><a href="wireframes.pdf" accesskey= "w">Wireframes</a></li>
                </ul>
            </nav>
            
            <main>
                <div class ="desktopFlexParent"> <!--Top two elements flex at high page width-->
                <section class="desktopFlexChild topSection">
                    <h2>Why Leading Choice Getaways?</h2>
                    <p>Leading Choice Getaways is a new all in one startup travel agent and holiday planner that aims to give you the best experience possible and full peace of mind. We want to ensure that you are able to spend less time planning on how to enjoy your trips, and more time enjoying them. </p>
                    <p>With a focus on cheap, high quality and memorable activities, when the time comes to pick a trustworthy and high quality holiday provider, we hope to be <em>your</em> leading choice.</p>
                </section>
                <section class="desktopFlexChild rightFlex">
                <h2>The Leading Choice Promise</h2>
                <p>We pledge to offer you:</p>
                    <ul>
                    <li><strong>24/7 support</strong> online and by phone</li>
                    <li><strong>Lowest prices</strong> on flights and travel</li>
                    <li><strong>Affordable</strong> and highly rated Hotels and accommodation</li>
                    <li><strong>Expert guidance</strong> on the best  activities and locations for sightseeing</li>
                    <li><strong>Exclusive</strong> activities for Leading Choice Getaways customers</li>
                    </ul>
                </section>
                </div>
                <section> <!--Section that contains section header and flexboxes-->
                    <h2>Featured Holidays</h2>
                    <p>Visit the View Holidays page for more.</p>
                    <div class="flexParent"> <!--Parent to hold child flexbox sections. Child flexboxes hold basic holiday info from 3 randomly selected holidays.-->
                        <?php
                        /**
                         * @var $dbConn mysqli
                        */
                        include 'database_conn.php'; //make db connection

                        $sql = "Select holidayTitle, holidayDescription, holidayDuration, country FROM LCG_holidays\n"
                        . "JOIN LCG_location on LCG_holidays.locationID = LCG_location.locationID\n"
                        . "ORDER BY rand()"
                        . "LIMIT 3"; // Selects 3 random records from the database as featured holidays 

                        $queryResult = $dbConn->query($sql);

                        // Check for and handle query failure
                        if($queryResult === false) {
                            echo "<p>Query failed: ".$dbConn->error."</p>\n</div>\n</section>\n</main>\n</body>\n</html>";
                            exit;
                        }
                        // Otherwise, fetch all the rows returned by the query one by one
                        else {
                            while($rowObj = $queryResult->fetch_object()){
                            echo "<section class='holiday flexChild'>\n
                                  <h3 class='holidayTitle'>$rowObj->holidayTitle</h3>\n
                                  <div class='imgAndDesc'>
                                  <img class='leftFloatingImage' src=Images/flags/$rowObj->country.png alt='An icon of the $rowObj->country flag.'>\n 
                                  <p class='holidayDescription'>$rowObj->holidayDescription</p>\n
                                  </div>
                                  </section>\n";
                            }
                        }
                        $queryResult->close(); //Closes query and connection
                        $dbConn->close();
                    ?>
                    </div>
                </section>
                <div class="desktopFlexParent"> <!--Flexes bottom 2 elements at high page width-->
                <section class="desktopFlexChild desktopNoBottomMargin">
                    <h2>Destination of the month</h2>
                        <h3>The Wonders of Milaidhoo Island</h3>
                        <img class="blockImg" src="Images/LargeImages/milaidhoo.jpg" alt="Image of a tropical beachside restaurant with seating out by the seafront">
                        <p>This month we feel you deserve to <strong>feel rested, relaxed, and refreshed</strong> at our <em>luxury</em> resort stays down in the tropical Maldives on Milaidhoo Island.</p>
                        <p>This highlighted holiday away sports breathtaking views with luxurious villas, beachside restaurants, fascinating scuba trips to visit deep sea wildlife and so much more.</p>
                </section>

                <section id="featuredActivity" class="desktopFlexChild NoBottomMargin bottomRightFlex">
                    <h2>Featured Activity</h2>
                        <h3>Spectacular Savannah Safari</h3>
                        <img class="blockImg" src="Images/LargeImages/safari.jpg" alt="Image of a late evening in the Savannah, with Lions, Elephants, Giraffes, Zebras and Rhinos in the plains.">
                        <p>Join us on the <strong>adventure of a life time</strong> with our Kenyan tours to visit <em>world renowned</em> African wildlife locations and get up close and personal with some of nature's fiercest animals!</p>
                        <p>With a wide range of locations to see wild lions, elephants, giraffes and zebra herds galore, let us help you see a new side of the world.</p>
                    </section>

                </div>
            </main>
            <aside> <!--Aside on right side of screen at high width-->
                <h2>Latest News</h2>
                <section class="imgAndDesc">
                    <h3>Maldives #1 Travel Location</h3> 
                    <img class="leftFloatingImage" src="Images/Thumbnails/maldivesThumbnail.jpg" alt="Thumbnail image of a sea beach hut in the Maldives.">
                    <p>A survey to previous Leading Choice Getaway customers found that the Maldives is the best place to visit during your lifetime.</p>
                </section>

                
                <section class=imgAndDesc>
                    <h3>Currency Conversion Inbound</h3>
                    <img class="leftFloatingImage" src="Images/Thumbnails/currencyThumbnail.jpg" alt="Thumbnail image of several notes in multiple currencies.">
                    <p>Leading Choice Getaways will soon offer in store currency conversion to help making it to your destination easier than ever before.</p>
                </section>

                <section class=imgAndDesc>
                    <h3>Mediterranean Trips Cheaper Than Ever!</h3>
                    <img class="leftFloatingImage" src="Images/Thumbnails/Mediterranean_flagThumbnail.png" alt="Thumbnail image of the mediterranean flag.">
                    <p>In an effort to encourage tourism, many mediterranean nations, including Italy, have started an effort to increase tourism and have offered subsidies to tourist hotspots across the nation.</p>
                </section>

                
                <section class=imgAndDesc>
                    <h3>Mysteries of Zanzibar</h3>
                    <img class="leftFloatingImage" src="Images/Thumbnails/starfishThumbnail.jpg" alt="Thumbnail image of a red-knobbed starfish on sand.">
                    <p>Multiple new species of never before seen marine wildlife have been discovered off the coast of Zanzibar island.</p>
                    </section>
            </aside>
            <footer>
                <p>This is a page for a fictional site called Leading Choice Getaways</p>
            </footer>
        </div>
    </body>
</html>
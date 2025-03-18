<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "books";

$conn = new mysqli($serverName, $username, $password, $dbName);
$mode = 'list';
if(isset($_REQUEST['mode']))
    $mode = $_REQUEST['mode'];
?>

<!-- Webpage Set up -->
<!DOCTYPE html>
<html>
   
    <head>
        <meta charset="utf-8">
            <title>Home</title>
            <link rel="icon" type="image/jpeg" sizes="32x32" href="catBug.jpg">
            <link rel="stylesheet" href="style.css" type="text/css">
    </head>

    <body class="master-grid"> 

        <!-- HEADER SECTION--------------------------------------- -->
        <header>
            <h1>The Reading Nook</h1>
            <h2>Home</h2>
            <h4>Welcome to my little library</h4>
        </header>
        <!-- END OF HEADER SECTION--------------------------------------- -->


        <!-- TOP MENU SECTION--------------------------------------- -->
        <div id="top-menu">
            <ul>
                <li><a href="http://localhost/MySecondWebPage/home.php">Home</a></li>
                <li><a href="http://localhost/MySecondWebPage/about.php">About</a></li>
            </ul>
        </div>
        <!-- END OF TOP MENU SECTION--------------------------------------- -->

        
        <!-- MAIN GRID SECTION--------------------------------------- -->
        <main class="grid">     
            
            <div id="left">
                <h2>Mini Menu</h2>
                    <ul class="side-menu">
                        <li><a href=#inprogress>What's on now</a></li>
                        <li><a href=#onway>What's on its way</a></li>
                        <li><a href=#completed>What's on the shelf</a></li>
                            <ul>
                                <li>Worth a read</li>
                                <li>Waste of time</li>
                            </ul>
                        <li><a href=#recs>Recommend books</a></li>
                    </ul>
            </div>

            <div id="main">
                
            <!-- ABOUT SECTION--------------------------------------- -->
                <div id="about">
                    <h2>About</h2>
                        <p>
                        Hello! Welcome to my little library blog where I keep track of all the books I've read, 
                        the ones I want to read and those I wish I forgot. Would love your book recommendations too, so please send'em all!    
                        </p>
                    <button class="add-button">
                        <a href="#recs">Add your recommendations</a>
                    </button>
                </div>
            <!-- end of ABOUT SECTION--------------------------------------- -->    
            
            <!-- IN PROGRESS SECTION--------------------------------------- -->
                <div id="in-progress">
                    <div class="book-image">
                        <div id="image-headers">
                            <h3>What's on now</h3>
                            <p>This the book I'm currently reading at the moment</p>
                        </div>
                        <div id="image">
                            <img src="Home_In-Progress/book_Bloodover.png">
                        </div>
                    </div>

                    <div id="book-summary1">
                        <h5>Summary</h5>
                        <!-- Initalise variables to start with -->
                        <?php
                        $title = "Blood Over Bright Haven";
                        $author = "M. L. Wang";
                        $blurb = "Blood Over Bright by M.L. Wang is a gripping dark fantasy set in a war-torn world where loyalty, power, and vengeance are central themes. 
                                  The story follows a skilled warrior caught in the complex web of political intrigue and shifting allegiances. 
                                  As alliances fracture and betrayal lurks around every corner, the protagonist faces difficult choices that challenge their morality and survival. 
                                  With deep character development, intense battles, and a richly built world, the novel explores the harsh consequences of war, 
                                  the cost of loyalty, and the struggle to maintain humanity in a brutal, unforgiving landscape.";   
                        // Check if the form has been submitted and update the values
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            // update all variables with new data if available
                            if(isset($_POST['Title'])) {
                                $title = $_POST['Title'];
                            }   
                            if(isset($_POST['Author'])) {
                                $author = $_POST['Author'];
                            }   
                            if(isset($_POST['Blurb'])) {
                                $blurb = $_POST['Blurb'];
                            }       
                        }
                        ?>
                        <!-- How it will be displayed when values are updated-->
                        <!-- Current Title -->
                        <label id="title">Title:</label>
                        <p><?php echo $title ?></p>
                       
                        <!-- Current Author -->
                        <label id="author">Author:</label>
                        <p><?php echo $author ?></p>
                       
                        <!-- Current Blurb -->
                        <label id="blurb">Blurb:</label>
                        <p><?php echo $blurb ?></p>

                        <!--Create an edit button in div so that it can pop up with a form for user to fill out -->
                        <button class="open-btn" onclick="openForm()">Edit</button>
                                       
                        <!-- Find a way to generate a pop up of the form -->
                        <!-- Create Form container -->
                        <div class="popup-div" id="myForm">
                            <!-- Create form -->
                            <form action="" method="post" class="popup-form">
                                <label id="title">Title:</label>    
                                <input type="text" id="bTitle" name="Title" placeholder="Book title" required>
                                
                                <label id="author">Author:</label>
                                <input type="text" id="bAuthor" name="Author" placeholder="Name of author"required>
                                
                                <label id="blurb">Blurb:</label>
                                <input type="text" id="bBlurb"  name="Blurb" placeholder="Summary"required>
                                
                                <button type="submit" class="save-btn">Save</button>
                                <button type="button" class="cancel-btn" onclick="cancelForm()">Cancel</button>
                            </form>
                        </div>
                        
                        <!-- add some debugging to see if it's working -->
                        <script>
                            function openForm(){
                                console.log("Opening form...");
                                document.getElementById("myForm").style.display="block";
                            }
                            function cancelForm(){
                                console.log("Closing form...");
                                document.getElementById("myForm").style.display="none";
                            }
                        </script>
                    </div>
                        
                    <div id="book-summary2">
                        <h5>My thoughts on it so far</h5>
                         <!-- Initalise variables to start with -->
                         <?php
                        $summary = "It's aight!";
                        $image = "just-a-chill-guy.jpg";
                        // Check if the form has been submitted and update the values
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            // update all variables with new data if available
                            if(isset($_POST['Summary'])) {
                                $summary = $_POST['Summary'];
                            }   
                            if(isset($_POST['Image'])) {
                                $image = $_POST['Image'];
                            }        
                        }
                        ?>
                        <!-- How it will be displayed when values are updated-->
                        <!-- Current Summary -->
                        <label id="summaryMain">Summary:</label>
                        <p><?php echo $summary ?></p>
                       
                        <!-- Current Image -->
                        <p><?php echo '<img src="just-a-chill-guy.jpg" alt="Image">' ?></p>
                                           
                        <!--Create an edit button in div so that it can pop up with a form for user to fill out -->
                        <button class="open-btn2" onclick="openForm2()">Edit</button>
                                       
                        <!-- Find a way to generate a pop up of the form -->
                        <!-- Create Form container -->
                        <div class="popup-div2" id="myForm2">
                            <!-- Create form -->
                            <form action="" method="post" class="popup-form2" enctype="multipart/form-data">
                                <label id="summaryMain">Summary:</label>    
                                <input type="text" id="Summary" name="Summary" placeholder="Type away" required>
                                
                                <label id="file">Select a file to upload:</label> 
                                <input type="file" id="file" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps" name="fileToUpload">

                                <button type="submit" class="save-btn2">Save</button>
                                <button type="button" class="cancel-btn2" onclick="cancelForm2()">Cancel</button>
                            </form>
                        </div>

                        <script>
                            function openForm2(){
                                console.log("Opening form...");
                                document.getElementById("myForm2").style.display="block";
                            }
                            function cancelForm2(){
                                console.log("Closing form...");
                                document.getElementById("myForm2").style.display="none";
                            }
                            function loadFile(event){
                                console.log("Uploading file...");
                            }
                        </script>
                    </div> 
                </div>
            <!-- END OF IN PROGRESS SECTION--------------------------------------- -->

            <!-- REOMMENDATIONS SECTION--------------------------------------- -->
                <div id="recs">

                    <div class="user-recs">
                        
                        <div id="submit-blurb">
                            <h2>Submit your recommendations!</h2>
                            <p>Is there a book I MUST read? Don't gatekeep!</p>
                        </div>
                        
                        <div class="form-container">
                            <form action="update.php" id="validate" method="post" autocomplete="on">
                                <label for="title">Title:</label>
                                <input type="text" id="Title" name="bTitle" placeholder="Book title">

                                <label for="author">Author:</label>
                                <input type="text" id="FNAuthor" name="FNAuthor" placeholder="First name">
                                <input type="text" id="SNAuthor" name="SNAuthor" placeholder="Last name">

                                <input type="submit" value="Submit">
                            </form>
                        </div>

                        <!-- Validate form to ensure all fields are filled in -->
                        <script>
                            function validateForm(ev){
                                var x = document.getElementById("Title").value; // changed id to 'Title' and it soemehow worked again?
                                var y = document.getElementById("FNAuthor").value;
                                var z = document.getElementById("SNAuthor").value;
                                
                                // Need help debugging 
                                console.log("Title:", x);
                                console.log("First Name:", y);
                                console.log("Last Name:", z);

                                if(x == "" && y == "" && z == ""){
                                    console.log("Validation failed: All fields are empty");
                                    alert("Form cannot be empty");
                                    ev.preventDefault();
                                }

                                if(x == "" || y == "" || z == ""){
                                    console.log("Validation failed: One or more fields are empty");
                                    alert("Must complete all fields");
                                    ev.preventDefault();
                                }
                                else{
                                    console.log("Validation passed: All fields are filled");
                                    alert("Successfully submitted");
                                }
                            }
                            document.getElementById("validate").addEventListener("submit",validateForm);
                        </script>
                    </div>

                    <div class="table-recs">
                        <div id="table-blurb">
                            <h2>All recommendations!</h2>
                            <p>Check out what people have submitted so far!</p>
                        </div>

                        <div id="table">
                            <?php
                                if($mode == 'list'){
                            ?>   
                            <?php
                                $result = $conn->query("SELECT *,
                                   CONCAT(Author_firstName,' ', Author_lastName) as fullName
                                   FROM recommendations;");
                            ?>            
                                <table>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                    </tr>
                            <?php    
                                foreach($result as $row){
                            ?>
                                <tr>
                                   <td><?php echo $row['Title']?></td>
                                   <td><?php echo $row['fullName']?></td>
                                </tr>
                            <?php
                                }   
                            ?>
                                </table>   
                            <?php
                            }
                            ?>                     
                        </div>
                    </div>
                </div>
            </div>  
            <!-- END OF RECOMMENDATION SECTION--------------------------------------- --> 

        </main>
        <!-- END OF MAIN GRID SECTION--------------------------------------- --> 

        <!-- FOOTER SECTION--------------------------------------- -->  
        <footer>
            <h2></h2>
        </footer>
        <!-- END OF FOOTER SECTION--------------------------------------- -->  

    </body>
</html>
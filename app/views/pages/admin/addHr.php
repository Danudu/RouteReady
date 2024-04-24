<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Manager Registration</title>
    <!-- You can add CSS links here if needed -->
</head>
<body style="background-image: linear-gradient(rgba(171, 167, 167, 0.428), rgb(255, 255, 255)), url(images/road.jpg);">
    <section class="header">
     

        <form action="<?php echo URLROOT; ?>/admins/addHr"  method="post">
            <section class="topic">
                <div class="form">
                    <div class="topic-content">
                        <h3>HR-Manager Registration</h3>
                    </div>
                    <div class="form-group">
                    
                    <section class="section">
                        <div class="submit"><button type="button" onclick="window.location.href = 'View_Hr.php';">View HR Accounts</button></div>
                    </section>
                    <div class="container clearfix">
                        <div class="column">
                            <br>
                                <div>
                                    <label for="e_name">Employee Name:</label>
                                    <input type="text" id="e_name" name="e_name" placeholder="Enter Employee Name">
                                </div>
                                  
                                <br/>
                                <div>
                                     <label for="e_no">Employee Number:</label>
                                        
                                    <input type="text" id="e_no" name="e_no" placeholder="Enter Employee Number">
                                </div>
                                    
                                <br/>
                                <div>
                                     <label for="nic">NIC Number:</label>
                                       
                                    <input type="text" id="nic" name="nic" placeholder="Enter NIC Number">
                                 </div>
                                   
                                <br/>
                            </div>
                      
                        
                                <div>
                                    <label for="des">Position :</label>
                                    <input type="text" id="position" name="position" placeholder="Enter Position">
                                        </div>
                                   
                                <br/>
                                <div>
                                  <label for="tripdate">Birth Date:</label></span>
                                        
                                            <input type="date" id="date" name="date" placeholder="Enter Birth Date">
                                        </div>
                                  
                                <br/>
                                <div>
                                    <label for="comments">Email Address:</label>
                                        
                                            <input type="text" id="email" name="email" placeholder="Enter Email Address">
                                        </div>
                                   
                                <br/>
                                <section class="section">
                                    <div class="submit"><input type="submit" value="Save"></div>
                                </section>
                            </div>
                            <br/>
                            <div >
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </form>
    </body>
</html>

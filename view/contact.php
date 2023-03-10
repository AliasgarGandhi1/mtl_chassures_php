<div class="tab-container">
        <div class="tab-bar">
            <button class="active" onclick="itemclick('address')">Address</button>
            <button class="tab-bar-item" onclick="itemclick('call')">Call</button>
            <button class="tab-bar-item" onclick="itemclick('email')">Email</button>
            <button class="tab-bar-item" onclick="itemclick('chat')">Chat</button>
        </div>
        <div class="tab-content">

            <!-- address -->
            <div style="display: block;" id="address" class="content-item">
                <div class="address">
                    <img src="Images/icons/office.png" alt="office-icon"/>                    
                    <p>
                        Sainte Croix Ave, 
                        <br/>Saint-Laurent, 
                        <br/>Quebec 
                        <br/>H4L 3X9
                    </p> 
                </div>
                <div class="address-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2795.70688841099!2d-73.67758488456799!3d45.515978779101616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91840f9cb4ca1%3A0xce7f12be3902472b!2sVanier%20College!5e0!3m2!1sen!2sca!4v1648397964575!5m2!1sen!2sca" width="600" height="450" style="border:2px solid black;border-radius: 5px;margin:10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                    
                </div>
            </div>

            <!-- call -->
            <div style="display: none;" id="call" class="content-item">
                <h1>Contact Us: </h1>
                <div class="parent">
                    <div class="child"><img src="Images/icons/phone_office.png" alt="call-icon"/></div>
                    <div class="child"><h3> 514 - 585 - 6666</h3></div>
                </div>                
            </div>

            <!-- Email -->
            <div style="display: none;" id="email" class="content-item">
                
                <div class="parent">
                    <div class="child"><img src="Images/icons/gmail_logo.png" alt="email-icon"/></div>
                    <div class="child">
                        <h1>Mail Us</h1>
                    </div>
                </div>
                <div class="container-form">
                    <form action="?" method="get">
                        <div class="row">
                            <div class="col-label">
                                <label for="email_address">Email Address</label>
                            </div>
                            <div class="col-input">
                                <input type="text" id="email_address" name="email" placeholder="Your email containing 'vaniercollege' extention..">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label">
                                <label for="subject">Subject</label>
                            </div>
                            <div class="col-input">
                                <input type="text" id="subject" name="subject" placeholder="Your topic of concern..">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label">
                                <label for="description">Description</label>
                            </div>
                            <div class="col-input">
                                <textarea id="description" name="description" placeholder="Write something.." style="height:200px"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <input type="submit" id="btnsubmit" name="btnsubmit" disabled value="Submit">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Chat -->
            <div style="display: none;" id="chat" class="content-item">
                <div class="parent">
                    <div class="child"><img src="Images/icons/chat.png" style="margin:0px 0px 0px 600px;padding-top: 25px;" alt="chat-icon"/></div>
                    <div class="child">
                        <h1>Chat Us</h1>
                    </div>
                </div>
                <div class="container-form">
                    <form action="?" method="get">
                        <div class="row">                            
                            <textarea id="description" name="description" placeholder="Write something.." style="height:200px"></textarea>                            
                        </div>
                        <br>
                        <div class="row">
                            <input type="submit" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
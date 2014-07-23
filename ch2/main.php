<html>
    <body>

        <h1>Share your story of alien abduction:</h1>
        
        <!-- mailto action "Mail To"... -->
        <form method="post" action="report.php">
            <label for="firstname">First name:</label>
            <input type="text" id="firstname" name="firstname" /><br />

            <label for="lastname">Last name:</label>
            <input type="text" id="lastname" name="lastname" /><br />

            <label for="email">What is your email address?:</label>
            <input type="text" id="email" name="email" /><br />

            <label for="whenithappened">When did it happend?: </label>
            <input type="text" id="whenithappened" name="whenithappened" /><br />
            
            <label for="howlong">How long were you gone?: </label>
            <input type="text" id="howlong" name="howlong" /><br />

            <label for="howmany">How many did you see?: </label>
            <input type="text" id="howmany" name="howmany" /><br />
            
            <label for="aliendescription">Describe them: </label>
            <input type="text" id="aliendescription" name="aliendescription" /><br />

            <label for="whattheydid">What did they do to you?: </label>
            <input type="text" id="whattheydid" name="whattheydid" /><br />

            <!-- Type -->
            <label for="fangspotted">Have you ever seen my dog Fang? </label>
                Yes <input name="fangspotted" id="fangspotted" type="radio" value="yes"/>
                No  <input name="fangspotted" id="fangspotted" type="radio" value="no"/><br />
            <label for="other">Anything else you want to add?</label>
            
            <textarea id="other" name="other"></textarea><br />
            
            <input type="submit" value="Report Abduction" name="submit" />
        </form>
    </body>
</html>

**Automated Tests**:

![Automated Tests Screenshot](autoTests.jpg?raw=true)

For automated testing, we decided to use an application called Katalon Studio. This let us track our webpage, and it would check link connections, variables, parameters, and other details, and return a status report.  From that we could see if any functionality failed, like a missing link, a last named filled in for a first names variable, etc.

**User Acceptance Tests**:

**1. *Registration***

* Sign up for an account, with all required info and matching passwords

*Description*

* Test Schedule It sign up procedure

*Pre-Conditions*

* None

*Test Steps*

1. Once at Schedule-It Home page 
2. Click Sign up
3. Fill in fields to register
4. Submit
5. You've registered successfully! you should get a message verifiying this.

*Expected Result*

* User should be able to create new account, or be rejected under correct conditions

*Actual Result*

* Success! You are greeted with a verification message

*Status*

* PASS

*Notes*

* Should add in a confirmation email to the entered address (for verification)

*Post-Conditions*

* User's information is visible in the database

**2. *Login***

* Use credentials to enter personalized site

*Description*

* Use user credentials to enter Schedule It through login page


*Preconditions*

* User has registered and has a working account

*Test Steps*

1. Once at Schedule-It Home page
2. Use the username and password you have chosen to login
3. It should log you in successfully.

*Expected Result*

* Successful sign in and enter Schedule It

*Actual Result*

* Failed! Cannot find a match in the database

*Status*

* FAIL

*Notes*

* Incorrect database queries

*Post-Conditions*

* Stays signed in for time period, or with action

**3. *Navigation***

* Moving between the pages

*Description*

* Checking to see if all page links work


*Preconditions*

* Must have user account to test dashboard

*Test Steps*

1. Once logged in to Schedule it
2. The website will direct you to the user dashboard
3. Click the menu button in the upper left corner and select one link. Repeat
4. Click Logo on any page to return to dash

*Expected Result*

* All links direct to correct location

*Actual Result*

* Partial Success! Being able to log in is a precondition that was not met, but the public pages link together
* The dashboard pages link to eachother succesfully
* The dashboard and public pages are not yet linked

*Status*

* FAIL

*Notes*

* Pre-Condition not met

*Post-Conditions*

* N/A




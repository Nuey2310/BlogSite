# CSCI 2170: Winter 2021, Online Edition, Group Assignment-2

## Group information:
- Full name: Dhairy Raval
- Banner ID (B00#): B00845519
- Dal email: dh715291@dal.ca
---
- Full name: Arjun Banga
- Banner ID (B00#): B00852696
- Dal email: arjun.banga@dal.ca
---
- Full name: Miftahul Kashfy 
- Banner ID (B00#): B00850212
- Dal email: mf278426@dal.ca
---
- Full name: Ishan Bhatia
- Banner ID (B00#): B00835259
- Dal email: is998912@dal.ca
---
- Full name: Neuer Gao
- Banner ID (B00#): B00785904
- Dal email: srneuer@dal.ca
---

## Note:
- Read the assignment instructions completely.
- If you are unsure about anything, please contact Raghav, Aref (TA) or the rest of the team.
- Make sure that your queries are sent to Raghav at least 2 business days before the assignment is due, so as to avoid any delays in responses.

## Citations and notes
1. Include full citations (author name, URL and date accessed) for each citation you include.
2. If you have used any images or content that you have created yourself, include a comment in the references AND in the part of the code in which you use the content to indicate that the content was created by yourself.
3. Remember to add a notes in this file about which feature you worked on.
4. We also have to include individual comments in the code with:

   * Your full name and B00 number.
   * What features you implemented (1-2sentences).
   * What you learned from this group development experience (2-3 sentences).

## Citation List:

1. Retrieving current date and time in php
	* Available online at [URL]: https://www.php.net/manual/en/function.date.php
	* Date accessed: 1 April 2021
	* Author: PHP.net contributors

2. Login page image
   * Available online at [URL]: https://www.pexels.com/photo/yellow-black-and-purple-colored-papers-2457284/
   * Date Accessed: 20th March 2021
   * Author: Roenkae A.

3. User profile image
   * Available online at [URL]: https://images.pexels.com/photos/1081685/pexels-photo-1081685.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260
   * Date Accessed: 20th March 2021
   * Author: Pexels Contributors

4. Bootstrap 5
    * Available online at [URL]: https://getbootstrap.com
    * Date Accessed: 7th March 2021
    * Author: Bootstrap developers and contributors

5. Fontawesome
    * Available online at [URL]: https://www.bootstrapcdn.com/fontawesome
    * Date Accessed: 7th March 2021
    * Author: Bootstrap developers and contributors 

6. Bootstrap JS bundle
   * Available online at [URL]: https://getbootstrap.com
   * Date Accessed: 7th March 2021
   * Author: Bootstrap developers and contributors

7. Logout functionality
   * Logout script: session destroy functionality implemented based on the script available on PHP.net
   * URL: https://www.php.net/manual/en/function.session-destroy.php
   * Date accessed: 17 Feb 2021
   * Author: PHP.net contributors

8. Bootstrap Form Control
   * Create a form for admin interface, reused from my(Arjun's) assignment 1
   * URL: https://getbootstrap.com/docs/5.0/forms/form-control/
   * Date accessed: 27 Jan 2021
   * Author: PHP.net

9. Bootstrap Form Check
   * Create a form for admin interface, reused from my(Arjun's) assignment 1
   * URL: https://mdbootstrap.com/docs/standard/forms/checkbox/
   * Date accessed: 27 March 2021
   * Author: PHP.net

10. JavaSript Set Attribute
   * For changing height and overflow attributes for some browsers
   * URL: https://www.w3schools.com/jsref/met_element_setattribute.asp
   * Date accessed: 27 March 2021

11. jQuery event stop propogation
   * If the button is pressed then the tweet should not expand.
   * URL: https://www.w3schools.com/jquery/event_stoppropagation.asp
   * Date accessed: 3 April 2021

12. MYSQLI:: real_escape_string
   * URL: https://www.php.net/manual/en/mysqli.real-escape-string.php
   * Accessed: 15 March 2021

13. W3School PHP Array
   * URL: https://www.w3school.com.cn/php/php_arrays.asp
   * Accessed: 7 Apr 2021

## Features Implemented and Values learned:

- Dhairy Raval
	* Implemented User Story #4, adding the ability to see all the tweets of the people you follow. 	
	(Credits to Arjun for helping me, implement a way to display the full tweet when the user clicks on it)
  * Implemented User Story #9, the ability to follow other users. Also, considered cases where a user might try to follow someone twice, or follow themselves

- Arjun Banga
   * Implemented User Story #7, displaying a list of users that follow you. The list is displayed on the right sidebar.
   * Implemented User Story #6, letting an administrator access the adminstrator interface that allows them to create new accounts with either microblog author or admin roles.
   * Implemented User Story #11, creating a basic tweet share functionality that works similar to retweet. Pressing the share button once makes a user share the tweet and twice makes them unshare.

   * What I learned: This assignment made me realize the difference between academic projects and real life applications. There are a lot more factors involved in creating production-ready applications.


- Miftahul Kashfy
   * Implemented User Story #5, searching tweets based on person's name or twitter handle
   * Implemented User Story #8, posting a tweet and showing appropriate message for it

   * What I learned: This assignment seemed more fun to me. Making the JediTweeps applications helped me realize how what I am
   					 learning now can one day be implemented in real life practices. 

- Ishan Bhatia (B00835259)
   * Implemented the user story #1, allowing the user to login to the website and incteract with different actions (Credits to Dhairy for assisting in regenerating the session id)
   * Implemented the user story #3, allowing the user to logout from the website to prevent unauthorized access. 
   * Implemented the front-end layout for the login page and the main website.
   * What I learned: This assignment allowed me to use my theoritical knowledge to create a basic website which could potentially have real world applications. It gave me an idea of how social media platforms operate on a basic level and what steps they take to protect the user data by following proper security guidelines. It also helped me to get a hands on experience of working with a development team.   
- Neuer Gao (B00785904)
    * User Story #2 Implemented the functionality of user profile page, user can edit their password now
    * User Story #12 Implemented the functionality of block/un-block function.
    * Fixed some bugs in other files.
    * What I learned: I learned how fast does JSON helps us to process data. I didn't use JSON here, so I waste a lot of time. I was also thinking about better database structure, we are using multiple JOIN here, that may be a challenge for server performance when data size becomes very large. I also learnt many mew PHP array method.




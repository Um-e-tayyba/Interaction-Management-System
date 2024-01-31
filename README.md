Interaction management system implemented features

-  Register , Login , Logout feature  
-  create , retrieve , update , show , delete interactions with validations.
-  Simulate interaction (It can be called later on in required functions)
-  Report to display number of time each interaction is triggered
-  Report to display numbers of triggers made by each user.
-  Applied auth:sanctum middleware to secure the app.
-  Applied throttle middle to prevent resource abuse.

  
Approach Used:

- I have added enum type for the type of interactions. I have specified only these types of interactions in the system 'button', 'link',    'image' for this task.
- Interaction label is supposed to be unique in the system.
- I have added a function for interaction simulation. This function when called will store interaction_id and user_id in   interaction_logs through which we can generate report or track interactions.
- For this task, I have added 2 functions for tracking report one based on interaction and the other based user.
- I have added validation and secured the routes and added throttle middleware to prevent resource abuse.


Challenges:

- Despite multiple efforts, my update method was not working with the standard methods for update ( PUT/PATCH ). So in order to complete   the task I have used POST method.

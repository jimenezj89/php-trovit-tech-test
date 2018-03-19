# Technical test

## Main exercise
The objective of the test is to develop an application in PHP, without UI, able to solve the problem using In-Memory 
persistence.

Develop a fault tolerant system responsible for checking the login and password of a user list with the following conditions:

- Return if a user exists in the system or not.
- Returns if the user / password match or not.

Add the coverage of tests that you consider necessary to validate the operation of the application.

## Bonus exercise
The objective of the test is to develop only the test set (unit, functional or acceptance), without implementation, with the idea that a third developer could implement the solution only by reading the tests.

In the previous system, add a new use case: 
   - If the username / password is correct, change the password only of the same user (using the authentication mechanism that you consider appropriate).

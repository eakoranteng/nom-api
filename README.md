A scalable REST API based on MVC. Well suited as a backend RESTFUL service for a mobile application
### Sample Calls
| Code   | Action |
| ------ | -------------------------------------------------------- |
| 101    | [User Login](#user-login) |
| 102    | [User Registration](#user-registration) |

## USER LOGIN
Verify user credentials and returns user information

* **Method:** `POST`

* **Headers:** Content-Type: `application/json`

* **Body**
	```json
	{
		"action": 101,
		"data": {
			"email": "user@domain.tld",
			"password": "myPassw0rd"
		}
	}
	```

* **Success Response**

	**status:** 200 `OK`  
	**body:**  
	```json
	{
		"message": "login successful",
		"data": {
			"first_name": "John",
		    "last_name": "Doe",
		    "email": "user@domain.tld"
		}
	}
	```

* **Error Response**

	**status:** 401 Unauthorized  
	**body:** `{ "message": "user not registered" }`

	**status:** 401 Unauthorized  
	**body:** `{ "message": "incorrect password" }`

	**status:** 401 Unauthorized  
	**body:** `{ "message": "user not authorized" }`

	**status:** 404 Not Found  
	**body:** `{ "message": "user not found" }`


## USER REGISTRATION
Create new user

* **Method:** `POST`

* **Headers:** Content-Type: `application/json`

* **Body**
	```json
	{
		"action": 102,
		"data": {
			"first_name": "John",
			"last_name": "Doe",
			"email": "user@domain.tld",
			"password": "myPassw0rd"
		}
	}
	```

* **Success Response**

	**code:** 201 Created  
	**content:** `{ "message": "registration successful" }`

* **Error Response**

	**code:** 400 Bad Request  
	**content:** `{ "message": "invalid email" }`

	**code:** 400 Bad Request  
	**content:** `{ "message": "invalid password" }`

	**code:** 400 Bad Request  
	**content:** `{ "message": "invalid email and password" }`

	**code:** 403 Forbidden  
	**content:** `{ "message": "user already created" }`

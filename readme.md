# Problem description
Develop a calculator for Megasoft, a company that is working on developing a mega web-based operating system for personal computers. Following should be the main features of calculator

* Perform basic calculations (add, subtract, multiple, divide).
* Perform square root, qubic root, power and factorial calculations.
* A report has to be pulled out daily/weekly/monthly basis showing the operations that have been performed during that time period.
* The calculator will be triggered by developers via an API.
* The calculator will be triggered by end users through a web page

## Technologies used
* PHP 7
* Laravel Framework 5.4
* VueJS 2 (with Vuetify)
* Docker (Used Laradock. A full PHP development environment for Docker)
* Composer as package manager
* Mysql 5.7
* NGINX


# Installation 

## Prerequisites

Make sure that **Docker** and **Git** is already installed on the system. If not then follow the instructions to download and install these dependencies from the below links
* [Docker](https://www.docker.com/)
* [Git](https://git-scm.com/downloads)

## Steps required to install/run the application
The installation process is quite simple and straightforward. Just follow the below steps

- Open the terminal and navigate into the desired project directory and then execute the below command to download the code from github
```
git clone https://github.com/waqasrazaq/mscalculator.git
```

- Once the code is downloaded then navigate into project directory (mscalculator) and then enter into laradock
```
$ root@server:~/# cd mscalculator/laradock
```

- Inside the laradock directory, execute the below command to create the laradock containers for **mysql** and **nginx**
```
$ root@server:~/mscalculator/laradock# docker-compose up -d nginx mysql
```
This will take some time (depending on your internet speed). On average it takes 15 minutes. In case, if it ends with an error then run the same above command again.

- Once the conatiners are up then go to your workspace
```
$ root@server:~/mscalculator/laradock# docker-compose exec workspace bash
```

- Till now development environment is ready, lets install the project code depedencies
```
$ root@workspace:/var/www# composer install
$ root@workspace:/var/www# cp .env.example .env
$ root@workspace:/var/www# php artisan key:generate
$ root@workspace:/var/www# exit
$ root@server:~/mscalculator/laradock# cd ..
$ root@server:~/mscalculator# sudo chmod -R 777 storage bootstrap/cache
```

- Next step is database configuration. Open .env file from root directory of the project and update the below connection information as per your dev environment

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=calculator
DB_USERNAME=default
DB_PASSWORD=secret
```

- Lastly, lets create the required tables in database. 
```
$ root@workspace:/var/www#php artisan migrate
```

Great, That's it. Installation process is completed. If there's no error till now then we're read access the project by simply typing the hostname (IP or localhost, depending on your environment) in the broswer.

# Working Demo 
Full functioning project is deployed on **Digitalocean** at below url

[http://165.22.79.6/](http://165.22.79.6/)



# Web API documentation (Output API end points)

## 1- Add operation (a+b)
Takes two operands and returns the result by adding both operands.

**Method** Get

**Response** Response format is JSON object. For valid response, HTTP status code 200 with the result of add operation in output variable and status code 500 in case any error on the server.

**URL** http://hostname:port/api/calculator/add/{operand1}/{operand2}

**Working Example** [http://165.22.79.6/api/calculator/add/4/3](http://165.22.79.6/api/calculator/add/4/3)

## 2- Subtract operation (a-b)
Takes two operands and returns the result by subtracting second operand from the firt operand.

**Method** Get

**Response** Response format is JSON object. For valid response, HTTP status code 200 with the result of subtract operation in **output** variable and status code 500 in case any error on the server.

**URL** http://hostname:port/api/calculator/subtract/{operand1}/{operand2}

**Working Example** [http://165.22.79.6/api/calculator/subtract/14/6](http://165.22.79.6/api/calculator/subtract/14/6)

## 3- Multiply operation (a*b)
Takes two operands and returns the result by multiplying each other.

**Method** Get

**Response** Response format is JSON object. For valid response, HTTP status code 200 with the result of multiplication operation in **output** variable and status code 500 in case any error on the server.

**URL** http://hostname:port/api/calculator/multiply/{operand1}/{operand2}

**Working Example** [http://165.22.79.6/api/calculator/multiply/4/3](http://165.22.79.6/api/calculator/multiply/4/3)

## 4- Division Operation (a/b)
Takes two operands and returns the result by dividing first operand by the second operand.

**Method** Get

**Response** Response format is JSON object. For valid response, HTTP status code 200 with the result of division operation in **output** variable and status code 500 in case any error on the server.

**URL** http://hostname:port/api/calculator/divide/{operand1}/{operand2}

**Working Example** [http://165.22.79.6/api/calculator/divide/25/5](http://165.22.79.6/api/calculator/divide/25/5)

## 5- Square root Operation (√a)
Takes one operand and returns the square root of that operand.

**Method** Get

**Response** Response format is JSON object. For valid response, HTTP status code 200 with the result of square root operation in **output** variable and status code 500 in case any error on the server.

**URL** http://hostname:port/api/calculator/squareroot/{operand}/

**Working Example** [http://165.22.79.6/api/calculator/squareroot/81](http://165.22.79.6/api/calculator/squareroot/81)

## 6- Qubic root operation (3√a)
Takes one operands and returns the qubic root of that operand.

**Method** Get

**Response** Response format is JSON object. For valid response, HTTP status code 200 with the result of qubic root operation in **output** variable and status code 500 in case any error on the server.

**URL** http://hostname:port/api/calculator/qubicroot/{operand}/

**Working Example** [http://165.22.79.6/api/calculator/qubicroot/8](http://165.22.79.6/api/calculator/qubicroot/8)

## 7- Power Operation (a^b)
Takes two operands and returns the result by taking power of first operand with second operand.

**Method** Get

**Response** Response format is JSON object. For valid response, HTTP status code 200 with the result of power operation in **output** variable and status code 500 in case any error on the server.

**URL** http://hostname:port/api/calculator/power/{operand1}/{operand2}

**Working Example** [http://165.22.79.6/api/calculator/power/4/3](http://165.22.79.6/api/calculator/power/4/3)

## 8- Factorial operation (a!)
Takes one operand and returns its factorial.

**Method** Get

**Response** Response format is JSON object. For valid response, HTTP status code 200 with the result of factorial operation in **output** variable and status code 500 in case any error on the server.

**URL** http://hostname:port/api/calculator/factorial/{operand}

**Working Example** [http://165.22.79.6/api/calculator/factorial/5](http://165.22.79.6/api/calculator/factorial/5)



## 9- Get daily report 
To get the operations activity performed today only (starting today midnight). Take one parameter **daily** of type string. 

**Method** Get

**Response** A JSON object with the list of operations perforemd. Each item will have attributes like "activity", "created-at", "ip" and "agent". For valid response status code 200 and status code 500 in case any error on the server.

**URL** http://hostname:port/api/calculator/report/{daily}

**Working Example** [http://165.22.79.6/api/calculator/report/daily](http://165.22.79.6/api/calculator/report/daily)


## 10- Get weekly report
To get the operations activity performed this week only. Take one parameter **weekly** 

**Method** Get

**Response** A JSON object with the list of operations perforemd. Each item will have attributes like "activity", "created-at", "ip" and "agent". For valid response status code 200 and status code 500 in case any error on the server.

**URL** http://hostname:port/api/calculator/report/{weekly}

**Working Example** [http://165.22.79.6/api/calculator/report/weekly](http://165.22.79.6/api/calculator/report/weekly)


## 11- Get monthly report 
To get the operations activity performed in current month only. Take one parameter of type string **monthly** 

**Method** Get

**Response** A JSON object with the list of operations perforemd. Each item will have attributes like "activity", "created-at", "ip" and "agent". For valid response status code 200 and status code 500 in case any error on the server.

**URL** http://hostname:port/api/calculator/report/{monthly}

**Working Example** [http://165.22.79.6/api/calculator/report/monthly](http://165.22.79.6/api/calculator/report/monthly)

# High level introduction to the project and files structure
Although the information below on the application structure is very brief, at least it gives a starting point for the developers to work on the project

* routes/api.php - Contains the RESTful api routes
* routes/web.php - Contains the routes for normal web page access
* app/libs/calculator - Contains all the busniess logic (**interfaces and classes**) required for Calculator module.
* app/Http/Controllers - Contains all the controllers for the application. There's a file **CalculatorController.php** and **ReportController.php** inside it which controls all the requests coming from end points
* app/Helpers/LogActivity.php, is a helper which uses Log model to save oeprations and also conatins functions to retrive report data
* database/migrations - Contains the tables **schema** and migration related code
* resources/views - Contains our single view **home.blade.php** for the web page. It mainly uses VueJS for the frontend part.
* resources/assets/js/app - Contains VueJS related code. **app.js** initalizes the vue app and **components** directory contains all the components created for this application.
* laradock - Along with other modules Laradock also contains the configuration files **.env** and **docker-compose.yml** for Docker.
* vendor - Contains all the composer dependencies

For more details on the overall files structure of the laravel project, follow this docs https://laravel.com/docs/ link.

## Note
Major focus is given to application architecture and development environment. UI/UX part is quite basic which can be easily implemented based on the required design. Due to time limit, current report API,s are intenionally very basic which can be enhanced more by adding more cabaility of handling dates ranges etc.

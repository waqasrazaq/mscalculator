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
https://github.com/waqasrazaq/mscalculator.git
```

- Once the code is downloaded then navigate into project directory (mscalculator) and then enter into laradock
```
cd mscalculator/laradock
```

- Inside the laradock directory, execute the below command to create the laradock containers for mysql and nginx
```
docker-compose up -d nginx mysql
```
This will take some time (depending on your internet speed) to complete downloading and installing the container. On avaerga it take 15 minutes. In case, if it ends with error then run the same command again.

- Go to Your Workspace
```
docker-compose exec workspace bash
```


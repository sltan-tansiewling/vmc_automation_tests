# vmc_automation_tests

Pre-Requisite Installation: 
- Composer (https://getcomposer.org/download/)
- Java JDK (https://www.oracle.com/java/technologies/javase-jdk15-downloads.html)
- Firefox (for now as this version depends on Firefox)
- IDE (e.g. VS Code)

Local Setup
1. Open up Terminal
2. Clone the repo to your working directory
3. Run "composer install" to install all the packages
 
 
Run Selenium Server
1. Open up Terminal with a new tab 
2. Navigate to the vmc_automation_tests folder
3. Run "java -jar selenium-server-standalone-3.141.59.jar"

You should be able to see the line "Selenium Server is up and running on port 4444" if the selenium server is running properly.


Run Behat Test (Can continue from the 1st Terminal tab on Local Setup)
1. To run all feature tests, run "vendor/bin/behat"
2. To run a specific feature file (e.g. feature file name is sign_in), run "vendor/bin/behat features/sign_in.feature"
3. To run scenarios with only certain tags (e.g. the tag to run is @regression), run "vendor/bin/behat --tags @regression"

Extensions you can install in VS Code to make the text easier to read:
- Behat Complete
- BDD - Feature-Editor

Upcoming
- Add support for other browsers e.g. Chrome
- Test Report
- Running of tests in CI/CD pipeline

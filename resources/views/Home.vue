<template>
    <div class="flex flex-col md:flex-row justify-between w-screen">
        <div class="container flex mx-auto flex-col mt-4 p-4 w-fit">
            <img class="mx-auto rounded-tl-3xl rounded-br-3xl mb-4 w-64 h-64 object-cover" src="../../public/images/dev_portrait.jpeg">
            <h1 class="text-base text-center mb-2 md:text-5xl font-bold">Devin DeLeon</h1>
            <p class="text-center mb-2">Colorado | (949)842-4973 | ddeleon2@uccs.edu</p>
            <div class="mx-auto">
                <a target="_blank" rel="noopener noreferrer" class="text-base font-semibold underline hover:no-underline text-emerald-600" href="https://www.linkedin.com/in/devin-deleon-4002051ba/">LinkedIn | </a>
                <a target="_blank" rel="noopener noreferrer" class="text-base font-semibold underline hover:no-underline text-emerald-600" href="https://github.com/devdel2">GitHub</a>
            </div>
        </div>
        <div class="container flex flex-col m-4 p-4 w-fit h-fit">
            <div class="container flex flex-col ml-4 w-fit">
                <h2 class="text-base md:text-3xl font-bold">Education</h2>
                <ul class="list-disc ml-8 mb-4">
                    <li>University of Colorado Colorado Springs</li>
                    <li>Bachelor's - Computer Science, Minor - Game Design & Development</li>
                    <li>Overall GPA: 3.25 - CS Dept. GPA: 3.81</li>
                </ul>
            </div>
            
            <div class="container flex flex-col ml-4 w-fit">
                <h2 class="text-base md:text-3xl font-bold">Technical Skills</h2>
                <h3 class="text-base text-md font-semibold italic">Programming Languages, Skills, & Certifications</h3>
                <ul class="list-disc ml-8 mb-4">
                    <li>Python, JavaScript, Linux, PHP, Laravel, MySql, MongoDB, NPM, Docker, Vue</li>
                    <li>Agile/SLDC, CRUD, Github, CI/CD, Google Maps API, Postman</li>
                    <li>Cherwell/HALO ITSM, Active Directory, Confluence/HALO Documentaion</li>
                    <li>CTS-I Certified - Systems Testing, Needs Analysis, PM, Networking, Integration, Consultation</li>
                    <li>Crestron Inter. System Programing - AV Systems Control Programming</li>
                </ul>
            </div>
            
            <div class="container flex flex-col ml-4 w-fit">
                <h2 class="text-base md:text-3xl font-bold">Recent Work Experience</h2>
                <h3 class="text-base text-md font-semibold italic">February 2021 - Present: Senior AV Pro. | University of Colorado Colorado Springs</h3>
                <ul class="list-disc ml-8 mb-4">
                    <li>Project lead for campus-wide AV projects (AEC, Conference Rooms, UHAL/KFL/ENGR)</li>
                    <li>Responsible for fixing AV programming bugs and deploying updates</li>
                    <li>Supervised Student Help Desk - Interim: Oversaw day-to-day help desk operations</li>
                    <li>Imaging and deployment of Teams Room Devices</li>
                    <li>Support creation of exception accounts and group licensing for Teams Rooms</li>
                    <li>Access control for cloud-based AV management servers for AV staff and students</li>
                    <li>DHCP Reservation/DNS Record creation for more efficient deployment of AV devices</li>
                    <li>Monitored and responded to AV ticket requests to restore classroom functionality</li>
                    <li>Setup virtual server for testing of C# AV programming for network control and monitoring</li>
                    <li>Enhanced my capacity to communicate technical information to internal and external clients</li>
                </ul>
                <h3 class="text-base text-md font-semibold italic">June 2022 - June 2025: (Contracted) Programmer I | Colorado Springs School District 11</h3>
                <ul class="list-disc ml-8 mb-4">
                    <li>Created proof of concept check-in web application for District 11 staff members</li>
                    <li>Utilized MongoDB for data record storage and data pulls from data collections</li>
                    <li>SSH keys for secure access to Mongo cluster and GitHub respostitories</li>
                    <li>Ensured stakeholder's needs were represented in the minimum viable product</li>
                    <li>MapBox API to visualize data on map overlay gathered from check-ins</li>
                    <li>mongoexport CLI command to generate and export a .csv file of entries from database</li>
                    <li>support and maintain  production application</li>
                </ul>
            </div>
        </div>
        <div class="container flex flex-col m-4 p-4 w-fit h-fit">
            <div class="container flex flex-col w-fit">
                <h2 class="text-base md:text-3xl font-bold">Projects</h2>
                <a target="_blank" rel="noopener noreferrer" class="text-base md:text-xl font-semibold underline hover:no-underline text-emerald-600" href="https://github.com/devdel2/firstwebsite">Resume Redux</a>
                <h3 class="text-base text-md italic">Web App. | Laravel, Vue</h3>
                <ul class="list-disc ml-8 mb-4">
                    <li>Utilizes Laravel PHP, MySql, Docker, Sail, Eloquent for the backend</li>
                    <li>Vue, Vue-router, and TailwindCSS for front end components</li>
                    <li>Spotify and Google Maps API to show artist data and display completed tours</li>
                    <li>Displays full stack MVC concept application</li>
                </ul>
                <a target="_blank" rel="noopener noreferrer" class="text-base md:text-xl font-semibold underline hover:no-underline text-emerald-600" href="https://main.d3uipkoxlmeg5l.amplifyapp.com/">Apex Legends Team Generator</a>
                <h3 class="text-base text-md italic">Web App. | React, AWS</h3>
                <ul class="list-disc ml-8 mb-4">
                    <li>Built understanding of React Properties and JSX</li>
                    <li>Setup personal domain for this project with Google Domains</li>
                    <li>Utilized Route 53 DNS to use my personal domain</li>
                    <li>Implemented AWS Amplify for Continuous Integration/Continuous Deployment</li>
                </ul>
                <a target="_blank" rel="noopener noreferrer" class="text-base md:text-xl font-semibold underline hover:no-underline text-emerald-600" href="https://devdel2.github.io/ColoradoSpringsLive-Static/">Colorado Springs Live Mock Website</a>
                <h3 class="text-base text-md italic">Static Website | HTML, CSS, JavaScript</h3>
                <ul class="list-disc ml-8 mb-4">
                    <li>Static website created with vanilla HTML, CSS, and JavaScript</li>
                    <li>Created a mock design for a local music blog</li>
                    <li>Designed responsive UI with flexbox and media queries</li>
                </ul>
                <a target="_blank" rel="noopener noreferrer" class="text-base md:text-xl font-semibold underline hover:no-underline text-emerald-600" href="https://github.com/devdel2/DeLeonWordGame">Python Hangman Console App</a>
                <h3 class="text-base text-md italic">Console Application | Python, Excel</h3>
                <ul class="list-disc ml-8 mb-4">
                    <li>Completed a hangman-style word guessing game in the console</li>
                    <li>Utilizes openpyxl, bs4, and requests to store words from a website in an excel file</li>
                    <li>Dynamically selects game words using Python's random module</li>
                </ul>
            </div>
        </div>
    </div>
</template>
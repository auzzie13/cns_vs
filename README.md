Data Importer for CNS Vital Signs and PCL5
This program is designed to process three different types of data exports — CNS Vital Signs (CNSVS) and PCL5. It enables users to select the correct export, upload the file, and push the data to the REDCap database via the REDCap API.

📝 Overview
This application allows users to upload CNSVS and PCL5 data exports, select the corresponding export type (CNSVS Cog/DASS or PCL5), and choose the REDCap event to which the data should be pushed. Once the file is selected and the event is chosen, the user can click "Submit" to push the data into the REDCap database.

🚀 Features
Supports Three Data Exports:

CNSVS (Cognition and DASS scales)

PCL5 (Post-Traumatic Stress Disorder Scale)

File Upload: Users can drag and drop files for each type of export.

REDCap Integration: Push data to a specified REDCap event using REDCap's API.

Radio Button Interface: Users can select which export they are uploading via a radio button (CNSVS or PCL5).

Error Handling: Basic error handling for file format mismatches and failed API submissions.

Simple User Interface: Clear interface for selecting the file, export type, and REDCap event.

🔧 How It Works
1. File Selection:
The user uploads one of the following data files:

CNSVS: Contains the Cognitive and DASS export data.

PCL5: Contains the PTSD scale data.

2. API Integration:
When the user clicks Submit, the program reads the data from the selected file, processes it, and pushes it to REDCap using the REDCap API.

The program dynamically selects the appropriate REDCap event to push the data to.

3. REDCap Event:
The user can choose between different events in the REDCap database, ensuring data is sent to the right location.

4. Error Handling:
The program will show errors if:

The file format is incorrect.

The API request fails.

Any other data mismatches occur.

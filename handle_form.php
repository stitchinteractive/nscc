<?php
$host = 'https://kerisdev.service-now.com/api/fstf3/tfsnow_nscc/getservicerequest';
$user_name = 'webuser@tfs.com';
$password = 'Login@12345678';
$error = 0;

//Personal Information
$salutation = $_POST["salutation"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$nationality = $_POST["nationality"];
$userid = $_POST["userid"];
//Organisation Information
$organisation = $_POST["organisation"];
$department = $_POST["department"];
$designation = $_POST["designation"];
$contact_number = $_POST["contact_number"];
$email_address = $_POST["email_address"];
//Project Information
$projec_id = $_POST["projec_id"];
$exampleRadios = $_POST["exampleRadios"];
//Research Collaboration
//Government Agencies
$governmentagencies = $_POST["governmentagencies"];
//Other Research
$otherresearchcollaborators = $_POST["otherresearchcollaborators"];
//Research Domains
$researchdomain1 = isset($_POST["researchdomain1"]) ? "true" : "false";
$researchdomain2 = isset($_POST["researchdomain2"]) ? "true" : "false";
$researchdomain3 = isset($_POST["researchdomain3"]) ? "true" : "false";
$researchdomain4 = isset($_POST["researchdomain4"]) ? "true" : "false";
$researchdomain5 = isset($_POST["researchdomain5"]) ? "true" : "false";
$otherdomains = $_POST["otherdomains"];
//Project Details   
$nationalprogrammeradio = isset($_POST["nationalprogrammeradio"]) ? $_POST["nationalprogrammeradio"] : "";
$nationalprogramme = $_POST["nationalprogramme"];
$projecttitle = $_POST["projecttitle"];
$projectdescription = $_POST["projectdescription"];
$projectduration = $_POST["projectduration"];
//Utilisation Projection
$cpucorehours = $_POST["cpucorehours"];
$gpucardhours = $_POST["gpucardhours"];
$storage = $_POST["storage"];
//Collaboration
$sponsorfirstname = $_POST["sponsorfirstname"];
$sponsorlastname = $_POST["sponsorlastname"];
$sponsornationality = $_POST["sponsornationality"];
$sponsororganisation = $_POST["sponsororganisation"];
$sponsordepartment = $_POST["sponsordepartment"];
$sponsordesignation = $_POST["sponsordesignation"];
$sponsorcontact_number = $_POST["sponsorcontact_number"];
$sponsoremail_address = $_POST["sponsoremail_address"];
//File
//var_dump($_FILES);
if($_FILES["service_catalog"]["error"] != 4) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["service_catalog"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //echo $_FILES["service_catalog"]["name"];

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $error = 1; 
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["service_catalog"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $error = 2;
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["service_catalog"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["service_catalog"]["name"])). " has been uploaded.";
            $error = 0;
        } else {
            echo "Sorry, there was an error uploading your file.";
            $error = 3;
        }
    }
    $service_catalog = htmlspecialchars( basename( $_FILES["service_catalog"]["name"]));
}

//echo $error;

switch($exampleRadios) {
    case "1":
        $data = json_encode(array(
            "sysparm_id"  => "b57abe891b9031d0df41a79ce54bcb27",
            "sysparm_quantity" => "1",
            "variable" => array(
                "salutation" => $salutation,
                "first_name" => $firstname,
                "last_name" => $lastname,
                "nationality" => $nationality,
                "preferred_nscc_user_id" => $userid,
                "name_of_the_organization" => $organisation,
                "department" => $department,
                "designation" => $designation,
                "official_contact_number" => $contact_number,
                "official_email_address" => $email_address,
                "project_id_if_applicable" => $projec_id,
                "research_collaboration" => "Stakeholder_collaborators",
                "first_nameStakeholder" => $sponsorfirstname,
                "last_nameStakeholder" => $sponsorlastname,
                "nationalityofStakehoders" => $sponsornationality,
                "departmentStakehoderInfo" => $sponsordepartment,
                "designationStakeholderInfo" => $sponsordesignation,
                "name_of_organisation" => $sponsororganisation,
                "official_contact_numberStakeholder" => $sponsorcontact_number,
                "official_email_addressStakeholder" => $sponsoremail_address,
                "service_catalog" => $service_catalog
            )
        ));
        break;
    case "2":
        $rawData = array(
            "sysparm_id"  => "b57abe891b9031d0df41a79ce54bcb27",
            "sysparm_quantity" => "1",
            "variable" => array(
                "salutation" => $salutation,
                "first_name" => $firstname,
                "last_name" => $lastname,
                "nationality" => $nationality,
                "preferred_nscc_user_id" => $userid,
                "name_of_the_organization" => $organisation,
                "department" => $department,
                "designation" => $designation,
                "official_contact_number" => $contact_number,
                "official_email_address" => $email_address,
                "project_id_if_applicable" => $projec_id,
                "research_collaboration" => "Government_Agencies",
                "specify_the_government_agencies" => $governmentagencies,
                "manufacturing_trade_and_connectivity" => $researchdomain1,
                "human_health_and_potential" => $researchdomain2,
                "urban_solutions_and_sustainability" => $researchdomain3,
                "smart_nation_and_digital_economy" => $researchdomain4,
                "other_please_provide_deatils_below" => $researchdomain5 == "true" ? $otherdomains : "false",
                "is_your_research" => $nationalprogrammeradio,
                "project_title" => $projecttitle,
                "project_description" => $projectdescription,
                "project_duration" => $projectduration,
                "estimated_cpu_core_hours_required" => $cpucorehours,
                "estimated_gpu_card_hours_required" => $gpucardhours,
                "estimated_storage_gb_required" => $storage
            )
        );
        if($nationalprogrammeradio == "yes") {
            $rawData["variable"]["indicate_the_name_of_the_national_programme_and_implementation_agency_ia"] = $nationalprogramme;
        }
        $data = json_encode($rawData);
        break;
    case "3":
        $rawData = array(
            "sysparm_id"  => "b57abe891b9031d0df41a79ce54bcb27",
            "sysparm_quantity" => "1",
            "variable" => array(
                "salutation" => $salutation,
                "first_name" => $firstname,
                "last_name" => $lastname,
                "nationality" => $nationality,
                "preferred_nscc_user_id" => $userid,
                "name_of_the_organization" => $organisation,
                "department" => $department,
                "designation" => $designation,
                "official_contact_number" => $contact_number,
                "official_email_address" => $email_address,
                "project_id_if_applicable" => $projec_id,
                "research_collaboration" => "Other_research_collaborators",
                "specify_the_other_reasearch_collabarators" => $otherresearchcollaborators,
                "manufacturing_trade_and_connectivity" => $researchdomain1,
                "human_health_and_potential" => $researchdomain2,
                "urban_solutions_and_sustainability" => $researchdomain3,
                "smart_nation_and_digital_economy" => $researchdomain4,
                "other_please_provide_deatils_below" => $researchdomain5 == "true" ? $otherdomains : "false",
                "is_your_research" => $nationalprogrammeradio,
                "project_title" => $projecttitle,
                "project_description" => $projectdescription,
                "project_duration" => $projectduration,
                "estimated_cpu_core_hours_required" => $cpucorehours,
                "estimated_gpu_card_hours_required" => $gpucardhours,
                "estimated_storage_gb_required" => $storage
            )
        );
        if($nationalprogrammeradio == "yes") {
            $rawData["variable"]["indicate_the_name_of_the_national_programme_and_implementation_agency_ia"] = $nationalprogramme;
        }
        $data = json_encode($rawData);
        break;
    case "4":
        $rawData = array(
            "sysparm_id"  => "b57abe891b9031d0df41a79ce54bcb27",
            "sysparm_quantity" => "1",
            "variable" => array(
                "salutation" => $salutation,
                "first_name" => $firstname,
                "last_name" => $lastname,
                "nationality" => $nationality,
                "preferred_nscc_user_id" => $userid,
                "name_of_the_organization" => $organisation,
                "department" => $department,
                "designation" => $designation,
                "official_contact_number" => $contact_number,
                "official_email_address" => $email_address,
                "project_id_if_applicable" => $projec_id,
                "research_collaboration" => "project_info",
                "manufacturing_trade_and_connectivity" => $researchdomain1,
                "human_health_and_potential" => $researchdomain2,
                "urban_solutions_and_sustainability" => $researchdomain3,
                "smart_nation_and_digital_economy" => $researchdomain4,
                "other_please_provide_deatils_below" => $researchdomain5 == "true" ? $otherdomains : "false",
                "is_your_research" => $nationalprogrammeradio,
                "project_title" => $projecttitle,
                "project_description" => $projectdescription,
                "project_duration" => $projectduration,
                "estimated_cpu_core_hours_required" => $cpucorehours,
                "estimated_gpu_card_hours_required" => $gpucardhours,
                "estimated_storage_gb_required" => $storage
            )
        );
        if($nationalprogrammeradio == "yes") {
            $rawData["variable"]["indicate_the_name_of_the_national_programme_and_implementation_agency_ia"] = $nationalprogramme;
        }
        $data = json_encode($rawData);
        break;
    default:
        $data = json_encode(array(
            "sysparm_id"  => "b57abe891b9031d0df41a79ce54bcb27",
            "sysparm_quantity" => "1",
            "variable" => array(
                "salutation" => "mr",
                "first_name" => "test",
                "last_name" => "test",
                "nationality" => "test",
                "preferred_nscc_user_id" => "test",
                "name_of_the_organization" => "test",
                "department" => "test",
                "designation" => "test",
                "official_contact_number" => "test",
                "official_email_address" => "test",
                "project_id_if_applicable" => "test",
                "research_collaboration" => "test",
                "first_nameStakeholder" => "test",
                "last_nameStakeholder" => "test",
                "nationalityofStakehoders" => "test",
                "departmentStakehoderInfo" => "test",
                "designationStakeholderInfo" => "test",
                "name_of_organisation" => "test",
                "official_contact_numberStakeholder" => "test",
                "official_email_addressStakeholder" => "test"
            )
        ));
        break;
}

var_dump($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$host);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$user_name:$password");
$result = curl_exec($ch);
curl_close($ch);
$decodedResponse=json_decode($result, true);

//var_dump($decodedResponse["result"]["status"]);
//echo $decodedResponse["result"]["status"];
header("Location: index.php?status=".$error);
exit();
?>
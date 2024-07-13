<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); // To sanitize the post data

$email_host = "mail.stitchinteractive.sg";
$email_port = 587;
$email_username = 'admin@stitchinteractive.sg';
$email_password = 'Obvious123!';
$sender_email = 'admin@stitchinteractive.sg';
$sender_name = 'Administrator';
$admin_email = 'projects-admin@nscc.sg';
$admin_name = 'Project Admin';
$admin_email2 = 'bizdev@nscc.sg';
$admin_name2 = 'Business Development Admin';
$email_subject = 'NSCC Form Submission';

//$host = 'https://keristest.service-now.com/api/fstf3/tfsnow_nscc/getservicerequest'; //UAT
//$host = 'https://keris.service-now.com/api/fstf3/tfsnow_nscc/getservicerequest'; //PROD
$host = 'https://kerisdev.service-now.com/api/fstf3/tfsnow_nscc/getservicerequest'; //DEV

$user_name = 'webuser@tfs.com';
$password = 'Login@12345678';
$template_filename = "template1.html";
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
$type = isset($_POST["typeradio"]) ? $_POST["typeradio"] : "";
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
$attachment_name = "";
$attachment_type = "";
$service_catalog = "";

//var_dump($_FILES);
if($_FILES["service_catalog"]["error"] != 4) {
    // $target_dir = "uploads/";
    // $target_file = $target_dir . basename($_FILES["service_catalog"]["name"]);
    // $uploadOk = 1;
    // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // //echo $_FILES["service_catalog"]["name"];

    // // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     //$error = 1;
    //     $error = 0; 
    //     $uploadOk = 0;
    // }

    // // Check file size
    // if ($_FILES["service_catalog"]["size"] > 500000) {
    //     echo "Sorry, your file is too large.";
    //     $error = 2;
    //     $uploadOk = 0;
    // }

    // // Check if $uploadOk is set to 0 by an error
    // if ($uploadOk == 0) {
    //     echo "Sorry, your file was not uploaded.";
    //     // if everything is ok, try to upload file
    // } else {
    //     if (move_uploaded_file($_FILES["service_catalog"]["tmp_name"], $target_file)) {
    //         echo "The file ". htmlspecialchars( basename( $_FILES["service_catalog"]["name"])). " has been uploaded.";
    //         $error = 0;
    //     } else {
    //         echo "Sorry, there was an error uploading your file.";
    //         $error = 3;
    //     }
    // }
    // $service_catalog = htmlspecialchars( basename( $_FILES["service_catalog"]["name"]));

    $attachment_name = basename($_FILES["service_catalog"]["name"]);
    $filename = $_FILES["service_catalog"]["name"];
    $explodename = explode(".", $filename);
    $attachment_type = end($explodename);
    $photoTmpPath = $_FILES['service_catalog']['tmp_name'];
    $data = file_get_contents($photoTmpPath);
    $base64 = base64_encode($data);
    $service_catalog = $base64;
}

// var_dump($service_catalog);

switch($exampleRadios) {
    case "1":
        $data = json_encode(array(
            "sysparm_id"  => "b57abe891b9031d0df41a79ce54bcb27",
            "sysparm_quantity" => "1",
            "variables" => array(
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
                'Stakeholder_collaborators'=> 'true',
                "research_collaboration" => "Stakeholder_collaborators",
                "first_nameStakeholder" => $sponsorfirstname,
                "last_nameStakeholder" => $sponsorlastname,
                "nationalityofStakehoders" => $sponsornationality,
                "departmentStakehoderInfo" => $sponsordepartment,
                "designationStakeholderInfo" => $sponsordesignation,
                "name_of_organisation" => $sponsororganisation,
                "official_contact_numberStakeholder" => $sponsorcontact_number,
                "official_email_addressStakeholder" => $sponsoremail_address
            ),
            "filename" => $attachment_name,
            "filetype" => $attachment_type,
            "file" => $service_catalog
        ));
        $template_filename = "template1.html";
        break;
    case "2":
        $rawData = array(
            "sysparm_id"  => "b57abe891b9031d0df41a79ce54bcb27",
            "sysparm_quantity" => "1",
            "variables" => array(
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
                "Govt_Agen" => 'true',
                "research_collaboration" => "Government_Agencies",
                "specify_the_government_agencies" => $governmentagencies,
                "manufacturing_trade_and_connectivity" => $researchdomain1,
                "human_health_and_potential" => $researchdomain2,
                "urban_solutions_and_sustainability" => $researchdomain3,
                "smart_nation_and_digital_economy" => $researchdomain4,
                "other_please_provide_deatils_below" => $researchdomain5,
                "is_your_research" => $nationalprogrammeradio,
                "project_title" => $projecttitle,
                "project_description" => $projectdescription,
                "project_duration" => $projectduration,
                "estimated_cpu_core_hours_required" => $cpucorehours,
                "estimated_gpu_card_hours_required" => $gpucardhours,
                "estimated_storage_gb_required" => $storage,
                "please_select_your_hpc_system" => $type
            )
        );
        if($researchdomain5 == "true") {
            $rawData["variables"]["please_specify_the_other_domains"] = $otherdomains;
        }
        if($nationalprogrammeradio == "Yes") {
            $rawData["variables"]["indicate_the_name_of_the_national_programme_and_implementation_agency_ia"] = $nationalprogramme;
        }
        $data = json_encode($rawData, JSON_UNESCAPED_SLASHES);
        $template_filename = "template2.html";
        break;
    case "3":
        $rawData = array(
            "sysparm_id"  => "b57abe891b9031d0df41a79ce54bcb27",
            "sysparm_quantity" => "1",
            "variables" => array(
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
                "Oth_research_coll"=> 'true',
                "research_collaboration" => "Other_research_collaborators",
                "specify_the_other_reasearch_collabarators" => $otherresearchcollaborators,
                "manufacturing_trade_and_connectivity" => $researchdomain1,
                "human_health_and_potential" => $researchdomain2,
                "urban_solutions_and_sustainability" => $researchdomain3,
                "smart_nation_and_digital_economy" => $researchdomain4,
                "other_please_provide_deatils_below" => $researchdomain5,
                "is_your_research" => $nationalprogrammeradio,
                "project_title" => $projecttitle,
                "project_description" => $projectdescription,
                "project_duration" => $projectduration,
                "estimated_cpu_core_hours_required" => $cpucorehours,
                "estimated_gpu_card_hours_required" => $gpucardhours,
                "estimated_storage_gb_required" => $storage
            )
        );
        if($researchdomain5 == "true") {
            $rawData["variables"]["please_specify_the_other_domains"] = $otherdomains;
        }
        if($nationalprogrammeradio == "Yes") {
            $rawData["variables"]["indicate_the_name_of_the_national_programme_and_implementation_agency_ia"] = $nationalprogramme;
        }
        $data = json_encode($rawData, JSON_UNESCAPED_SLASHES);
        $template_filename = "template3.html";
        break;
    case "4":
        $rawData = array(
            "sysparm_id"  => "b57abe891b9031d0df41a79ce54bcb27",
            "sysparm_quantity" => "1",
            "variables" => array(
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
                "project_info"=> 'true',
                "research_collaboration" => "project_info",
                "manufacturing_trade_and_connectivity" => $researchdomain1,
                "human_health_and_potential" => $researchdomain2,
                "urban_solutions_and_sustainability" => $researchdomain3,
                "smart_nation_and_digital_economy" => $researchdomain4,
                "other_please_provide_deatils_below" => $researchdomain5,
                "is_your_research" => $nationalprogrammeradio,
                "project_title" => $projecttitle,
                "project_description" => $projectdescription,
                "project_duration" => $projectduration,
                "estimated_cpu_core_hours_required" => $cpucorehours,
                "estimated_gpu_card_hours_required" => $gpucardhours,
                "estimated_storage_gb_required" => $storage
            )
        );
        if($researchdomain5 == "true") {
            $rawData["variables"]["please_specify_the_other_domains"] = $otherdomains;
        }
        if($nationalprogrammeradio == "Yes") {
            $rawData["variables"]["indicate_the_name_of_the_national_programme_and_implementation_agency_ia"] = $nationalprogramme;
        }
        $data = json_encode($rawData, JSON_UNESCAPED_SLASHES);
        $template_filename = "template4.html";
        break;
    default:
        $data = json_encode(array(
            "sysparm_id"  => "b57abe891b9031d0df41a79ce54bcb27",
            "sysparm_quantity" => "1",
            "variables" => array(
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
        $template_filename = "template1.html";
        break;
}
//$data=str_replace('"', "'",$data);
$data=htmlspecialchars($data);

//var_dump($data);

$privatekey = '6LdLxAgpAAAAANlWgQE0KcVe6sOYY5cOmCv6uWjs';
var_dump($_POST['g-recaptcha-response']);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'secret' => $privatekey,
    'response' => $_POST['g-recaptcha-response'],
    'remoteip' => $_SERVER['REMOTE_ADDR']
]);

$resp = json_decode(curl_exec($ch));
curl_close($ch);

//var_dump($resp);
if ($resp->success) {
    // Success
    $error = 0;
} else {
    // failure
    echo "captcha fail";
    $error = 1;
}

if($error == 0) {
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
    //var_dump($decodedResponse);
    //echo $decodedResponse["result"]["status"];

    if($decodedResponse["result"]["status"] == "success") {
        $decodedText = html_entity_decode($data);
        $email_data=json_decode($decodedText, true);
        if($researchdomain5 == "false") {
            $email_data["variables"]["please_specify_the_other_domains"] = "";
        }
        if($nationalprogrammeradio == "No") {
            $email_data["variables"]["indicate_the_name_of_the_national_programme_and_implementation_agency_ia"] = "";
        }
        $template = file_get_contents($template_filename);
        //var_dump($email_data);

        foreach($email_data["variables"] as $key => $value)
        {
            $template = str_replace('{{ '.$key.' }}', $value, $template);
        }
        //var_dump($template);

        $mail = new PHPMailer;
        $mail->isSMTP(); 
        $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = $email_host; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = $email_port; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is depracated
        $mail->SMTPAuth = true;
        $mail->Username = $email_username;
        $mail->Password = $email_password;
        $mail->setFrom($sender_email, $sender_name);
        $mail->addAddress($admin_email, $admin_name);
        $mail->addAddress($admin_email2, $admin_name2);
        $mail->addAddress($email_address, $firstname);
        $mail->Subject = $email_subject;
        $mail->msgHTML($template); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
        $mail->AltBody = 'HTML messaging not supported';
        if($_FILES["service_catalog"]["error"] != 4) {
            $mail->addAttachment($photoTmpPath, $filename); //Attach an image file

        }

        if(!$mail->send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            echo "Message sent!";
        }
    } else {
        $error = 2;
    }
}

header("Location: index.php?status=".$error);
exit();
?>
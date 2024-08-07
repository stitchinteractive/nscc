<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Account Creation Form</title>
		<!-- favicon -->
		<link rel="icon" type="image/x-icon" href="im/favicon.ico" />
		<!-- fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />
		<!-- core theme ccs (includes bootstrap) -->
		<link href="css/styles.css" rel="stylesheet" />
		<link href="css/custom.css" rel="stylesheet" />
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</head>

	<body>
		<div class="new-container container-flex">
			<navbar>
				<a class="navbar-brand" href="#"><img src="im/logo.png" alt="nscc logo" /></a>
			</navbar>
			<div class="new-row row-flex">
				<div class="start-content" id="start-content">
					<h3>NSCC Account Creation Form</h3>
					<p>
						Please complete the form to request for a user account. Kindly note that it will take 7 working days to process the creation of user account.<br /><br />
						<b>Important:</b> If you are from <b>A*STAR, NTU, NUS, SUTD, TCOMS, SMU, SIT, SP, TP or RP</b>, you may skip this form and proceed to <a href="https://user.nscc.sg/saml/">New User Enrolment</a>.
					</p>
					<div style="background-color: black; height: 1px"></div>
					<div class="hide-lg" style="display: flex; flex-direction: row; justify-content: flex-end">
						<button id="continue0" type="button" class="btn btn-primary">
							<h4>Get started</h4>
						</button>
					</div>
					<div style="display: flex; flex-direction: column; align-items: flex-start; margin-top: auto">
						<a href="https://www.nscc.sg/">NSCC’s Official Site</a>
						<a href="https://help.nscc.sg/">NSCC’s Help Site</a>
					</div>
				</div>

				<form class="form-content" id="nscc_form" action="handle_form.php" method="POST" enctype="multipart/form-data">
					<div class="progress-bar vert-flex hide-md" id="progress-bar">
						<span id="dot-1" class="dot">
							<h3 class="prevent-select">1</h3>
						</span>
						<div id="progress-line-1" class="progress-line">
							<div id="progress-line-one" style="display: block; width: 0%; background-color: #e2231a"></div>
						</div>
						<span id="dot-2" class="dot">
							<h3 class="prevent-select">2</h3>
						</span>
						<div id="progress-line-2" class="progress-line">
							<div id="progress-line-two" style="display: block; width: 0%; background-color: #e2231a"></div>
						</div>
						<span id="dot-3" class="dot">
							<h3 class="prevent-select">3</h3>
						</span>
						<div id="progress-line-3" class="progress-line">
							<div id="progress-line-three" style="display: block; width: 0%; background-color: #e2231a"></div>
						</div>
						<span id="dot-4" class="dot">
							<h3 class="prevent-select">4</h3>
						</span>
					</div>

					<div class="step-1 step-content" id="step-1">
						<h3>Personal Information</h3>

						<div class="form-group">
							<div class="floating-label">
								<div class="form-field">
									<div>
										<label class="required" for="salutation">Salutation</label>
									</div>
									<select name="salutation" id="salutation" data-validation="">
										<option value="Default">Select an option</option>
										<option value="Mr">Mr</option>
										<option value="Mrs">Mrs</option>
										<option value="Ms">Ms</option>
										<option value="Dr">Dr</option>
										<option value="Prof">Prof</option>
										<option value="Asst Prof">Asst Prof</option>
										<option value="Assoc Prof">Assoc Prof</option>
									</select>
								</div>
								<span id="salutation-error" class="error-message"></span>
							</div>

							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('firstname')">
									<div>
										<label class="required" for="firstname">First name</label>
									</div>
									<div>
										<input type="text" id="firstname" name="firstname" placeholder="First name" data-validation="required flow-g step-1" data-error-message="" onblur="removeFocusClass('firstname'); validateFormField('firstname')" onfocus="addFocusClass('firstname')" />
									</div>
								</div>
								<span id="firstname-error" class="error-message"></span>
							</div>

							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('lastname')">
									<div>
										<label class="required" for="lastname">Last name</label>
									</div>
									<div>
										<input type="text" id="lastname" name="lastname" placeholder="Last name" data-validation="required flow-g step-1" data-error-message="" onblur="removeFocusClass('lastname'); validateFormField('lastname')" onfocus="addFocusClass('lastname')" />
									</div>
								</div>
								<span id="lastname-error" class="error-message"></span>
							</div>
						</div>

						<div class="form-group">
							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('nationality')">
									<div>
										<label class="required" for="nationality">Nationality</label>
									</div>
									<div>
										<input type="text" id="nationality" name="nationality" placeholder="Singaporean" data-validation="required flow-g step-1" data-error-message="" onblur="removeFocusClass('nationality'); validateFormField('nationality')" onfocus="addFocusClass('nationality')" />
									</div>
								</div>
								<span id="nationality-error" class="error-message"></span>
							</div>

							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('userid')">
									<div>
										<label class="required" for="userid">Preferred NSCC User ID</label>
									</div>
									<div>
										<input type="text" id="userid" name="userid" placeholder="XXXXXXXX" data-validation="required flow-g userid step-1" data-error-message="" onblur="removeFocusClass('userid'); validateFormField('userid')" onfocus="addFocusClass('userid')" />
									</div>
								</div>
								<span id="userid-error" class="error-message"></span>
							</div>
						</div>
						<span class="help-message">Note: User ID is limited to 8 characters and subjected to availability and approval. A new User ID will be assigned if the requested User ID is not available. </span>

						<div class="hide-md" style="display: flex; flex-direction: row; justify-content: flex-end">
							<button id="continue1" type="button" class="btn btn-primary">
								<h4>Continue</h4>
							</button>
						</div>
						<line class="hide-md"></line>
					</div>
					<div class="step-2 step-content" id="step-2">
						<h3>Organisation Information</h3>
						<div class="form-group">
							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('organisation')">
									<div>
										<label class="required" for="organisation">Name of Organisation</label>
									</div>
									<div>
										<input type="text" id="organisation" name="organisation" placeholder="Name of organisation" data-validation="required flow-g step-2" data-error-message="" onblur="removeFocusClass('organisation'); validateFormField('organisation')" onfocus="addFocusClass('organisation')" />
									</div>
								</div>
								<span id="organisation-error" class="error-message"></span>
							</div>
						</div>

						<div class="form-group">
							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('department')">
									<div>
										<label class="required" for="department">Department</label>
									</div>
									<div>
										<input type="text" id="department" name="department" placeholder="Department" data-validation="required flow-g step-2" data-error-message="" onblur="removeFocusClass('department'); validateFormField('department')" onfocus="addFocusClass('department')" />
									</div>
								</div>
								<span id="department-error" class="error-message"></span>
							</div>

							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('designation')">
									<div>
										<label class="required" for="designation">Designation</label>
									</div>
									<div>
										<input type="text" id="designation" name="designation" placeholder="Designation" data-validation="required flow-g step-2" data-error-message="" onblur="removeFocusClass('designation'); validateFormField('designation')" onfocus="addFocusClass('designation')" />
									</div>
								</div>
								<span id="designation-error" class="error-message"></span>
							</div>
						</div>

						<div class="form-group">
							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('contact_number')">
									<div>
										<label class="required" for="contact_number">Official contact number</label>
									</div>
									<div>
										<input type="text" id="contact_number" name="contact_number" placeholder="+65 XXXX XXXX" data-validation="required flow-g step-2 number" data-error-message="" onblur="removeFocusClass('contact_number'); validateFormField('contact_number')" onfocus="addFocusClass('contact_number')" />
									</div>
								</div>
								<span id="contact_number-error" class="error-message"></span>
							</div>

							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('email_address')">
									<div>
										<label class="required" for="email_address">Official email address</label>
									</div>
									<div>
										<input type="email" id="email_address" name="email_address" placeholder="example@nscc.sg" data-validation="required flow-g step-2 email" data-error-message="" onblur="removeFocusClass('email_address'); validateFormField('email_address')" onfocus="addFocusClass('email_address')" />
									</div>
								</div>
								<span id="email_address-error" class="error-message"></span>
							</div>
						</div>

						<div class="hide-md" style="display: flex; flex-direction: row; justify-content: space-between">
							<button id="back1" type="button" class="btn btn-back">
								<img src="im/back.svg" alt="Back Arrow" />
								<h4>Back</h4>
							</button>
							<button id="continue2" type="button" class="btn btn-primary">
								<h4>Continue</h4>
							</button>
						</div>
						<line class="hide-md"></line>
					</div>

					<div class="step-3 step-content" id="step-3">
						<h3>Project Information</h3>
						<div class="form-group">
							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('projec_id')">
									<div>
										<label for="projec_id">Project ID (if applicable)</label>
									</div>
									<div>
										<input type="text" id="projec_id" name="projec_id" placeholder="92001234" data-validation="" data-error-message="" onblur="removeFocusClass('projec_id'); validateFormField('projec_id')" onfocus="addFocusClass('projec_id')" />
									</div>
								</div>
								<span id="projec_id-error" class="error-message"></span>
							</div>
						</div>

						<div class="form-control para-group">
							<div class="checkbox-group">
								<h3 style="text-transform: none">Research Collaboration</h3>
								<p class="required">Please indicate if your project involves other collaborators</p>
							</div>
							<div class="checkbox-group">
								<div class="form-check">
									<input class="form-check-input" onclick="handleRadioChange('A')" type="radio" name="exampleRadios" id="researchcollaboration1" value="1" />
									<label class="form-check-label" onclick="handleRadioChange('A')" for="researchcollaboration1"> Stakeholder collaborators i.e. A*STAR, NTU, NUS, SUTD </label>
								</div>
								<div class="form-check">
									<input class="form-check-input" onclick="handleRadioChange('B')" type="radio" name="exampleRadios" id="researchcollaboration2" value="2" />
									<label class="form-check-label" onclick="handleRadioChange('B')" for="researchcollaboration2"> Government agencies </label>
								</div>
								<div class="form-check">
									<input class="form-check-input" onclick="handleRadioChange('C')" type="radio" name="exampleRadios" id="researchcollaboration3" value="3" />
									<label class="form-check-label" onclick="handleRadioChange('C')" for="researchcollaboration3"> Other research collaborators such as IHLs or corporations </label>
								</div>
								<div class="form-check">
									<input class="form-check-input" onclick="handleRadioChange('D')" type="radio" name="exampleRadios" id="researchcollaboration4" value="4" />
									<label class="form-check-label" onclick="handleRadioChange('D')" for="researchcollaboration4"> The project does not involve other collaborators </label>
								</div>
							</div>
							<div class="floating-label option-b">
								<div class="form-field border-normal" onclick="selectInputField('governmentagencies')">
									<div>
										<label class="required" for="governmentagencies">Specify the government agencies</label>
									</div>
									<div>
										<input type="text" id="governmentagencies" name="governmentagencies" placeholder="Name of government agency(s)" data-validation="required flow-c step-3" data-error-message="This field is required for the selection of &ldquo;Government agencies&rdquo;" onblur="removeFocusClass('governmentagencies'); validateFormField('governmentagencies')" onfocus="addFocusClass('governmentagencies')" />
									</div>
								</div>
								<span id="governmentagencies-error" class="error-message"></span>
							</div>
							<div class="floating-label option-c">
								<div class="form-field border-normal" onclick="selectInputField('otherresearchcollaborators')">
									<div>
										<label class="required" for="otherresearchcollaborators">Specify the other research collaborators</label>
									</div>
									<div>
										<input type="text" id="otherresearchcollaborators" name="otherresearchcollaborators" placeholder="IHLs or corporations" data-validation="required flow-d step-3" data-error-message="Please specify the other research collaborators" onblur="removeFocusClass('otherresearchcollaborators'); validateFormField('otherresearchcollaborators')" onfocus="addFocusClass('otherresearchcollaborators')" />
									</div>
								</div>
								<span id="otherresearchcollaborators-error" class="error-message"></span>
							</div>
						</div>

						<div class="flow-a form-control para-group hide-start">
							<div class="checkbox-group">
								<h3 style="text-transform: none">Research Domains</h3>
								<p class="required">Please indicate the domains that your project is related to</p>
							</div>
							<div class="checkbox-group checkbox-researchdomain">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="1" name="researchdomain1" id="researchdomain1" />
									<label class="form-check-label" for="researchdomain1"> Manufacturing, Trade and Connectivity </label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="1" name="researchdomain2" id="researchdomain2" />
									<label class="form-check-label" for="researchdomain2"> Human Health and Potential </label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="1" name="researchdomain3" id="researchdomain3" />
									<label class="form-check-label" for="researchdomain3"> Urban Solutions and Sustainability </label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="1" name="researchdomain4" id="researchdomain4" />
									<label class="form-check-label" for="researchdomain4"> Smart Nation and Digital Economy </label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="1" name="researchdomain5" id="researchdomain5" />
									<label class="form-check-label" for="researchdomain5"> Others, please provide details below </label>
								</div>
								<span id="researchdomaincheckbox-error" class="error-message"></span>
							</div>
							<div class="floating-label" style="display: none">
								<div class="form-field border-normal" onclick="selectInputField('otherdomains')">
									<div>
										<label class="required" for="otherdomains">Please specify the other domains</label>
									</div>
									<div>
										<input type="text" id="otherdomains" name="otherdomains" placeholder="Other domains" data-validation="required flow-e step-3" data-error-message="" onblur="removeFocusClass('otherdomains'); validateFormField('otherdomains')" onfocus="addFocusClass('otherdomains')" />
									</div>
								</div>
								<span id="otherdomains-error" class="error-message"></span>
							</div>
						</div>

						<div class="flow-a form-control para-group">
							<div class="checkbox-group">
								<h3 style="text-transform: none">Project Details</h3>
								<p class="required">Is your research project linked to a National Programme?</p>
							</div>
							<div class="checkbox-group">
								<div class="form-check">
									<input class="form-check-input" onclick="noyesChange('A')" type="radio" name="nationalprogrammeradio" id="nationalprogrammeradio1" value="No" />
									<label class="form-check-label" onclick="noyesChange('A')" for="nationalprogrammeradio1"> No </label>
								</div>
								<div class="form-check">
									<input class="form-check-input" onclick="noyesChange('B')" type="radio" name="nationalprogrammeradio" id="nationalprogrammeradio2" value="Yes" />
									<label class="form-check-label" onclick="noyesChange('B')" for="nationalprogrammeradio2"> Yes </label>
								</div>
								<span id="nationalprogrammeradio-error" class="error-message"></span>
							</div>
							<div class="floating-label yesField">
								<div class="form-field border-normal" onclick="selectInputField('nationalprogramme')">
									<div>
										<label class="required" for="nationalprogramme">Indicate the name of the National Programme and Implementation Agency (IA)</label>
									</div>
									<div>
										<input type="text" id="nationalprogramme" name="nationalprogramme" placeholder="National Programme and Implementation Agency (IA)" data-validation="required flow-f step-3" data-error-message="This field is required for the selection of &ldquo;Yes&rdquo;" onblur="removeFocusClass('nationalprogramme'); validateFormField('nationalprogramme')" onfocus="addFocusClass('nationalprogramme')" />
									</div>
								</div>
								<span id="nationalprogramme-error" class="error-message"></span>
							</div>
							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('projecttitle')">
									<div>
										<label class="required" for="projecttitle">Project title</label>
									</div>
									<div>
										<input type="text" id="projecttitle" name="projecttitle" placeholder="Project title" data-validation="required flow-a step-3" data-error-message="" onblur="removeFocusClass('projecttitle'); validateFormField('projecttitle')" onfocus="addFocusClass('projecttitle')" />
									</div>
								</div>
								<span id="projecttitle-error" class="error-message"></span>
							</div>

							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('projectdescription')">
									<div>
										<label class="required" for="projectdescription">Project description</label>
									</div>
									<div>
										<input type="text" id="projectdescription" name="projectdescription" placeholder="Project description" data-validation="required flow-a step-3" data-error-message="" onblur="removeFocusClass('projectdescription'); validateFormField('projectdescription')" onfocus="addFocusClass('projectdescription')" />
									</div>
								</div>
								<span id="projectdescription-error" class="error-message"></span>
							</div>

							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('projectduration')">
									<div>
										<label class="required" for="projectduration">Project duration (include start date and end date, if possible)</label>
									</div>
									<div>
										<input type="text" id="projectduration" name="projectduration" placeholder="DD/MM/YYYY - DD/MM/YYYY" data-validation="required flow-a step-3" data-error-message="" onblur="removeFocusClass('projectduration'); validateFormField('projectduration')" onfocus="addFocusClass('projectduration')" />
									</div>
								</div>
								<span id="projectduration-error" class="error-message"></span>
							</div>
						</div>

						<div class="flow-a form-control para-group">
							<div class="checkbox-group">
								<h3 style="text-transform: none">Utilisation Projection</h3>
								<p>This is an indication of the compute resources required which will be subjected to approval. You may leave blank if unsure.</p>
							</div>
							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('cpucorehours')">
									<div>
										<label for="cpucorehours">Estimated CPU core hours required</label>
									</div>
									<div>
										<input type="text" id="cpucorehours" name="cpucorehours" placeholder="CPU core hours" data-validation="" data-error-message="" onblur="removeFocusClass('cpucorehours'); validateFormField('cpucorehours')" onfocus="addFocusClass('cpucorehours')" />
									</div>
								</div>
								<span id="nationality-error" class="error-message"></span>
							</div>

							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('gpucardhours')">
									<div>
										<label for="gpucardhours">Estimated GPU card hours required</label>
									</div>
									<div>
										<input type="text" id="gpucardhours" name="gpucardhours" placeholder="GPU card hours" data-validation="" data-error-message="" onblur="removeFocusClass('gpucardhours'); validateFormField('gpucardhours')" onfocus="addFocusClass('gpucardhours')" />
									</div>
								</div>
								<span id="userid-error" class="error-message"></span>
							</div>

							<div class="floating-label">
								<div class="form-field border-normal" onclick="selectInputField('storage')">
									<div>
										<label for="storage">Estimated storage (GB) required</label>
									</div>
									<div>
										<input type="text" id="storage" name="storage" placeholder="Storage (GB)" data-validation="" data-error-message="" onblur="removeFocusClass('storage'); validateFormField('storage')" onfocus="addFocusClass('storage')" />
									</div>
								</div>
								<span id="userid-error" class="error-message"></span>
							</div>

							<div class="checkbox-group typeGroup">
								<p class="required">Please select your HPC system</p>
							</div>
							<div class="checkbox-group typeGroup">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="typeradio" id="typeradio1" value="A100" checked />
									<label class="form-check-label" for="typeradio1"> Aspire2A </label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="typeradio" id="typeradio2" value="H100" />
									<label class="form-check-label" for="typeradio2"> Aspire2A+ </label>
								</div>
								<span id="typeradio-error" class="error-message"></span>
							</div>
						</div>

						<div class="flow-b form-control para-group hide-start">
							<div class="checkbox-group">
								<h3 style="text-transform: none">Collaboration with Stakeholders (A*STAR, NTU, NUS, SUTD)</h3>
								<p>
									You have indicated that you are collaborating with our stakeholders. <br /><br />
									For creation of a user account for an external collaborator (i.e., not part of the stakeholder organisations), we will need an endorsement from either the project owner or the principal investigator (PI) of an existing NSCC project. <br /><br />
									The project owner/PI will act as the sponsor for the created account and be responsible for the account created. Your account must be added to at least one ongoing project that belongs to the sponsor. <br /><br />
									Please provide the following information for your account sponsor:
								</p>
							</div>
							<div class="form-group">
								<div class="floating-label">
									<div class="form-field border-normal" onclick="selectInputField('sponsorfirstname')">
										<div>
											<label class="required" for="sponsorfirstname">First name</label>
										</div>
										<div>
											<input type="text" id="sponsorfirstname" name="sponsorfirstname" placeholder="First name" data-validation="required flow-b step-3" data-error-message="" onblur="removeFocusClass('sponsorfirstname'); validateFormField('sponsorfirstname')" onfocus="addFocusClass('sponsorfirstname')" />
										</div>
									</div>
									<span id="sponsorfirstname-error" class="error-message"></span>
								</div>

								<div class="floating-label">
									<div class="form-field border-normal" onclick="selectInputField('sponsorlastname')">
										<div>
											<label class="required" for="sponsorlastname">Last name</label>
										</div>
										<div>
											<input type="text" id="sponsorlastname" name="sponsorlastname" placeholder="Last name" data-validation="required flow-b step-3" data-error-message="" onblur="removeFocusClass('sponsorlastname'); validateFormField('sponsorlastname')" onfocus="addFocusClass('sponsorlastname')" />
										</div>
									</div>
									<span id="sponsorlastname-error" class="error-message"></span>
								</div>
							</div>

							<div class="form-group">
								<div class="floating-label">
									<div class="form-field border-normal" onclick="selectInputField('sponsornationality')">
										<div>
											<label class="required" for="sponsornationality">Nationality</label>
										</div>
										<div>
											<input type="text" id="sponsornationality" name="sponsornationality" placeholder="Singaporean" data-validation="required flow-b step-3" data-error-message="" onblur="removeFocusClass('sponsornationality'); validateFormField('sponsornationality')" onfocus="addFocusClass('sponsornationality')" />
										</div>
									</div>
									<span id="sponsornationality-error" class="error-message"></span>
								</div>

								<div class="floating-label">
									<div class="form-field border-normal" onclick="selectInputField('sponsororganisation')">
										<div>
											<label class="required" for="sponsororganisation">Name of Organisation</label>
										</div>
										<div>
											<input type="text" id="sponsororganisation" name="sponsororganisation" placeholder="NSCC Singapore" data-validation="required flow-b step-3" data-error-message="" onblur="removeFocusClass('sponsororganisation'); validateFormField('sponsororganisation')" onfocus="addFocusClass('sponsororganisation')" />
										</div>
									</div>
									<span id="sponsororganisation-error" class="error-message"></span>
								</div>
							</div>

							<div class="form-group">
								<div class="floating-label">
									<div class="form-field border-normal" onclick="selectInputField('sponsordepartment')">
										<div>
											<label class="required" for="sponsordepartment">Department</label>
										</div>
										<div>
											<input type="text" id="sponsordepartment" name="sponsordepartment" placeholder="Research and Development" data-validation="required flow-b step-3" data-error-message="" onblur="removeFocusClass('sponsordepartment'); validateFormField('sponsordepartment')" onfocus="addFocusClass('sponsordepartment')" />
										</div>
									</div>
									<span id="sponsordepartment-error" class="error-message"></span>
								</div>

								<div class="floating-label">
									<div class="form-field border-normal" onclick="selectInputField('sponsordesignation')">
										<div>
											<label class="required" for="sponsordesignation">Designation</label>
										</div>
										<div>
											<input type="text" id="sponsordesignation" name="sponsordesignation" placeholder="Research Scientist" data-validation="required flow-b step-3" data-error-message="" onblur="removeFocusClass('sponsordesignation'); validateFormField('sponsordesignation')" onfocus="addFocusClass('sponsordesignation')" />
										</div>
									</div>
									<span id="sponsordesignation-error" class="error-message"></span>
								</div>
							</div>

							<div class="form-group">
								<div class="floating-label">
									<div class="form-field border-normal" onclick="selectInputField('sponsorcontact_number')">
										<div>
											<label class="required" for="sponsorcontact_number">Official contact number</label>
										</div>
										<div>
											<input type="text" id="sponsorcontact_number" name="sponsorcontact_number" placeholder="+65 XXXX XXXX" data-validation="required flow-b step-3 number" data-error-message="" onblur="removeFocusClass('sponsorcontact_number'); validateFormField('sponsorcontact_number')" onfocus="addFocusClass('sponsorcontact_number')" />
										</div>
									</div>
									<span id="sponsorcontact_number-error" class="error-message"></span>
								</div>

								<div class="floating-label">
									<div class="form-field border-normal" onclick="selectInputField('sponsoremail_address')">
										<div>
											<label class="required" for="sponsoremail_address">Official email address</label>
										</div>
										<div>
											<input type="email" id="sponsoremail_address" name="sponsoremail_address" placeholder="example@nscc.sg" data-validation="required flow-b step-3 email" data-error-message="" onblur="removeFocusClass('sponsoremail_address'); validateFormField('sponsoremail_address')" onfocus="addFocusClass('sponsoremail_address')" />
										</div>
									</div>
									<span id="sponsoremail_address-error" class="error-message"></span>
								</div>
							</div>
						</div>

						<div class="flow-b form-control para-group">
							<div class="checkbox-group">
								<p>Please upload the endorsement email from your PI with the following acknowledgements</p>
								<ol style="margin: 0">
									<li>To act as the sponsor for the creation of your account.</li>
									<li>To add you to their project, specifying the project ID.</li>
								</ol>
							</div>

							<div class="form-group">
								<div class="input-group has-validation">
									<div class="row-flex-max">
										<input class="form-control" type="file" id="formFile" name="service_catalog" style="display: flex; padding: 16px; padding-left: 22px" />
										<label for="formFile" class="form-label required">Upload endorsement email</label>
									</div>
									<span id="formFile-error" class="error-message"></span>
								</div>
							</div>
						</div>

						<div class="hide-md" style="display: flex; flex-direction: row; justify-content: space-between">
							<button id="back2" type="button" class="btn btn-back">
								<img src="im/back.svg" alt="Back Arrow" />
								<h4>Back</h4>
							</button>
							<button id="continue3" type="button" class="btn btn-primary">
								<h4>Continue</h4>
							</button>
						</div>
						<line class="hide-md"></line>
					</div>
					<div class="flow-c step-4 step-content" id="step-4">
						<h3>Policy Acceptance</h3>
						<div class="form-control para-group">
							<p>
								Our Privacy Statement sets out how we collect, use or disclose personal data that you have provided to us by completing this form.<br /><br />
								Our Acceptable Use Policy is intended to ensure NSCC users utilise the national high performance computing (HPC) resources in a responsible and appropriate manner.<br /><br />
								By submitting this form, you are accepting and consenting to:
							</p>

							<h3 style="text-transform: none">NSCC's Privacy Statement</h3>
							<div class="checkbox-group">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="privacystatement" data-validation="flow-g step-4 checkbox" data-error-message="Please confirm you accept the Privacy Statement" />
									<label class="form-check-label" for="privacystatement" style="font-size: 14px">
										<span class="required">I acknowledge that I have read and agree to the terms in the <a href="https://www.nscc.sg/privacy-statement" target="_blank">Privacy Statement</a>.</span>
									</label>
								</div>
								<span id="privacystatement-error" class="error-message"></span>
							</div>

							<h3 style="text-transform: none">NSCC's Acceptable Use Policy</h3>
							<div class="checkbox-group">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="acceptableusepolicy" data-validation="flow-g step-4 checkbox" data-error-message="Please confirm you accept NSCC's Acceptable Use Policy" />
									<label class="form-check-label" for="acceptableusepolicy" style="font-size: 14px">
										<span class="required">I agree to NSCC's <a href="https://help.nscc.sg/aup/" target="_blank">Acceptable Use Policy</a>.</span>
									</label>
								</div>
								<span id="acceptableusepolicy-error" class="error-message"></span>
							</div>

							<p>For further assistance, please contact us at <a href="mailto:bizdev@nscc.sg" target="_blank">bizdev@nscc.sg</a>.</p>
							<form id="myform" action="?" method="POST">
								<div class="g-recaptcha" data-sitekey="6LdLxAgpAAAAADD9JvjR5dVWgaQAWHypWJ7eFaiH" data-callback="onSubmit" data-size="normal"></div>
								<span id="recaptcha-error" class="error-message"></span>
							</form>
						</div>

						<div class="form-group">
							<div class="button-group">
								<button id="back3" type="button" class="btn btn-back hide-md">
									<img src="im/back.svg" alt="Back Arrow" />
									<h4>Back</h4>
								</button>
								<button id="submit-button" type="button" class="btn btn-primary">
									<h4>Create Account</h4>
								</button>
							</div>
						</div>

						<line></line>
					</div>
				</form>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header" style="border-bottom: none; z-index: +1">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="box-shadow: none"></button>
					</div>
					<div class="modal-body" style="height: 100%; width: 100%">
						<div class="group-box" style="padding-top: 50px; padding-bottom: 50px">
							<h3 style="text-transform: none">Your request has been submitted!</h3>
							<p class="text-center">A copy of the form submission has been sent to your email address.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header" style="border-bottom: none; z-index: +1">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="box-shadow: none"></button>
					</div>
					<div class="modal-body" style="height: 100%; width: 100%">
						<div class="group-box" style="padding-top: 50px; padding-bottom: 50px">
							<h3 style="text-transform: none">Your request has been submitted!</h3>
							<p class="text-center">However, there is a problem submitting your file. Please contact the administrator</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="waitModal" tabindex="-1" aria-labelledby="waitModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header" style="border-bottom: none; z-index: +1">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="box-shadow: none"></button>
					</div>
					<div class="modal-body" style="height: 100%; width: 100%">
						<div class="group-box" style="padding-top: 50px; padding-bottom: 50px">
							<h3 style="text-transform: none">We are submitting your form request.</h3>
							<p class="text-center">Please do not refresh or close the browser.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="js/custom.js"></script>

		<!-- bootstrap core js -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
		<!-- core theme js -->
		<script src="js/scripts.js"></script>

		<!-- bootstrap core js -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
		<!-- core theme js -->
		<script src="js/scripts.js"></script>

		<script>
			window.onload = (event) => {
				onPageLoad();
			};
		</script>
	</body>
</html>

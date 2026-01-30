<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  @@include("partials/head.html")
  <title>Modernize Bootstrap Admin</title>
</head>

<body class="link-sidebar">
  <!-- Preloader -->
  <div class="preloader">
    <img src="{{ URL::asset('build/images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div id="main-wrapper">
    <!-- Sidebar Start -->
    <aside class="left-sidebar with-vertical">
      <div>@@include("partials/sidebar.html", { "page": "dashboard", })</div>
    </aside>
    <!--  Sidebar End -->
    <div class="page-wrapper">
      <!--  Header Start -->
      <header class="topbar">
        <div class="with-vertical">@@include("partials/header.html")</div>
        <div class="app-header with-horizontal">
          @@include("partials/horizontal-header.html")
        </div>
      </header>
      <!--  Header End -->
      
      <aside class="left-sidebar with-horizontal">
        @@include("partials/horizontal-sidebar.html", { "page": "dashboard",
        })
      </aside>

      <div class="body-wrapper">
        <div class="container-fluid">
          @@include("partials/breadcrumb.html", {"title": "Form Wizard", "subtitle": 'Home'})
          <!-- start Basic Example -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-0">Basic Example</h4>
              <h6 class="card-subtitle mb-3"></h6>
              <div id="example-basic" class="mt-5">
                <h3>Keyboard</h3>
                <section>
                  <p> Try the keyboard navigation by clicking arrow left or right! </p>
                </section>
                <h3>Effects</h3>
                <section>
                  <p>Wonderful transition effects.</p>
                </section>
                <h3>Pager</h3>
                <section>
                  <p> The next and previous buttons help you to navigate through your content. </p>
                </section>
              </div>
            </div>
          </div>
          <!-- end Basic Example -->
          <!-- start Custom Design Example -->
          <div class="card">
            <div class="card-body wizard-content">
              <h4 class="card-title mb-0">Custom Design Example</h4>
              <h6 class="card-subtitle mb-3"></h6>
              <form action="#" class="tab-wizard wizard-circle">
                <!-- Step 1 -->
                <h6>Personal Info</h6>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="firstName1">First Name :</label>
                        <input type="text" class="form-control" id="firstName1" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="lastName1">Last Name :</label>
                        <input type="text" class="form-control" id="lastName1" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="emailAddress1">Email Address :</label>
                        <input type="email" class="form-control" id="emailAddress1" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="phoneNumber1">Phone Number :</label>
                        <input type="tel" class="form-control" id="phoneNumber1" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="location1">Select City :</label>
                        <select class="form-select" id="location1" name="location">
                          <option value="">Select City</option>
                          <option value="Amsterdam">India</option>
                          <option value="Berlin">USA</option>
                          <option value="Frankfurt">Dubai</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="date1">Date of Birth :</label>
                        <input type="date" class="form-control" id="date1" />
                      </div>
                    </div>
                  </div>
                </section>
                <!-- Step 2 -->
                <h6>Job Status</h6>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="jobTitle1">Job Title :</label>
                        <input type="text" class="form-control" id="jobTitle1" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="videoUrl1">Company Name :</label>
                        <input type="text" class="form-control" id="videoUrl1" />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label class="form-label" for="shortDescription1">Job Description :</label>
                        <textarea name="shortDescription" id="shortDescription1" rows="6"
                          class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- Step 3 -->
                <h6>Interview</h6>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="int1">Interview For :</label>
                        <input type="text" class="form-control" id="int1" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="intType1">Interview Type :</label>
                        <select class="form-select" id="intType1" data-placeholder="Type to search cities"
                          name="intType1">
                          <option value="Banquet">Normal</option>
                          <option value="Fund Raiser">Difficult</option>
                          <option value="Dinner Party">Hard</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="Location2">Location :</label>
                        <select class="form-select" id="Location2" name="location">
                          <option value="">Select City</option>
                          <option value="India">India</option>
                          <option value="USA">USA</option>
                          <option value="Dubai">Dubai</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="jobTitle2">Interview Date :</label>
                        <input type="date" class="form-control" id="jobTitle2" />
                      </div>
                      <div class="mb-3">
                        <label for="customRadio6" class="form-label">Requirements :</label>
                        <div class="c-inputs-stacked">
                          <div class="form-check">
                            <input type="radio" id="customRadio6" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio6">Employee</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio7" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio7">Contract</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- Step 4 -->
                <h6>Remark</h6>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="behName1">Behaviour :</label>
                        <input type="text" class="form-control" id="behName1" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="participants1">Confidance</label>
                        <input type="text" class="form-control" id="participants1" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="participants2">Result</label>
                        <select class="form-select" id="participants2" name="location">
                          <option value="">Select Result</option>
                          <option value="Selected">Selected</option>
                          <option value="Rejected">Rejected</option>
                          <option value="Call Second-time"> Call Second-time </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="decisions1">Comments</label>
                        <textarea name="decisions" id="decisions1" rows="4" class="form-control"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="customRadio1" class="form-label">Rate Interviwer :</label>
                        <div class="c-inputs-stacked">
                          <div class="form-check">
                            <input type="radio" id="customRadio1" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio1">1 star</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio2" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio2">2 star</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio3" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio3">3 star</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio4" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio4">4 star</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio5" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio5">5 star</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </form>
            </div>
          </div>
          <!-- end Custom Design Example -->
          <!--  start Step wizard with validation -->
          <div class="card">
            <div class="card-body wizard-content">
              <h4 class="card-title">Step wizard with validation</h4>
              <p class="card-subtitle mb-3"> You can us the validation like what we did </p>
              <form action="#" class="validation-wizard wizard-circle mt-5">
                <!-- Step 1 -->
                <h6>Step 1</h6>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="wfirstName2"> First Name : <span class="danger">*</span>
                        </label>
                        <input type="text" class="form-control required" id="wfirstName2" name="firstName" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="wlastName2"> Last Name : <span class="danger">*</span>
                        </label>
                        <input type="text" class="form-control required" id="wlastName2" name="lastName" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="wemailAddress2"> Email Address : <span class="danger">*</span>
                        </label>
                        <input type="email" class="form-control required" id="wemailAddress2" name="emailAddress" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="wphoneNumber2">Phone Number :</label>
                        <input type="tel" class="form-control" id="wphoneNumber2" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="wlocation2"> Select City : <span class="danger">*</span>
                        </label>
                        <select class="form-select required" id="wlocation2" name="location">
                          <option value="">Select City</option>
                          <option value="India">India</option>
                          <option value="USA">USA</option>
                          <option value="Dubai">Dubai</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="wdate2">Date of Birth :</label>
                        <input type="date" class="form-control" id="wdate2" />
                      </div>
                    </div>
                  </div>
                </section>
                <!-- Step 2 -->
                <h6>Step 2</h6>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="jobTitle3">Company Name :</label>
                        <input type="text" class="form-control required" id="jobTitle3" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="webUrl3">Company URL :</label>
                        <input type="url" class="form-control required" id="webUrl3" name="webUrl3" />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label class="form-label" for="shortDescription3">Short Description :</label>
                        <textarea name="shortDescription" id="shortDescription3" rows="6"
                          class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- Step 3 -->
                <h6>Step 3</h6>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="wint1">Interview For :</label>
                        <input type="text" class="form-control required" id="wint1" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="wintType1">Interview Type :</label>
                        <select class="form-select required" id="wintType1" data-placeholder="Type to search cities"
                          name="wintType1">
                          <option value="Banquet">Normal</option>
                          <option value="Fund Raiser">Difficult</option>
                          <option value="Dinner Party">Hard</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="wLocation1">Location :</label>
                        <select class="form-select required" id="wLocation1" name="wlocation">
                          <option value="">Select City</option>
                          <option value="India">India</option>
                          <option value="USA">USA</option>
                          <option value="Dubai">Dubai</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="wjobTitle2">Interview Date :</label>
                        <input type="date" class="form-control required" id="wjobTitle2" />
                      </div>
                      <div class="mb-3">
                        <label for="customRadio16" class="form-label">Requirements :</label>
                        <div class="c-inputs-stacked">
                          <div class="form-check">
                            <input type="radio" id="customRadio16" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio16">Employee</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio17" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio17">Contract</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- Step 4 -->
                <h6>Step 4</h6>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="behName2">Behaviour :</label>
                        <input type="text" class="form-control required" id="behName2" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="participants3">Confidance</label>
                        <input type="text" class="form-control required" id="participants3" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="participants4">Result</label>
                        <select class="form-select required" id="participants4" name="location">
                          <option value="">Select Result</option>
                          <option value="Selected">Selected</option>
                          <option value="Rejected">Rejected</option>
                          <option value="Call Second-time"> Call Second-time </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="decisions3">Comments</label>
                        <textarea name="decisions" id="decisions3" rows="4" class="form-control"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="customRadio11" class="form-label">Rate Interviwer :</label>
                        <div class="c-inputs-stacked">
                          <div class="form-check">
                            <input type="radio" id="customRadio11" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio11">1 star</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio12" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio12">2 star</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio13" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio13">3 star</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio14" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio14">4 star</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio15" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio15">5 star</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </form>
            </div>
          </div>
          <!--  end Step wizard with validation -->
          <!-- start Step wizard Vertical -->
          <div class="card">
            <div class="card-body wizard-content">
              <h4 class="card-title mb-0">Step wizard Vertical</h4>
              <h6 class="card-subtitle mb-3"></h6>
              <form action="#" class="tab-wizard vertical wizard-circle mt-5">
                <!-- Step 1 -->
                <h6>Personal Info</h6>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="firstName2">First Name :</label>
                        <input type="text" class="form-control" id="firstName2" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="lastName2">Last Name :</label>
                        <input type="text" class="form-control" id="lastName2" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="emailAddress2">Email Address :</label>
                        <input type="email" class="form-control" id="emailAddress2" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="phoneNumber2">Phone Number :</label>
                        <input type="tel" class="form-control" id="phoneNumber2" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="location3">Select City :</label>
                        <select class="form-select" id="location3" name="location">
                          <option value="">Select City</option>
                          <option value="Amsterdam">India</option>
                          <option value="Berlin">USA</option>
                          <option value="Frankfurt">Dubai</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="date2">Date of Birth :</label>
                        <input type="date" class="form-control" id="date2" />
                      </div>
                    </div>
                  </div>
                </section>
                <!-- Step 2 -->
                <h6>Job Status</h6>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="jobTitle5">Job Title :</label>
                        <input type="text" class="form-control" id="jobTitle5" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="videoUrl2">Company Name :</label>
                        <input type="text" class="form-control" id="videoUrl2" />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label class="form-label" for="shortDescription2">Job Description :</label>
                        <textarea name="shortDescription" id="shortDescription2" rows="6"
                          class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- Step 3 -->
                <h6>Interview</h6>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="int2">Interview For :</label>
                        <input type="text" class="form-control" id="int2" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="intType2">Interview Type :</label>
                        <select class="form-select" id="intType2" data-placeholder="Type to search cities"
                          name="intType2">
                          <option value="Banquet">Normal</option>
                          <option value="Fund Raiser">Difficult</option>
                          <option value="Dinner Party">Hard</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="Location1">Location :</label>
                        <select class="form-select" id="Location1" name="location">
                          <option value="">Select City</option>
                          <option value="India">India</option>
                          <option value="USA">USA</option>
                          <option value="Dubai">Dubai</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="jobTitle4">Interview Date :</label>
                        <input type="date" class="form-control" id="jobTitle4" />
                      </div>
                      <div class="mb-3">
                        <label for="customRadio26" class="form-label">Requirements :</label>
                        <div class="c-inputs-stacked">
                          <div class="form-check">
                            <input type="radio" id="customRadio26" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio26">Employee</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio27" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio27">Contract</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- Step 4 -->
                <h6>Remark</h6>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="behName3">Behaviour :</label>
                        <input type="text" class="form-control" id="behName3" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="participants5">Confidance</label>
                        <input type="text" class="form-control" id="participants5" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="participants6">Result</label>
                        <select class="form-select" id="participants6" name="location">
                          <option value="">Select Result</option>
                          <option value="Selected">Selected</option>
                          <option value="Rejected">Rejected</option>
                          <option value="Call Second-time"> Call Second-time </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="decisions2">Comments</label>
                        <textarea name="decisions" id="decisions2" rows="4" class="form-control"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="customRadio21" class="form-label">Rate Interviwer :</label>
                        <div class="c-inputs-stacked">
                          <div class="form-check">
                            <input type="radio" id="customRadio21" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio21">1 star</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio22" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio22">2 star</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio23" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio23">3 star</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio24" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio24">4 star</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" id="customRadio25" name="customRadio" class="form-check-input" />
                            <label class="form-check-label" for="customRadio25">5 star</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </form>
            </div>
          </div>
          <!-- end Step wizard Vertical -->
          <!-- start Basic Form Example -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-0">Basic Form Example</h4>
              <h6 class="card-subtitle mb-3"></h6>
              <form id="example-form" action="#" class="mt-5">
                <div>
                  <h3>Account</h3>
                  <section>
                    <label class="form-label" for="userName">User name *</label>
                    <input id="userName" name="userName" type="text" class="required form-control mb-3"
                      autocomplete="on" />
                    <label class="form-label" for="password">Password *</label>
                    <input id="password" name="password" type="password" class="required form-control mb-3"
                      autocomplete="current-password" />
                    <label class="form-label" for="confirm">Confirm Password *</label>
                    <input id="confirm" name="confirm" type="text" class="required form-control mb-3" />
                    <p>(*) Mandatory</p>
                  </section>
                  <h3>Profile</h3>
                  <section>
                    <label class="form-label" for="name">First name *</label>
                    <input id="name" name="name" type="text" class="required form-control mb-3" autocomplete="on" />
                    <label class="form-label" for="surname">Last name *</label>
                    <input id="surname" name="surname" type="text" class="required form-control mb-3" />
                    <label class="form-label" for="email">Email *</label>
                    <input id="email" name="email" type="text" class="required email form-control mb-3"
                      autocomplete="on" />
                    <label class="form-label" for="address">Address</label>
                    <input id="address" name="address" type="text" class="form-control mb-3" autocomplete="on" />
                    <p>(*) Mandatory</p>
                  </section>
                  <h3>Hints</h3>
                  <section>
                    <ul>
                      <li>Foo</li>
                      <li>Bar</li>
                      <li>Foobar</li>
                    </ul>
                  </section>
                  <h3>Finish</h3>
                  <section>
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required" />
                    <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                  </section>
                </div>
              </form>
            </div>
          </div>
          <!-- end Basic Form Example -->
          <!-- start Advanced Form Example -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-0">Advanced Form Example</h4>
              <h6 class="card-subtitle mb-3"></h6>
              <form id="example-advanced-form" action="#" class="mt-5">
                <h3>Account</h3>
                <fieldset>
                  <h5 class="mb-4">Account Information</h5>
                  <label class="form-label" for="userName-2">User name *</label>
                  <input id="userName-2" name="userName" type="text" class="required form-control  mb-3"
                    autocomplete="on" />
                  <label class="form-label" for="password-2">Password *</label>
                  <input id="password-2" name="password" type="password" class="required form-control mb-3"
                    autocomplete="current-password" />
                  <label class="form-label" for="confirm-2">Confirm Password *</label>
                  <input id="confirm-2" name="confirm" type="text" class="required form-control mb-3" />
                  <p>(*) Mandatory</p>
                </fieldset>
                <h3>Profile</h3>
                <fieldset>
                  <h5 class="mb-4">Profile Information</h5>
                  <label class="form-label" for="name-2">First name *</label>
                  <input id="name-2" name="name" type="text" class="required form-control mb-3" autocomplete="on" />
                  <label class="form-label" for="surname-2">Last name *</label>
                  <input id="surname-2" name="surname" type="text" class="required form-control mb-3" />
                  <label class="form-label" for="email-2">Email *</label>
                  <input id="email-2" name="email" type="text" class="required email form-control mb-3"
                    autocomplete="on" />
                  <label class="form-label" for="address-2">Address</label>
                  <input id="address-2" name="address" type="text" class="form-control mb-3" autocomplete="on" />
                  <label class="form-label" for="age-2">Age (The warning step will show up if age is less than 18)
                    *</label>
                  <input id="age-2" name="age" type="text" class="required number form-control mb-3" />
                  <p>(*) Mandatory</p>
                </fieldset>
                <h3>Warning</h3>
                <fieldset>
                  <h5 class="mb-4">You are to young</h5>
                  <p>Please go away ;-)</p>
                </fieldset>
                <h3>Finish</h3>
                <fieldset>
                  <h5 class="mb-4">Terms and Conditions</h5>
                  <input id="acceptTerms-2" name="acceptTerms" type="checkbox" class="required form-control" />
                  <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                </fieldset>
              </form>
            </div>
          </div>
          <!-- end Advanced Form Example -->
          <!-- start Dynamic Manipulation Example -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-0"> Dynamic Manipulation Example </h4>
              <h6 class="card-subtitle mb-3"></h6>
              <div id="example-manipulation" class="mt-5">
                <h3>Add Step</h3>
                <section>
                  <p>
                    <label class="form-label" for="title-3">HTML Title *</label>
                    <br />
                    <input id="title-3" type="text" class="form-control" />
                    <br />
                    <label class="form-label" for="text-3">HTML Content *</label>
                    <br />
                    <textarea id="text-3" rows="5" class="form-control"></textarea>
                  </p>
                  <p>
                    <a href="javascript:void(0);"
                      onclick="$('#wizard-4').steps('add', { title: $('#title-3').val(), content: $('#text-3').val() });">Add</a>
                  </p>
                  <p>(*) Mandatory</p>
                </section>
                <h3>Insert Step</h3>
                <section>
                  <p>
                    <label class="form-label" for="position-3">Position (zero-based) *</label>
                    <br />
                    <input id="position-3" type="text" class="form-control" />
                    <br />
                    <label class="form-label" for="title2-3">HTML Title *</label>
                    <br />
                    <input id="title2-3" type="text" class="form-control" />
                    <br />
                    <label class="form-label" for="text2-3">HTML Content *</label>
                    <br />
                    <textarea id="text2-3" rows="5" class="form-control"></textarea>
                  </p>
                  <p>
                    <a href="javascript:void(0);"
                      onclick="$('#wizard-4').steps('insert', Number($('#position-3').val()), { title: $('#title2-3').val(), content: $('#text2-3').val() });">Insert</a>
                  </p>
                  <p>(*) Mandatory</p>
                </section>
                <h3>Remove Step</h3>
                <section>
                  <p>
                    <label class="form-label" for="position2-3">Position (zero-based) *</label>
                    <br />
                    <input id="position2-3" type="text" class="form-control" />
                  </p>
                  <p>
                    <a href="javascript:void(0);"
                      onclick="$('#wizard-4').steps('remove', Number($('#position2-3').val()));">Remove</a>
                  </p>
                  <p>(*) Mandatory</p>
                </section>
              </div>
            </div>
          </div>
          <!-- end Dynamic Manipulation Example -->
          <!-- start Vertical Steps Example -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-0">Vertical Steps Example</h4>
              <h6 class="card-subtitle mb-3"></h6>
              <div id="example-vertical" class="mt-5">
                <h3>Keyboard</h3>
                <section>
                  <p> Try the keyboard navigation by clicking arrow left or right! </p>
                </section>
                <h3>Effects</h3>
                <section>
                  <p>Wonderful transition effects.</p>
                </section>
                <h3>Pager</h3>
                <section>
                  <p> The next and previous buttons help you to navigate through your content. </p>
                </section>
              </div>
            </div>
          </div>
          <!-- end Vertical Steps Example -->
        </div>
      </div>
      @@include("partials/customizer.html")
    </div>

    @@include("partials/header-components/dd-searchbar.html")
    @@include("partials/header-components/dd-shopping-cart.html")
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  @@include("partials/scripts.html")
  <script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/forms/form-wizard.js') }}"></script>
</body>

</html>
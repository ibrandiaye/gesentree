
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Direction générale des Élections (DGE) </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Direction générale des Élections (DGE)" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('logo/fav.ico') }}">

     
    <!-- App css -->
    <link href=" {{ asset('assets/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <script src="{{ asset('ETD webapp_files/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/jquery.min.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/webserial.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/websocket.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/biomini.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/webusb.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/ccid.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/dev.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/webapp_api.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/webapp_events.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/emrtd_openpace.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/emrtd_pace.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/emrtd_dg.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/emrtd.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/log.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/util.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/mrz.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/webapp.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/config.js') }}"></script>
    <script src="{{ asset('ETD webapp_files/gui.js') }}"></script>
    </head>

<body class="theme" monica-id="ofpnmcalabcbjgholdjcjblkibolbppb" monica-version="7.6.0">
  

    <!-- Begin page -->
    <div id="wrapper">

        @php
            $user = Auth::user();
        @endphp
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">



                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                        <span class="d-none d-sm-inline-block ml-1">{{$user->name ?? " "}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bienvenue !</h6>
                        </div>

                       
                        <a class="dropdown-item notify-item"  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Deconnexion</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form> 

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box" style="background-color: white;">
                <a href="index.html" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('logo/logo.png') }}" alt="" height="80">
                        <!-- <span class="logo-lg-text-light">Zircos</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">Z</span> -->
                        <img src="{{ asset('logo/logo.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
            </ul>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

                <div class="slimscroll-menu">
                  
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="{{ route('home') }}" class="waves-effect waves-light">
                                    <i class="mdi mdi-gauge"></i>
                                    <span> Tableau de bords </span>
                                </a>
                              
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-google-pages"></i>
                                    <span> Site </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('site.create') }}">Ajouter Site</a></li>
                                    <li><a href="{{ route('site.index') }}">Liste des Site</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-google-pages"></i>
                                    <span> Service </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('service.create') }}">Ajouter Service</a></li>
                                    <li><a href="{{ route('service.index') }}">Liste des Service</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-account"></i>
                                    <span> Employe </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('employe.create') }}">Ajouter Employe</a></li>
                                    <li><a href="{{ route('employe.index') }}">Liste des Employe</a></li>
                                </ul>
                            </li>

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                  <div class="row">

                  <div class="col-12">
                      <div class="page-title-box">
                          <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                                  <li class="breadcrumb-item active"><a href="javascript: void(0);">Site </a></li>
                              </ol>
                          </div>
                          <h4 class="page-title">Enregistrer un Site</h4>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12">
                    <div class="section theme">

                      <!--Global container-->
                      <div class="container is-centered">
                
                        <!-- Blur background element -->
                        <div id="backgroundElement" class="">
                
                          <!--Global columns-->
                          <div class="columns">
                            <!--Panel left column-->
                            <div class="column">
                              <!--Smartcard reader panel-->
                              <div class="box has-background-light">
                                <div class="box-title has-text-weight-bold">Device details</div>
                                <div class="column">
                                  <table>
                                    <tbody><tr>
                                      <td><elylabel id="scannerLabel">Scanner</elylabel></td>
                                      <td><div card="" id="scanner"></div></td>
                                    </tr>
                                    <tr>
                                      <td><elylabel id="scardReaderLabel">Reader</elylabel></td>
                                      <td><div id="scardReader"></div></td>
                                    </tr>
                                    <tr>
                                      <td><elylabel id="scardAtrLabel">ATR</elylabel></td>
                                      <td><div id="scardAtr"></div></td>
                                    </tr>
                                  </tbody></table>
                                  <div class="is-fullwidth has-text-right">
                                    <a class="button is-success is-light" id="connect" style="width: 250px; font-size: 20px;">Connect</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <form action="#" method="POST">
                                @csrf
                                <div class="card">
                                <div class="card-header  text-center">FORMULAIRE D'ENREGISTREMENT D'UN UTILISATEUR</div>
                                    <div class="card-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="row">
                                          <div class="col-lg-6 ">
                                            <div class="form-group">
                                                <label>Nom </label>
                                                <input type="text" name="nom" id="surName_input"  value="{{ old('nom') }}" class="form-control"required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6  ">
                                            <div class="form-group">
                                                <label>Prenom </label>
                                                <input type="text" name="prenom" id="firstName_input"  value="{{ old('prenom') }}" class="form-control"required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6  ">
                                            <div class="form-group">
                                                <label>Date de Naissance </label>
                                                <input type="text" id="dob_input" name="datenaiss"  value="{{ old('datenaiss') }}" class="form-control"required>
                                            </div>
                                        </div>
                
                                        <div class="col-lg-6  ">
                                            <div class="form-group">
                                                <label>Lieu de Naissance </label>
                                                <input type="text" id="lieunaiss" name="lieunaiss"  value="{{ old('lieunaiss') }}" class="form-control"required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6  ">
                                            <div class="form-group">
                                                <label>Date D'expiration </label>
                                                <input type="text" id="doe_input" name="date_expiration"  value="{{ old('date_expiration') }}" class="form-control"required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6  ">
                                            <div class="form-group">
                                                <label>Date D'emission </label>
                                                <input type="text" id="date_emission" name="date_emission"  value="{{ old('date_emission') }}" class="form-control"required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6  ">
                                            <div class="form-group">
                                                <label>Sexe </label>
                                                <input type="text" name="sexe" id="sex_input"  value="{{ old('sexe') }}" class="form-control"required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6  ">
                                          <div class="form-group">
                                              <label>Numero CNI </label>
                                              <input type="text" name="numcni" id="numcni_input"  value="{{ old('numcni') }}" class="form-control"required>
                                          </div>
                                      </div>
                                      <div class="col-lg-6  ">
                                        <div class="form-group">
                                            <label>Numéro Electeur </label>
                                            <input type="text" name="numelec" id="numelec_input"  value="{{ old('numelec') }}" class="form-control"required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6  ">
                                        <div class="form-group">
                                            <label>Numéro Carte </label>
                                            <input type="text" name="numcarte" id="docNumber_input"  value="{{ old('numcarte') }}" class="form-control"required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6  ">
                                      <div class="form-group">
                                          <label>Commune </label>
                                          <input type="text" name="commune" id="commune_input"  value="{{ old('commune') }}" class="form-control"required>
                                      </div>
                                  </div>
                                        <div class="col-lg-6  " >
                                            <div class="form-group">
                                                <label>Image </label>
                                                <input type="text" id="photo_portrait" name="photo"  value="{{ old('photo') }}" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6  " >
                                            <div class="form-group">
                                                <label>Mrz </label>
                                                <input type="text" id="mrz" name="mrz"  value="{{ old('mrz') }}" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6  " >
                                            <div class="form-group">
                                                <label>Nationalite </label>
                                                <input type="text" id="nationalite" name="nationalite"  value="{{ old('nationalite') }}" class="form-control" required>
                                            </div>
                                        </div>
                                        </div>
                
                                        <div>
                                            <br>
                                            <center>
                                                <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                                            </center>
                                        </div>
                                    </div>
                
                                </div>
                
                            </form>
                            </div>
                          </div>
                
                          <!--Document details-->
                          <div class="box has-background-light">
                            <div class="box-title has-text-weight-bold" style="margin-bottom: 10px;">Document details</div>
                            <div class="columns">
                              <div class="column is-3">
                                <!--Portrait-->
                                <img id="portraitDisplay" width="0" height="0">
                                <!--Signature-->
                                <img id="signatureDisplay" width="0" height="0">
                              </div>
                
                              <!--DG1 fields - eMRTD-->
                              <div style="display:block" class="column is-fullwidth" id="dg1EmrtdFields">
                                <table>
                                  <tbody><tr>
                                    <td style="text-align: right;"><elylabel id="firstNameLabel">First name</elylabel></td>
                                    <td><div id="firstName"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="surNameLabel">Sur name</elylabel></td>
                                    <td><div id="surName"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="dobLabel">Date of birth (dd/mm/yy)</elylabel></td>
                                    <td><div id="dob"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="nationalityLabel">Nationality</elylabel></td>
                                    <td><div id="nationality"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="sexLabel">Sex</elylabel></td>
                                    <td><div id="sex"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="doeLabel">Valid until (dd/mm/yy)</elylabel></td>
                                    <td><div id="doe"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="docNumberLabel">Document number</elylabel></td>
                                    <td><div id="docNumber"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="docTypeLabel">Document type</elylabel></td>
                                    <td><div id="docType"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="issuerLabel">Issuer</elylabel></td>
                                    <td><div id="issuer"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="optionalDataLabel">Optional data</elylabel></td>
                                    <td><div id="optionalData"></div></td>
                                  </tr>
                                </tbody></table>
                              </div>
                
                              <!--DG1 fields - IDL-->
                              <div style="display:none" class="column is-fullwidth" id="dg1IdlFields">
                                <table>
                                  <tbody><tr>
                                    <td style="text-align: right;"><elylabel id="familyNameIdlLabel">Family name</elylabel></td>
                                    <td><div id="familyName-idl"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="givenNameLabel">Given name</elylabel></td>
                                    <td><div id="givenName-idl"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="dobLabel">Date of birth (dd/mm/yyyy)</elylabel></td>
                                    <td><div id="dob-idl"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="doiLabel">Date of issue (dd/mm/yyyy)</elylabel></td>
                                    <td><div id="doi-idl"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="doeLabel">Date of expiry (dd/mm/yyyy)</elylabel></td>
                                    <td><div id="doe-idl"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="issuingCountryLabel">Issuing country</elylabel></td>
                                    <td><div id="issuingCountry-idl"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="issuingAuthorityLabel">Issuing authority</elylabel></td>
                                    <td><div id="issuingAuthority-idl"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="docNumberLabel">License number</elylabel></td>
                                    <td><div id="docNumber-idl"></div></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: right;"><elylabel id="categoriesLabel">Categories</elylabel></td>
                                    <td><div id="categories-idl"></div></td>
                                  </tr>
                                </tbody></table>
                              </div>
                            </div>
                
                            <!--MRZ-->
                            <div class="is-fullwidth is-centered">
                              <div style="display:none" class="MRZ column is-size-4 has-text-centered" id="mrzDisplay"></div>
                            </div>
                
                            <!--Biometric images-->
                            <div style="display:none" id="fingerprintDisplay" class="column is-fullwidth"></div>
                
                            <!--DG11 fields - eMRTD-->
                            <div style="margin-top : 10px; padding-top: 0.2rem;" class="section columns">
                              <div style="display:none" id="additionalPersonalDetails" class="column">
                                <div class="box-title has-text-weight-bold">Additional Personal Details (DG11)</div>
                                <div id="dg11EmrtdFields"></div>
                              </div>
                
                              <!--DG12 fields - eMRTD-->
                              <div style="display:none" id="additionalDocumentDetails" class="column">
                                <div class="box-title has-text-weight-bold">Additional Document Details (DG12)</div>
                                <div id="dg12EmrtdFields"></div>
                              </div>
                
                              <!--DG13 fields - eMRTD-->
                              <div style="display:none" id="optionalDetails" class="column">
                                <div class="box-title has-text-weight-bold">Optional Details (DG13)</div>
                                <div id="dg13EmrtdFields"></div>
                              </div>
                            </div>
                
                          </div>
                
                          <!--Inspection details-->
                          <div class="box has-background-light" style="min-height: 25vh; max-height: 50vh; overflow-y: scroll;">
                            <div class="box-title has-text-weight-bold" id="inspectionDetails">Inspection details</div>
                            <div class="card-content">
                              <div id="inspectionList">
                                <!-- <div class="columns is-vcentered">
                                  <div class="column is-1">
                                    <img src="images/unknown.png" />
                                  </div>
                                  <div class="column is-9">
                                    <div class="is-italic has-text-dark"></div>
                                  </div>
                                  <div class="column is-2">
                                    <div class="is-family-monospace has-text-dark"><time></time></div>
                                  </div>
                                </div> -->
                              </div>
                            </div>
                          </div>
                
                        </div>
                      </div>
                
                      <div class="container is-centered">
                        <div class="filler theme" style="margin: bottom 10px;"></div>
                      </div>
                
                    </div>
                
                    <!--Footer-->
                    <div class="container is-centered">
                      <footer class="section footer">
                        <div class="has-text-centered" id="version">ETD Webapp v0-wasm-110.xxx-rc8.6</div>
                      </footer>
                    </div>
                
                    <!--Menu popup-->
                    <div>
                      <div id="optionsPopup" class="box options-popup" style="top: 50%; left: 50%;">
                        <div class="close" onclick="optionsPopup.classList.remove(&#39;show&#39;); backgroundElement.classList.remove(&#39;options-popup-background-blur&#39;);">Close</div> <br>
                        <div class="box-title has-text-weight-bold" style="margin-bottom: 10px;">Options</div>
                        <div class="popup-content">
                          <div class="box has-background-light">
                            <div class="columns">
                              <div class="column is-half">
                                <!--Auth types-->
                                <fieldset id="authTypes" class="has-background-light">
                                  <div class="box-title has-text-weight-medium has-text-grey-light">Access type</div>
                                  <label class="radio"><input type="radio" name="authType" id="authTypeAuto" value="AUTO" checked=""> Auto</label><br>
                                  <label class="radio"><input type="radio" name="authType" id="authTypePace" value="PACE"> PACE</label><br>
                                  <label class="radio"><input type="radio" name="authType" id="authTypeBac" value="BAC_BAP"> BAC/BAP</label><br>
                                </fieldset>
                              </div>
                              <div class="column is-half">
                                <!--Password types-->
                                <fieldset id="pwdTypes" class="has-background-light">
                                  <div class="box-title has-text-weight-medium has-text-grey-light">Password type</div>
                                  <label class="radio"><input type="radio" name="pwdType" id="pwdTypeAskEveryTime" value="ASK_EVERY_TIME"> Ask every time</label><br>
                                  <label class="radio"><input type="radio" name="pwdType" id="pwdTypeMrz" value="MRZ" checked=""> MRZ</label><br>
                                  <label class="radio"><input type="radio" name="pwdType" id="pwdTypeCan" value="CAN"> CAN</label><br>
                                  <label class="radio"><input type="radio" name="pwdType" id="pwdTypePin" value="PIN"> PIN</label><br>
                                  <input class="input is-warning" id="pinpadInputValue" placeholder="Enter CAN or PIN" type="number" onclick="gui.openPinpad()">
                                </fieldset>
                              </div>
                            </div>
                            <div class="columns">
                              <!--APDU types-->
                              <fieldset id="apduTypes" class="column is-half has-background-light">
                                <div class="box-title has-text-weight-medium has-text-grey-light">APDU type</div>
                                <label class="radio"><input type="radio" name="apduType" id="apduTypeAuto" value="AUTO"> Automatic</label><br>
                                <label class="radio"><input type="radio" name="apduType" id="apduTypeShort" value="SHORT"> Short</label><br>
                                <label class="radio"><input type="radio" name="apduType" id="apduTypeExtended" value="EXTENDED"> Extended</label><br>
                              </fieldset>
                              <!--Misc. options-->
                              <fieldset id="miscOptions" class="column is-half has-background-light">
                                <div class="box-title has-text-weight-medium has-text-grey-light">Misc.</div>
                                <label class="checkbox"><input type="checkbox" id="autoReadCheckbox"> Auto read</label><br>
                                <label class="checkbox"><input type="checkbox" id="readSignatureCheckbox"> Read Signature</label><br>
                                <label class="checkbox"><input type="checkbox" id="readDg3Checkbox"> Read DG3</label><br>
                                <label class="checkbox"><input type="checkbox" id="verifyFpCheckbox"> Verify FP</label><br>
                              </fieldset>
                            </div>
                          </div>
                
                          <div class="box-title has-text-weight-bold">Authentications</div>
                          <div class="box has-background-light" style="margin-top: 10px;">
                            <!--PA-->
                            <div class="has-background-light" style="margin-bottom: 10px;">
                              <input type="checkbox" id="paCheckbox">
                              <label class="has-text-weight-bold" id="paLabel"> PA</label>
                              <div class="elyBrowse">
                                <elylabel><label for="paCscaFileBrowser">CSCA certificate</label><br></elylabel>
                                <input type="file" id="paCscaFileBrowser" disabled="" accept=".der, .cer, .crt">
                              </div>
                              <div class="elyBrowse">
                                <elylabel><label for="paDsFileBrowser">External DS certificate (Optional)</label><br></elylabel>
                                <input type="file" id="paDsFileBrowser" disabled="" accept=".der, .cer, .crt">
                              </div>
                            </div>
                            <!--AA-->
                            <div class="has-background-light" style="margin-bottom: 10px;">
                              <input type="checkbox" id="aaCheckbox"><label class="has-text-weight-bold"> AA</label>
                            </div>
                            <!--CA-->
                            <div class="has-background-light" style="margin-bottom: 10px;">
                              <input type="checkbox" id="caCheckbox"><label class="has-text-weight-bold"> CA</label>
                            </div>
                            <!--TA-->
                            <div class="has-background-light">
                              <input type="checkbox" id="taCheckbox">
                              <label class="has-text-weight-bold" id="taLabel"> TA</label>
                              <div class="has-background-light">
                                <div class="elyBrowse">
                                  <elylabel><label for="taCvcaLinkFileBrowser">CVCA Link certificate (Optional)</label><br></elylabel>
                                  <input type="file" id="taCvcaLinkFileBrowser" disabled="" accept=".cvcert">
                                </div>
                                <div class="elyBrowse">
                                  <elylabel><label for="taDvFileBrowser">DV certificate</label><br></elylabel>
                                  <input type="file" id="taDvFileBrowser" disabled="" accept=".cvcert">
                                </div>
                                <div class="elyBrowse">
                                  <elylabel><label for="taIsFileBrowser">IS certificate</label><br></elylabel>
                                  <input type="file" id="taIsFileBrowser" disabled="" accept=".cvcert">
                                </div>
                                <div class="elyBrowse">
                                  <elylabel><label for="taIsKeyFileBrowser">IS Private Key</label><br></elylabel>
                                  <input type="file" id="taIsKeyFileBrowser" disabled="" accept=".pkcs8">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="num-keyboard" style="margin-top: 5%; display: none;" id="pinpad">
                            <div>
                              <button class="num-key" onclick="gui.enterNumber(1, &#39;pinpadInputValue&#39;)">1</button>
                              <button class="num-key" onclick="gui.enterNumber(2, &#39;pinpadInputValue&#39;)">2</button>
                              <button class="num-key" onclick="gui.enterNumber(3, &#39;pinpadInputValue&#39;)">3</button>
                              <button class="num-key-opt button is-success is-light" onclick="gui.closePopups(&#39;pinpad&#39;, &#39;pinpadInputValue&#39;)">Cancel</button>
                            </div>
                            <div>
                              <button class="num-key" onclick="gui.enterNumber(4, &#39;pinpadInputValue&#39;)">4</button>
                              <button class="num-key" onclick="gui.enterNumber(5, &#39;pinpadInputValue&#39;)">5</button>
                              <button class="num-key" onclick="gui.enterNumber(6, &#39;pinpadInputValue&#39;)">6</button>
                              <button class="num-key-opt button is-success is-light" onclick="gui.clearInput(&#39;pinpadInputValue&#39;)">Correct</button>
                            </div>
                            <div>
                              <button class="num-key" onclick="gui.enterNumber(7, &#39;pinpadInputValue&#39;)">7</button>
                              <button class="num-key" onclick="gui.enterNumber(8, &#39;pinpadInputValue&#39;)">8</button>
                              <button class="num-key" onclick="gui.enterNumber(9, &#39;pinpadInputValue&#39;)">9</button>
                              <button class="num-key-opt button is-success is-light" onclick="gui.okButton(&#39;pinpad&#39;)">Confirm</button>
                            </div>
                            <div>
                              <button class="num-key" onclick="gui.enterNumber(0, &#39;pinpadInputValue&#39;)" style="margin-left: 63px;">0</button>
                            </div></div>
                      </div>
                    </div>
                
                    <!--Menu password popup box-->
                    <div id="askEveryTimePopup" class="options-popup" style="top: 50%; left: 50%;">
                      <div class="column popup-content" id="Popup-container">
                          <div class="box-title has-text-weight-bold" style="margin-bottom: 10px;">Password type</div>
                          <label class="radio"><input type="radio" name="pwdTypePopup" id="pwdTypeMrzPopup" value="MRZ"> MRZ</label><br>
                          <label class="radio"><input type="radio" name="pwdTypePopup" id="pwdTypeCanPopup" value="CAN"> CAN</label><br>
                          <label class="radio"><input type="radio" name="pwdTypePopup" id="pwdTypePinPopup" value="PIN"> PIN</label><br>
                          <input class="input is-warning" id="pinpadInputValuePopup" placeholder="Enter CAN or PIN" type="password" onclick="gui.openPinpadPopup()"><br><br>
                          <div class="buttons">
                            <button class="button is-success" id="okayButtonPopup">Okay</button> <br>
                            <button class="button is-success" id="cancelButtonPopup">Cancel</button>
                          </div>
                      </div>
                      <div id="pinpadPopup" class="options-popup">
                            <div>
                              <button class="num-key" onclick="gui.enterNumber(1, &#39;pinpadInputValuePopup&#39;)">1</button>
                              <button class="num-key" onclick="gui.enterNumber(2, &#39;pinpadInputValuePopup&#39;)">2</button>
                              <button class="num-key" onclick="gui.enterNumber(3, &#39;pinpadInputValuePopup&#39;)">3</button>
                              <button class="num-key-opt button is-success is-light" onclick="gui.closePopups(&#39;pinpadPopup&#39;, &#39;pinpadInputValuePopup&#39;)">Cancel</button>
                            </div>
                            <div>
                              <button class="num-key" onclick="gui.enterNumber(4, &#39;pinpadInputValuePopup&#39;)">4</button>
                              <button class="num-key" onclick="gui.enterNumber(5, &#39;pinpadInputValuePopup&#39;)">5</button>
                              <button class="num-key" onclick="gui.enterNumber(6, &#39;pinpadInputValuePopup&#39;)">6</button>
                              <button class="num-key-opt button is-success is-light" onclick="gui.clearInput(&#39;pinpadInputValuePopup&#39;)">Correct</button>
                            </div>
                            <div>
                              <button class="num-key" onclick="gui.enterNumber(7, &#39;pinpadInputValuePopup&#39;)">7</button>
                              <button class="num-key" onclick="gui.enterNumber(8, &#39;pinpadInputValuePopup&#39;)">8</button>
                              <button class="num-key" onclick="gui.enterNumber(9, &#39;pinpadInputValuePopup&#39;)">9</button>
                              <button class="num-key-opt button is-success is-light" onclick="gui.okButton(&#39;pinpadPopup&#39;)">Confirm</button>
                            </div>
                            <div>
                              <button class="num-key" onclick="gui.enterNumber(0, &#39;pinpadInputValuePopup&#39;)" style="margin-left: 63px;">0</button>
                            </div></div>
                    </div>
                
                    <script>
                              let inputValue ;
                
                      function createPinpad(targetPinpadId, targetId) {
                          const targetElement = document.getElementById(targetId);
                          const keypadLayout = `
                            <div>
                              <button class="num-key" onclick="gui.enterNumber(1, ''${targetPinpadId}'')">1</button>
                              <button class="num-key" onclick="gui.enterNumber(2,'${targetPinpadId}')">2</button>
                              <button class="num-key" onclick="gui.enterNumber(3, '${targetPinpadId}')">3</button>
                              <button class="num-key-opt button is-success is-light" onclick="gui.closePopups('${targetId}', '${targetPinpadId}')">Cancel</button>
                            </div>
                            <div>
                              <button class="num-key" onclick="gui.enterNumber(4, '${targetPinpadId}')">4</button>
                              <button class="num-key" onclick="gui.enterNumber(5, '${targetPinpadId}')">5</button>
                              <button class="num-key" onclick="gui.enterNumber(6, '${targetPinpadId}')">6</button>
                              <button class="num-key-opt button is-success is-light" onclick="gui.clearInput('${targetPinpadId}')">Correct</button>
                            </div>
                            <div>
                              <button class="num-key" onclick="gui.enterNumber(7, '${targetPinpadId}')">7</button>
                              <button class="num-key" onclick="gui.enterNumber(8, '${targetPinpadId}')">8</button>
                              <button class="num-key" onclick="gui.enterNumber(9, '${targetPinpadId}')">9</button>
                              <button class="num-key-opt button is-success is-light" onclick="gui.okButton('${targetId}')">Confirm</button>
                            </div>
                            <div>
                              <button class="num-key" onclick="gui.enterNumber(0, '${targetPinpadId}')" style="margin-left: 63px;">0</button>
                            </div>`;
                          targetElement.innerHTML = keypadLayout;
                      }
                      createPinpad("pinpadInputValue", "pinpad");
                      createPinpad("pinpadInputValuePopup", "pinpadPopup");
                
                      // Version strings
                      let appName = "ETD Webapp";
                      let appVer = "0";
                      let libVer = "110.xxx";
                      let buildNum = "8.6"; // to be changed
                      $("#version").text(appName + " v" + appVer + "-wasm-" + libVer + "-rc" + buildNum);
                
                      // OpenJPEG WASM module
                      OpenJpegWasm().then(function(openJpegJs) {
                        decoderJs = new openJpegJs.J2KDecoder();
                        decoder = decoderJs;
                      });
                
                      // Check and register service worker if supported
                      if ("serviceWorker" in navigator) {
                        window.addEventListener("load", () => {
                            navigator.serviceWorker.register("service-worker.js")
                                .then(registration => {
                                    console.log("Service Worker registered:", registration);
                                })
                                .catch(error => {
                                    console.log("Service Worker registration failed:", error);
                                });
                        });
                      }
                    </script>
                
                
                <div id="my-app"></div><script src="js/eactest.js"></script><div id="monica-content-root" class="monica-widget" style="pointer-events: auto;"><template shadowrootmode="open">
                
                
                   </div>
                
                  </div>
              </div>
                    <!-- start page title -->


                    <!-- end page title -->

                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->



            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2025 &copy; <a href="">Ibra Ndiaye </a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
        </div>
        <div class="slimscroll-menu">

            <div class="p-4">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, layout, etc.
                </div>
                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/light.png') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/dark.png') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css"
                        data-appStyle="{{ asset('assets/css/app-dark.min.css') }}" />
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/rtl.png') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="{{ asset('assets/css/app-rtl.min.css') }}" />
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/dark-rtl.png') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="{{ asset('assets/css/bootstrap-dark.min.css') }}"
                        data-appStyle=" {{ asset('assets/css/app-dark-rtl.min.css') }} " />
                    <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                </div>

                <a href="https://1.envato.market/eKY0g" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
            </div>
        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

 
</body>

</html>

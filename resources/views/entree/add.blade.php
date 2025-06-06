@extends('welcome')

@section('title', '| Enregister Département')

@section('css')
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



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>@import url("https://fonts.googleapis.com/css2?family=Manrope:wght@600;800&display=swap");</style>
    <title>ETD webapp</title>
    <!-- Manifest and Favicon -->
    <link rel="manifest" href="https://www.elyctis.com/demo/elytraveldoc/ver/rc8.6/sen-cni/manifest.json">
    <link rel="icon" type="image/png" href="https://www.elyctis.com/images/etd.png">
    <link rel="stylesheet" href="{{ asset('ETD webapp_files/custom.css') }}">
    <!-- jQuery UI theme -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ETD webapp_files/jquery-ui.css') }}">
    <script src="{{ asset('ETD webapp_files/jquery-ui.js') }}"></script>
    <!-- pinpad CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ETD webapp_files/jquery.ui.pinpad.css') }}">
    <script src="{{ asset('ETD webapp_files/jquery.ui.pinpad.js') }}"></script>
    <!-- eactest wasm - will be loaded dynamically -->
    <!--<link rel="webassembly" type="application/wasm" href="js/emrtd/eactest.wasm">
      <script src="js/emrtd/eactest.js"></script>-->
    <!-- open jpeg wasm -->
    <link rel="webassembly" type="application/wasm" href="https://www.elyctis.com/demo/elytraveldoc/ver/rc8.6/sen-cni/js/emrtd/openjpegjs.wasm">
    <script src="{{ asset('ETD webapp_files/openjpegjs.js') }}"></script>
    <!-- load and unload js -->
    <!-- <script src="js/misc/require.js"></script> -->
    <link rel="manifest" href="https://www.elyctis.com/demo/elytraveldoc/ver/rc8.6/sen-cni/manifest.json">





@endsection

@section('content')
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
  <div class="col-12" >
    <!--Header-->
    <div class="section" style="display: none;">
      <div class="container is-centered">
        <div class="columns">
          <div class="column">
            <div class="column is-4">
              <img id="logo" src="{{ asset('ETD webapp_files/logo.png')}}" alt="Logo" width="300px">
            </div>
          </div>
          <div class="column is-1" style="margin-top: 15px;">
            <button class="menu-button" id="optionsButton">☰</button>
          </div>
        </div>
      </div>
    </div>

    <div class="section theme">

      <!--Global container-->
      <div class="container is-centered">

        <!-- Blur background element -->
        <div id="backgroundElement" class="">

          <div class="row">
            <div class="col-md-8">
                <form action="{{ route('entree.store') }}" method="POST" enctype="multipart/form-data">
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
                            <div class="col-lg-6">
                                <label>Service</label>
                                <select class="form-control" name="service_id" id="" required="">
                                    <option value="">Selectionner</option>
                                    @foreach ($services as $service)
                                    <option value="{{$service->id}}">{{$service->nom}}</option>
                                        @endforeach

                                </select>
                            </div>
                            {{-- <div class="col-lg-6">
                                <label>Employe</label>
                                <select class="form-control" name="employe_id" id="employe_id" >

                                </select>
                            </div> --}}
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
                                <label>Sexe </label>
                                <input type="text" name="sexe" id="sex_input"  value="{{ old('sexe') }}" class="form-control"required>
                            </div>
                        </div>
                        <div class="col-lg-6  ">
                          <div class="form-group">
                              <label>Numero CNI </label>
                              <input type="text" name="numcni" id="numcni_input"  value="{{ old('numcni') }}" class="form-control"required>
                              <span class="input-group-append">
                                <button type="button" id="btnnumelec" class="btn  btn-primary"><i class="fa fa-search"></i> Rechercher</button>
                                </span>
                          </div>
                      </div>
                          <div class="col-lg-6  ">
                              <div class="form-group">
                                  <label>Date D'expiration </label>
                                  <input type="text" id="doe_input" name="date_expiration"  value="{{ old('date_expiration') }}" class="form-control"required>
                              </div>
                          </div>

                          <div style="display: none;">
                            <div class="col-lg-6  ">
                              <div class="form-group">
                                  <label>Nom Pere </label>
                                  <input type="text" id="prenompere" name="prenompere"  value="{{ old('prenompere') }}" class="form-control">
                              </div>
                          </div>
                          <div class="col-lg-6  ">
                            <div class="form-group">
                                <label>Nom Mere </label>
                                <input type="text" id="nommere" name="nommere"  value="{{ old('nommere') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6  ">
                          <div class="form-group">
                              <label>Prenom Mere </label>
                              <input type="text" id="prenommere" name="prenommere"  value="{{ old('prenommere') }}" class="form-control">
                          </div>
                      </div>
                            <div class="col-lg-6  ">
                              <div class="form-group">
                                  <label>Date D'emission </label>
                                  <input type="text" id="date_emission" name="date_emission"  value="{{ old('date_emission') }}" class="form-control">
                              </div>
                          </div>
                            <div class="col-lg-6  ">
                              <div class="form-group">
                                  <label>Numéro Electeur </label>
                                  <input type="text" name="numelec" id="numelec_input"  value="{{ old('numelec') }}" class="form-control">
                              </div>
                          </div>
                          <div class="col-lg-6  ">
                              <div class="form-group">
                                  <label>Numéro Carte </label>
                                  <input type="text" name="numcarte" id="docNumber_input"  value="{{ old('numcarte') }}" class="form-control">
                              </div>
                          </div>
                          <div class="col-lg-6  ">
                            <div class="form-group">
                                <label>Commune </label>
                                <input type="text" name="commune" id="commune_input"  value="{{ old('commune') }}" class="form-control">
                            </div>
                        </div>
                              <div class="col-lg-6  " >
                                  <div class="form-group">
                                      <label>Image </label>
                                      <input type="text" id="photo_portrait" name="image"  value="{{ old('image') }}" class="form-control" >
                                  </div>
                              </div>
                              <div class="col-lg-6  " >
                                  <div class="form-group">
                                      <label>Mrz </label>
                                      <input type="text" id="mrz" name="mrz"  value="{{ old('mrz') }}" class="form-control" >
                                  </div>
                              </div>
                              <div class="col-lg-6  " >
                                  <div class="form-group">
                                      <label>Nationalite </label>
                                      <input type="text" id="nationalite" name="nationalite"  value="{{ old('nationalite') }}" class="form-control" >
                                  </div>
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
            <div class="col-md-4">
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
              <img id="portraitDisplay" width="0" height="0">
            </div>
          </div>
          <!--Global columns-->



          <!--Document details-->
          <div class="box has-background-light">
            <div class="box-title has-text-weight-bold" style="margin-bottom: 10px;">Document details</div>
            <div class="columns">
              <div class="column is-3">
                <!--Portrait-->
                {{-- <img id="portraitDisplay" width="0" height="0"> --}}
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


<div id="my-app"></div><script src="{{ asset('js/eactest.js') }}"></script><div id="monica-content-root" class="monica-widget" style="pointer-events: auto;"><template shadowrootmode="open">


   </div>
  </div>
</div>
@endsection

@section("js")
<script>
      url_app = '{{ config('app.url') }}';
      url_api = '{{ config('app.url_api') }}';
      $("#service_id").change(function () {
        // alert("ibra");
        var service_id =  $("#service_id").children("option:selected").val();

            var employe = "<option value=''>Veuillez selectionner</option>";
            $.ajax({
                type:'GET',
                url:url_app+'/employe/by/service/'+service_id,
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {

                    $.each(data,function(index,row){
                        //alert(row.nomd);
                        employe +="<option value="+row.id+">"+row.prenom +" " + row.nom+" " + row.titre+"</option>";

                    });

                    $("#employe_id").empty();
                    $("#employe_id").append(employe);
                }
            });
        });

        $("#btnnumelec").click(function () {
            numcni_input =  $("#numcni_input").val();
            //alert(numcni_input);
           $("#electeur_id").val('');
            contenu = '';
            $.ajax({
                type:'GET',
                url:url_app+'/electeur/by/cni/'+numcni_input,
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    console.log(data)

                        /*contenu = "Province : <strong>"+data.province+"</strong><br>"+
                        "Commune ou Departement : <strong> "+data.commoudept+"</strong><br>"+
                        "Arrondissement : <strong>"+data.arrondissement +"</strong><br>"+
                        "Siege : <strong>"+data.siege+"</strong><br>"+
                        "Centre de vote : <strong>"+data.centrevote +"</strong><br>";*/
                        //$("#electeur_id").val(data.id);
                        $("#surName_input").val(data.nom);
                        $("#firstName_input").val(data.prenom);
                        $("#dob_input").val(data.datenaiss);
                        $("#lieunaiss").val(data.lieunaiss);
                        $("#sex_input").val(data.sexe);
                        $("#doe_input").val(data.date_expiration);

                       /*
                        $("#lieunaiss").val(data.lieu_naiss);
                        $("#lieunaiss").val(data.lieu_naiss);
                        $("#commoudept_id").val(data.commoudept_id);
                        $("#arrondissement_id").val(data.arrondissement_id);
                        $("#province_id").val(data.province_id);
                        //console.log(contenu);
                        $("#ancienne").html(contenu);*/
                    }
                });

            });

</script>

@endsection
